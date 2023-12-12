<?php
include("header_admin.php");

include("ketnoi.php");

$usern = $_GET["user"];

$sql = "SELECT * FROM bomon WHERE mabomon = '$usern'";
$kq = mysqli_query($conn, $sql) or die("Không thể xuất thông tin bộ môn " . mysqli_error());
$row = mysqli_fetch_array($kq);
?>
<form>
<div>
    <div class="top-center">
        <p class="top-center-p">Sửa bộ môn</p>
    </div>
    <div class="table-center">
    <div class="txt-gv-top-lop">
            <form enctype="multipart/form-data" action="thuchien_sua_bomon.php" name="frmxlbm" method="post">
                <div class="txt-gv-lb">
                    <label>Mã lớp:</label>
                    <input type="text" name="mabomon" value="<?php echo $row["mabomon"]; ?>" readonly></input>
                </div>
                <div class="txt-gv-lb">
                    <label>Tên lớp:</label>
                    <input type="text" name="tenbomon" value="<?php echo $row["tenbomon"]; ?>"></input>
                </div>
        </div>
        <div class="txt-btn">
            <input class="txt-btn-luu" type="submit" name="luu" value="Lưu lại" />
            <a style="text-decoration: none;" class="txt-btn-huy" type="reset" href="QLBM.php">Hủy bỏ</a>
        </div>
        </form>
    </div>
</div>
</form>
<?php
include("footer_admin.php");
?>