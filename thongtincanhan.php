<?php
include("ketnoi.php");
include("header_gv.php");

// Check if the session key is set before using it
$userlogin = isset($_SESSION["giangvien"]) ? $_SESSION["giangvien"] : null;

if ($userlogin) {
    $sql = "SELECT gv.*, bm.tenbomon
            FROM giangvien gv
            JOIN bomon bm ON gv.mabomon = bm.mabomon
            WHERE gv.email = '" . $userlogin . "'";
    
    $result = mysqli_query($conn, $sql) or die("Không thể xuất thông tin người dùng " . mysqli_error($conn));
    $row = mysqli_fetch_array($result);
} else {
    // Handle the case where the user is not logged in (if needed)
    $row = null;
}
?>

<?php
if ($row) {
    echo '
        <div class="full-ttcn">
            <div class="ttcn-td">
                <label>THÔNG TIN CÁ NHÂN</label>
            </div>
            <div class="ttcn">
                <div class="ttcn-img">
                    <img src="' . $row["hinhdaidien"] . '" width="250px" height="250px">
                </div>
                <div class="ttcn-tt">
                    <div class="ttcn-tt-left">
                        <label>Mã GV:</label>
                        <label>Họ tên:</label>
                        <label>Bộ môn:</label>
                        <label>Học vị:</label>
                        <label>Email:</label>
                        <label>Số điện thoại:</label>
                    </div>
                    <div class="ttcn-tt-right">
                        <label>' . $row["magv"] . '</label>
                        <label>' . $row["hotengv"] . '</label>
                        <label>' . $row["tenbomon"] . '</label>
                        <label>' . $row["hocvi"] . '</label>
                        <label>' . $row["email"] . '</label>
                        <label>' . $row["sdtgv"] . '</label>
                    </div>
                </div>
            </div>
        </div>
    ';
} else {
    echo 'User not found or not logged in.';
}
?>

<?php
include("footer.php");
?>
