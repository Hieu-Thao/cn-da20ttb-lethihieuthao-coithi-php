<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>

<script>
function parseDate(dateString) {
    // Hàm chuyển đổi chuỗi ngày thành đối tượng ngày
    var parts = dateString.split("/");
    return new Date(parts[2], parts[1] - 1, parts[0]);
}

function sortTableByDate(order) {
    var table = document.querySelector('.table-content');
    var rows = Array.from(table.rows).slice(1); // Bỏ qua hàng tiêu đề

    rows.sort(function(a, b) {
        var dateA = new Date(parseDate(a.cells[4].textContent));
        var dateB = new Date(parseDate(b.cells[4].textContent));

        if (order === 'asc') {
            return dateA - dateB; // Sắp xếp tăng dần theo ngày thi
        } else {
            return dateB - dateA; // Sắp xếp giảm dần theo ngày thi
        }
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
</script>
<?php
include("header_gv.php");
include("ketnoi.php");

// Start the session
// session_start();

// Assuming 'user_id' is the key storing user ID in the session
if (!isset($_SESSION['giangvien'])) {
    // Redirect to login page or handle unauthorized access
    header("Location: login.php");
    exit();
}

// Get the user ID from the session
$userlogin = $_SESSION["giangvien"];

$dateCondition = "";
$classCondition = "";
$malop = "";

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    // Lấy giá trị ngày và mã lớp từ biểu mẫu (nếu có)
    $ngayBD = isset($_GET["ngayBD"]) ? $_GET["ngayBD"] : "";
    $ngayKT = isset($_GET["ngayKT"]) ? $_GET["ngayKT"] : "";
    $malop = isset($_GET["malop"]) ? $_GET["malop"] : "";

    // Xây dựng điều kiện lọc theo ngày (nếu có ngày được chọn)
    if (!empty($ngayBD) && !empty($ngayKT)) {
        $dateCondition = "AND lt.ngaythi BETWEEN '$ngayBD' AND '$ngayKT'";
    }

    // Xây dựng điều kiện lọc theo mã lớp (nếu có lớp được chọn)
    if (!empty($malop)) {
        $classCondition = "AND lt.malop = '$malop'";
    }
}

// Fetch all classes from the database
$sqlClasses = "SELECT * FROM lop";
$kqClasses = mysqli_query($conn, $sqlClasses) or die("Không thể xuất thông tin lớp " . mysqli_error());
$classOptions = "";

while ($class = mysqli_fetch_array($kqClasses)) {
    $selected = ($malop == $class["malop"]) ? "selected" : "";
    $classOptions .= "<option value='{$class["malop"]}' $selected>{$class["tenlop"]}</option>";
}

$sql2 = "SELECT * FROM giangvien WHERE email = '" . $userlogin . "'";
$result2 = mysqli_query($conn, $sql2) or die("Không thể truy xuất dữ liệu " . mysqli_error($conn));

if (mysqli_num_rows($result2) > 0) {
    $row2 = mysqli_fetch_assoc($result2);

    // Use the fetched data to filter lịch coi thi data
    $userGiangVienID = $row2['magv'];


    $sql = "SELECT lt.*, gv.hotengv, hk.tenhocky, l.tenlop, nh.tennamhoc, mh.tenmon, ht.thoigian, ht.dongia, ht.hinhthucthi, pcc.tinhtrang
    FROM lichthi lt
    LEFT JOIN phancongcoithi pcc ON lt.malichthi = pcc.malichthi
    LEFT JOIN giangvien gv ON pcc.magv = gv.magv
    LEFT JOIN hocky hk ON lt.mahocky = hk.mahocky
    LEFT JOIN lop l ON lt.malop = l.malop
    LEFT JOIN namhoc nh ON lt.manamhoc = nh.manamhoc
    LEFT JOIN monhoc mh ON lt.mamon = mh.mamon
    LEFT JOIN hinhthuc ht ON lt.mahinhthuc = ht.mahinhthuc
    WHERE 1 $dateCondition $classCondition AND gv.magv = $userGiangVienID";

    $kq = mysqli_query($conn, $sql) or die("Không thể truy xuất dữ liệu " . mysqli_error($conn));
}
?>


<div class="full-lt">
    <p style="color: #F15B2A; font-weight: 700; font-size:25px; text-align: center; padding: 30px;">LỊCH COI THI CÁ NHÂN
    </p>

    <form method="get" action="">
        <div class="fullloc">
            <div class="loclop">
                <label for="malop">
                    <ion-icon name="search-outline"></ion-icon>&nbsp;
                </label>
                <select name="malop" id="malop" onchange="this.form.submit()">
                    <option value="">Tất cả</option>
                    <?php echo $classOptions; ?>
                </select>
            </div>
            <div class="locdate">
                <label for="ngayBD"></label>
                <input type="date" name="ngayBD" id="ngayBD" value="<?php echo $ngayBD; ?>"
                    onchange="this.form.submit()">

                <label for="ngayKT">&nbsp;-&nbsp;</label>
                <input type="date" name="ngayKT" id="ngayKT" value="<?php echo $ngayKT; ?>"
                    onchange="this.form.submit()">
            </div>
        </div>
    </form>

    <div class="table">
        <table width="95%" class="table-content">
            <tr style="background-color:#ED7D31; font-weight:600; color: white;">
                <td width="5%">STT</td>
                <td width="7%">Lớp</td>
                <td width="7%">Hình thức</td>
                <td width="15%">Môn thi</td>
                <td class="full-date" width="15%">Ngày thi &nbsp;
                        <div class="full-mt">
                            <button onclick="sortTableByDate('asc')">
                                <ion-icon name="caret-up-outline"></ion-icon>
                            </button>
                            <button onclick="sortTableByDate('desc')">
                                <ion-icon name="caret-down-outline"></ion-icon>
                            </button>
                        </div>
                    </td>
                <td width="7%">Phòng thi</td>
                <td width="5%">Tiết thi</td>
                <td width="7%">Tên lịch thi</td>
                <td width="10%">Đơn giá</td>
                <td width="15%">GV coi thi</td>
                <td width="15%">Trạng thái</td>
            </tr>
            <?php
            // Display table rows based on the modified query result
            while ($row = mysqli_fetch_array($kq)) {
                    echo "<tr>";
                    echo "<td> " . $row["malichthi"] . "</td>";
                    echo "<td> " . $row["malop"] . "</td>";
                    echo "<td> " . $row["hinhthucthi"] . "</td>";
                    echo "<td> " . $row["tenmon"] . "</td>";
                    echo "<td>" . date('d/m/Y', strtotime($row["ngaythi"])) . "</td>";
                    echo "<td>" . $row["phongthi"] . "</td>";
                    echo "<td>" . $row["tietthi"] . "</td>";
                    echo "<td> " . $row["tenlichthi"] . "</td>";
                    echo "<td>" . $row["dongia"] . "</td>";
                    echo "<td> " . $row["hotengv"] . "</td>";
                    echo "<td> " . $row["tinhtrang"] . "</td>";
            
                    echo "</tr>";
                }
            ?>
        </table>
    </div>
</div>

<?php
include("footer.php");
?>