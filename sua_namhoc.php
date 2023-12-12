<?php
include("header_admin.php");

include("ketnoi.php");

$usern = $_GET["user"];

$sql = "SELECT * FROM namhoc WHERE manamhoc = '$usern'";
$kq = mysqli_query($conn, $sql) or die("Không thể xuất thông tin bộ môn " . mysqli_error());
$row = mysqli_fetch_array($kq);
?>
<form>
<div>
    <div class="top-center">
        <p class="top-center-p">Quản lý năm học</p>
    </div>
    <div class="table-center">
        <div class="btn-center">
            <div class="btn-center-bt">
                <p>Sửa năm học</p>
            </div>
        </div>
        <div class="txt-gv-top">
            <form enctype="multipart/form-data" action="thuchien_sua_namhoc.php" name="frmxlnh" method="post">
                <div class="txt-gv-lb">
                    <label>Mã năm học:</label>
                    <input type="text" name="manamhoc" value="<?php echo $row["manamhoc"]; ?>" readonly></input>
                </div>
                <div class="txt-gv-lb">
                    <label>Tên năm học:</label>
                    <input type="text" name="tennamhoc" value="<?php echo $row["tennamhoc"]; ?>"></input>
                </div>
                <div class="txt-gv-lb">
                    <label>Thời gian bắt đầu:</label>
                    <input type="text" name="thoigianBD" value="<?php echo $row["thoigianBD"]; ?>"></input>
                </div>
                <div class="txt-gv-lb">
                    <label>Thời gian kết thúc:</label>
                    <input type="text" name="thoigianKT" value="<?php echo $row["thoigianKT"]; ?>"></input>
                </div>
        </div>
        <div class="txt-btn">
            <input class="txt-btn-luu" type="submit" name="luu" value="Lưu lại" />
            <a style="text-decoration: none;" class="txt-btn-huy" type="reset" href="QLNH.php">Hủy bỏ</a>
        </div>
        </form>
    </div>
</div>
</form>
<?php
include("footer_admin.php");
?>