<?php
include("header_admin.php");

include("ketnoi.php");

$usern = $_GET["user"];

$sql = "SELECT * FROM lop WHERE malop = '".$usern."'";
$kq = mysqli_query($conn, $sql) or die("Không thể xuất thông tin bộ môn " . mysqli_error());
$row = mysqli_fetch_array($kq);
?>

<form enctype="multipart/form-data" action="thuchien_sua_lop.php" name="frmxll" method="post">
    <div>
        <div class="top-center">
            <p class="top-center-p">Sửa lớp</p>
        </div>
        <div class="table-center">
            <div class="txt-gv-top">
                <div class="txt-gv-lb">
                    <label>Mã lớp</label>
                    <input type="text" name="malop" value="<?php echo $row["malop"]; ?>" readonly>
                </div>
                <div class="txt-gv-lb">
                    <label>Tên lớp</label>
                    <input type="text" name="tenlop" value="<?php echo $row["tenlop"]; ?>">
                </div>
            </div>
            <div class="txt-btn">
                <input class="txt-btn-luu" type="submit" name="luu" value="Lưu lại" />
                <a style="text-decoration: none;" class="txt-btn-huy" type="reset" href="QLL.php">Hủy bỏ</a>
            </div>
        </div>
    </div>
</form>
<?php
include("footer_admin.php");
?>