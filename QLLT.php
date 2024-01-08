<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>

<script>
function sortTableByDate() {
    var table = document.querySelector('.table-content');
    var rows = Array.from(table.rows).slice(1); // Bỏ qua hàng tiêu đề

    rows.sort(function(a, b) {
        var dateA = new Date(parseDate(a.cells[7].textContent));
        var dateB = new Date(parseDate(b.cells[7].textContent));

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


// 

function filterTable() {
    var table = document.querySelector('.table-content');
    var rows = Array.from(table.rows).slice(1); // Bỏ qua hàng tiêu đề

    var filterStatus = document.getElementById('filter_status').value;

    rows.forEach(function(row) {
        var date = new Date(parseDate(row.cells[7].textContent));

        if ((filterStatus === 'da_thi' && date < new Date(new Date().setDate(new Date().getDate() - 1))) || (filterStatus === 'sap_thi' && date >= new Date(new Date().setDate(new Date().getDate() - 1)))) {
            row.style.display = '';
        } else if (filterStatus === 'all') {
            row.style.display = '';
        } else {
            row.style.display = 'none';
        }
    });
}



</script>





<?php
include("header_admin.php");
?>

<div>
    <div class="top-center">
        <p>Quản lý lịch thi</p>
    </div>
    <div class="table-center">
        <div class="btn-center">
            <div class="btn-center-bt">
                <a href="them_lichthi.php" class="button button-them">
                    <ion-icon name="add-outline"></ion-icon>
                    <p>Thêm lịch thi</p>
                </a>
            </div>
            <div class="tinhtrang">
                <!-- Add this select dropdown within your HTML form -->
            <select id="filter_status" name="filter_status" onchange="filterTable()">
                <option value="all">Tất cả</option>
                <option value="da_thi">Đã thi</option>
                <option value="sap_thi">Sắp thi</option>
            </select>
            </div>
            

        </div>
        <div class="table">
            <table width="100%" class="table-content">
                <tr style="background-color:#CDD0CB; font-weight:600; height:40px;">
                    <td width="5%">Mã lịch thi</td>
                    <td width="7%">Học kỳ</td>
                    <td width="5%">Mã lớp</td>
                    <td width="10%">Hình thức</td>
                    <td width="10%">Năm học</td>
                    <td width="15%">Môn học</td>
                    <td width="10%">Tên lịch thi</td>
                    <td width="10%">Ngày thi &nbsp;<button onclick="sortTableByDate()">
                            <ion-icon name="caret-up-outline"></ion-icon>
                        </button></td>
                    <td width="7%">Phòng thi</td>
                    <td width="5%">Tiết thi</td>
                    <td width="5%">Thời gian</td>
                    <td width="10%">Tính năng</td>
                </tr>
                <?php
                include("ketnoi.php");

                $statusCondition = '';

                if (isset($_GET['filter_status']) && $_GET['filter_status'] !== 'all') {
                    $filterStatus = $_GET['filter_status'];

                    if ($filterStatus === 'da_thi') {
                        $statusCondition = "AND lt.ngaythi < DATE_SUB(CURDATE(), INTERVAL 1 DAY)";
                    } elseif ($filterStatus === 'sap_thi') {
                        $statusCondition = "AND lt.ngaythi >= DATE_ADD(CURDATE(), INTERVAL 1 DAY)";
                    }
            }


                $sql = "SELECT lt.*, gv.hotengv, hk.tenhocky, l.tenlop, nh.tennamhoc, mh.tenmon, ht.thoigian, ht.dongia, ht.hinhthucthi, pcc.tinhtrang
        FROM lichthi lt
        LEFT JOIN phancongcoithi pcc ON lt.malichthi = pcc.malichthi
        LEFT JOIN giangvien gv ON pcc.magv = gv.magv
        LEFT JOIN hocky hk ON lt.mahocky = hk.mahocky
        LEFT JOIN lop l ON lt.malop = l.malop
        LEFT JOIN namhoc nh ON lt.manamhoc = nh.manamhoc
        LEFT JOIN monhoc mh ON lt.mamon = mh.mamon
        LEFT JOIN hinhthuc ht ON lt.mahinhthuc = ht.mahinhthuc
        WHERE 1 $statusCondition";
                $kq = mysqli_query($conn, $sql) or die("Không thể xuất thông tin người dùng " . mysqli_error());
                while ($row = mysqli_fetch_array($kq)) {

                    echo "<tr style='height:50px;'>";
                    echo "<td> " . $row["malichthi"] . "</td>";
                    $usern = $row["malichthi"];
                    echo "<td> " . $row["tenhocky"] . "</td>";
                    echo "<td> " . $row["malop"] . "</td>";
                    echo "<td> " . $row["hinhthucthi"] . "</td>";
                    echo "<td> " . $row["tennamhoc"] . "</td>";
                    echo "<td> " . $row["tenmon"] . "</td>";
                    echo "<td> " . $row["tenlichthi"] . "</td>";
                    echo "<td>" . date('d/m/Y', strtotime($row["ngaythi"])) . "</td>";
                    echo "<td>" . $row["phongthi"] . "</td>";
                    echo "<td>" . $row["tietthi"] . "</td>";
                    echo "<td>" . $row["thoigian"] . "</td>";
                    echo "<td class='table-icon'>
                    <a href='sua_lichthi.php?user=$usern'><button><ion-icon name='create-outline'></ion-icon></button></a>
                    <a href='xoa_lichthi.php?user=$usern'><button><ion-icon name='trash-outline'></button></ion-icon></a>
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