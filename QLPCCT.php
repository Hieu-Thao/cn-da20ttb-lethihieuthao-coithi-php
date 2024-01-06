<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>

<script>
function sortTableByDate() {
    var table = document.querySelector('.table-content');
    var rows = Array.from(table.rows).slice(1); // Bỏ qua hàng tiêu đề

    rows.sort(function(a, b) {
        var dateA = new Date(parseDate(a.cells[5].textContent));
        var dateB = new Date(parseDate(b.cells[5].textContent));

        return dateB - dateA; // Sắp xếp giảm dần theo ngày thi
    });

    // Xóa dữ liệu đã sắp xếp khỏi bảng
    while (table.rows.length > 1) {
        table.deleteRow(1);
    }

    // Thêm dữ liệu đã sắp xếp lại vào bảng
    rows.forEach(function(row) {
        table.appendChild(row);
    });
}

function parseDate(dateString) {
    // Hàm chuyển đổi chuỗi ngày thành đối tượng ngày
    var parts = dateString.split("/");
    return new Date(parts[2], parts[1] - 1, parts[0]);
}
</script>

<?php
include("header_admin.php");
include("ketnoi.php");

$dateCondition = "";

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    // Lấy giá trị ngày và mã lớp từ biểu mẫu (nếu có)
    $ngayBD = isset($_GET["ngayBD"]) ? $_GET["ngayBD"] : "";
    $ngayKT = isset($_GET["ngayKT"]) ? $_GET["ngayKT"] : "";

    // Xây dựng điều kiện lọc theo ngày (nếu có ngày được chọn)
    if (!empty($ngayBD) && !empty($ngayKT)) {
        $dateCondition = "AND lt.ngaythi BETWEEN '$ngayBD' AND '$ngayKT'";
    }
}

$sql = "SELECT * FROM lichthi lt WHERE 1 $dateCondition";
$kq = mysqli_query($conn, $sql) or die("Không thể xuất thông tin người dùng " . mysqli_error());
?>



<div>
    <div class="top-center">
        <p>Phân công coi thi</p>
    </div>
    <div class="table-center">
        <div class="btn-center">
            <div class="btn-center-bt">
                <a href="#" class="button button-in">
                    <ion-icon name="print-outline"></ion-icon>
                    <p>In dữ liệu</p>
                </a>
                <a href="#" class="button button-xtt">
                    <ion-icon name="trash-outline"></ion-icon>
                    <p>Xóa tất cả</p>
                </a>
            </div>
            <div class="btn-center-search">
                <form action="" method="GET" class="btn-center-search">
                    <input type="text" name="search_name" placeholder="Tìm kiếm" required>
                    <button type="submit">
                        <ion-icon name="search-outline"></ion-icon>
                    </button>
                </form>
            </div>
        </div>

        <form method="get" action="">
            <div class="cdm">
                <div class="fullloc">
                    <div class="locdate">
                        <label for="ngayBD"></label>
                        <input type="date" name="ngayBD" id="ngayBD" value="<?php echo $ngayBD; ?>"
                            onchange="this.form.submit()">

                        <label for="ngayKT">&nbsp;-&nbsp;</label>
                        <input type="date" name="ngayKT" id="ngayKT" value="<?php echo $ngayKT; ?>"
                            onchange="this.form.submit()">
                    </div>
                    <div>
                    <select name="tinhtrang" onchange="this.form.submit()">
                        <option value="Tất cả" <?php echo (isset($_GET['tinhtrang']) && $_GET['tinhtrang'] === 'Tất cả') ? 'selected' : ''; ?>>Tất cả</option>
                        <option value="Chờ duyệt" <?php echo (isset($_GET['tinhtrang']) && $_GET['tinhtrang'] === 'Chờ duyệt') ? 'selected' : ''; ?>>Chờ duyệt</option>
                        <option value="Đã duyệt" <?php echo (isset($_GET['tinhtrang']) && $_GET['tinhtrang'] === 'Đã duyệt') ? 'selected' : ''; ?>>Đã duyệt</option>
                    </select>

                    </div>
                </div>
            </div>
        </form>

        <div class="table">
            <table width="100%" class="table-content">
                <tr style="background-color:#CDD0CB; font-weight:600;">
                    <td width="5%">Mã lịch thi</td>
                    <td width="10%">Tên lịch thi</td>
                    <td width="20%">Mã giáo viên</td>
                    <td width="10%">Lớp</td>
                    <td width="10%">Môn</td>
                    <td width="10%">Ngày thi &nbsp;<button onclick="sortTableByDate()">
                            <ion-icon name="caret-up-outline"></ion-icon>
                        </button></td>
                    <td width="5%">Tiết thi</td>
                    <td width="5%">Thời gian</td>
                    <td width="5%">Đơn giá</td>
                    <td width="10%">Tình trạng</td>
                    <td width="10%">Tính năng</td>
                </tr>
                <?php
                    // Thực hiện truy vấn với điều kiện lọc (hoặc không có điều kiện)

                    

                    $search_name = isset($_GET['search_name']) ? $_GET['search_name'] : '';

                    $sql = "SELECT lt.*, gv.hotengv, hk.tenhocky, l.tenlop, nh.tennamhoc, mh.tenmon, ht.thoigian, ht.dongia, pcc.tinhtrang
                            FROM lichthi lt
                            LEFT JOIN phancongcoithi pcc ON lt.malichthi = pcc.malichthi
                            LEFT JOIN giangvien gv ON pcc.magv = gv.magv
                            LEFT JOIN hocky hk ON lt.mahocky = hk.mahocky
                            LEFT JOIN lop l ON lt.malop = l.malop
                            LEFT JOIN namhoc nh ON lt.manamhoc = nh.manamhoc
                            LEFT JOIN monhoc mh ON lt.mamon = mh.mamon
                            LEFT JOIN hinhthuc ht ON lt.mahinhthuc = ht.mahinhthuc
                            WHERE 1 $dateCondition";

                    // Append conditions for searching teacher's name and subject's name
                    if (!empty($search_name)) {
                        $sql .= " AND (gv.hotengv LIKE '%$search_name%' OR mh.tenmon LIKE '%$search_name%')";
                    }

                    // Append condition for filtering by 'tinhtrang'
                    if (isset($_GET['tinhtrang']) && $_GET['tinhtrang'] !== '' && $_GET['tinhtrang'] !== 'Tất cả') {
                        $selectedTinhTrang = $_GET['tinhtrang'];
                        $sql .= " AND pcc.tinhtrang = '$selectedTinhTrang'";
                    }

                                $kq = mysqli_query($conn, $sql) or die("Không thể truy xuất dữ liệu " . mysqli_error($conn));
                                while ($row = mysqli_fetch_array($kq)) {
                        echo "<tr>";
                        echo "<td> " . $row["malichthi"] . "</td>";
                        $usern = $row["malichthi"];
                        echo "<td> " . $row["tenlichthi"] . "</td>";
                        echo "<td> " . $row["hotengv"] . "</td>";
                        // echo "<td> " . $row["tenhocky"] . "</td>";
                        echo "<td> " . $row["malop"] . "</td>";  
                        // echo "<td> " . $row["tennamhoc"] . "</td>";
                        echo "<td> " . $row["tenmon"] . "</td>";
                        echo "<td>" . date('d/m/Y', strtotime($row["ngaythi"])) . "</td>";
                        echo "<td> " . $row["tietthi"] . "</td>";
                        echo "<td> " . $row["thoigian"] . "</td>";
                        echo "<td> " . $row["dongia"] . "</td>";
                        echo "<td";
                            if ($row["tinhtrang"] == "Chờ duyệt") {
                                echo " style='color: red; font-weight: 600;'"; // Nếu trạng thái là 'Chờ duyệt', thêm màu đỏ cho chữ
                            } elseif (empty($row["tinhtrang"]) && empty($row["magv"])) {
                                echo " style='background-color: #FFCC70; font-weight: 600;'"; // Nếu trạng thái là rỗng, thêm màu xanh cho chữ
                            }
                            echo "> " . $row["tinhtrang"] . "</td>";

                            echo "<td class='table-icon'>
                                    <a href='sua_pcgv.php?user=$usern'><button><ion-icon name='add-circle-outline'></ion-icon></button></a>
                                </td>";
                            echo "</tr>";

                    }
                
                ?>
            </table>
        </div>
    </div>
</div>

<?php
include("footer_admin.php");
?>