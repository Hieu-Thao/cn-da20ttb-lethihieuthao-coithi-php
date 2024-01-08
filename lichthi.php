<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>

<script>
    function sortTableByDate() {
        var table = document.querySelector('.table-content');
        var rows = Array.from(table.rows).slice(1); // Skip header row

        rows.sort(function (a, b) {
            var dateA = new Date(parseDate(a.cells[4].textContent));
            var dateB = new Date(parseDate(b.cells[4].textContent));
            var currentDate = new Date(); // Ngày hiện tại

            // So sánh ngày, đặt ngày hiện tại ở sau nếu có
            if (dateA < currentDate) {
                return -1; // A đứng trước
            } else if (dateB < currentDate) {
                return 1; // B đứng trước
            } else {
                return dateA - dateB; // Ngày còn lại, sắp xếp tăng dần
            }
        });

        // Remove existing rows from the table
        rows.forEach(function (row) {
            table.deleteRow(row.rowIndex);
        });

        // Append sorted rows back to the table
        rows.forEach(function (row) {
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
include("header.php");
include("ketnoi.php");

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

$sql = "SELECT * FROM lichthi lt WHERE 1 $dateCondition $classCondition";
$kq = mysqli_query($conn, $sql) or die("Không thể xuất thông tin người dùng " . mysqli_error());
?>

<div class="full-lt">
    <p style="color: #F15B2A; font-weight: 700; font-size:25px; text-align: center; padding: 30px;">LỊCH THI KHOA KỸ THUẬT VÀ CÔNG NGHỆ</p>
    
    <form method="get" action="">
        <div class="fullloc">
        <div class="loclop">
            <label for="malop"><ion-icon name="search-outline"></ion-icon>&nbsp;</label>
            <select name="malop" id="malop" onchange="this.form.submit()">
                <option value="">Tất cả</option>
                <?php echo $classOptions; ?>
            </select>
        </div>
        <div class="locdate">
            <label for="ngayBD"></label>
            <input type="date" name="ngayBD" id="ngayBD" value="<?php echo $ngayBD; ?>" onchange="this.form.submit()">

            <label for="ngayKT">&nbsp;-&nbsp;</label>
            <input type="date" name="ngayKT" id="ngayKT" value="<?php echo $ngayKT; ?>" onchange="this.form.submit()">
        </div>
        </div>
    </form>


    <div class="table">
        <table width="95%" class="table-content">
            <tr style="background-color:#ED7D31; font-weight:600; color: white;">
                <td width="5%">STT</td>
                <td width="10%">Lớp</td>
                <td width="10%">Mã hình thức</td>
                <td width="15%">Môn thi</td>
                <td width="10%">Ngày thi &nbsp;<button onclick="sortTableByDate()"><ion-icon name="caret-up-outline"></ion-icon></button></td>
                <td width="10%">Phòng thi</td>
                <td width="5%">Tiết thi</td>
                <td width="15%">Tên lịch thi</td>
            </tr>
            <?php
            // Display table rows based on the query result
            while ($row = mysqli_fetch_array($kq)) {
                $lops = $row["malop"];
                $sql3 = "SELECT * FROM lop WHERE malop='" . $lops . "'";
                $kq3 = mysqli_query($conn, $sql3) or die("Không thể xuất thông tin người dùng " . mysqli_error());
                $lop = mysqli_fetch_array($kq3);

                $hinhthucs = $row["mahinhthuc"];
                $sql4 = "SELECT * FROM hinhthuc WHERE mahinhthuc='" . $hinhthucs . "'";
                $kq4 = mysqli_query($conn, $sql4) or die("Không thể xuất thông tin người dùng " . mysqli_error());
                $hinhthuc = mysqli_fetch_array($kq4);

                $monhocs = $row["mamon"];
                $sql6 = "SELECT * FROM monhoc WHERE mamon='" . $monhocs . "'";
                $kq6 = mysqli_query($conn, $sql6) or die("Không thể xuất thông tin người dùng " . mysqli_error());
                $monhoc = mysqli_fetch_array($kq6);

                echo "<tr>";
                echo "<td> " . $row["malichthi"] . "</td>";
                $usern = $row["malichthi"];
                echo "<td> " . $lop["malop"] . "</td>";
                echo "<td> " . $hinhthuc["hinhthucthi"] . "</td>";
                echo "<td> " . $monhoc["tenmon"] . "</td>";
                echo "<td>" . date('d/m/Y', strtotime($row["ngaythi"])) . "</td>";
                echo "<td>" . $row["phongthi"] . "</td>";
                echo "<td>" . $row["tietthi"] . "</td>";
                echo "<td> " . $row["tenlichthi"] . "</td>";
                echo "</tr>";
            }
            ?>
        </table>
    </div>
</div>

<?php
include("footer.php");
?>