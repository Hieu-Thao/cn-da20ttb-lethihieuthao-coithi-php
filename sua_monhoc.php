<?php
include("header_admin.php");

include("ketnoi.php");

$usern = $_GET["user"];

$sql = "SELECT * FROM monhoc WHERE mamon = '$usern'";
$kq = mysqli_query($conn, $sql) or die("Không thể xuất thông tin bộ môn " . mysqli_error());
$row = mysqli_fetch_array($kq);
?>
<form>
<div>
    <div class="top-center">
        <p class="top-center-p">Quản lý môn học</p>
    </div>
    <div class="table-center">
        <div class="btn-center">
            <div class="btn-center-bt">
                <p>Thêm mới môn học</p>
            </div>
        </div>
        <div class="txt-gv-top">
            <form enctype="multipart/form-data" action="thuchien_sua_monhoc.php" name="frmxlmh" method="post">
                <div class="txt-gv-lb">
                    <label>Mã môn học:</label>
                    <input type="text" name="mamon" value="<?php echo $row["mamon"]; ?>" readonly></input>
                </div>
                <div class="txt-gv-lb">
                    <label>Tên môn học:</label>
                    <input type="text" name="tenmon" value="<?php echo $row["tenmon"]; ?>"></input>
                </div>
                <div class="txt-gv-lb">
                    <label>Số tín chỉ:</label>
                    <input type="text" name="sotinchi" value="<?php echo $row["sotinchi"]; ?>"></input>
                </div>
        </div>
        <div class="txt-btn">
            <input class="txt-btn-luu" type="submit" name="luu" value="Lưu lại" />
            <a style="text-decoration: none;" class="txt-btn-huy" type="reset" href="QLMH.php">Hủy bỏ</a>
        </div>
        </form>
    </div>
</div>
</form>
<?php
include("footer_admin.php");
?>
