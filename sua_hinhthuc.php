<?php
include("header_admin.php");

include("ketnoi.php");

$usern = $_GET["user"];

$sql = "SELECT * FROM hinhthuc WHERE mahinhthuc = '".$usern."'";
$kq = mysqli_query($conn, $sql) or die("Không thể xuất thông tin bộ môn " . mysqli_error());
$row = mysqli_fetch_array($kq);
?>

<form enctype="multipart/form-data" action="thuchien_sua_hinhthuc.php" name="frmxlht" method="post">
    <div>
        <div class="top-center">
            <p class="top-center-p">Quản lý hình thức</p>
        </div>
        <div class="table-center">
            <div class="btn-center">
                <div class="btn-center-bt">
                    <p>Thêm mới hình thức</p>
                </div>
            </div>
            <div class="txt-gv-top">
                <div class="txt-gv-lb">
                    <label>Mã hình thức:</label>
                    <input type="text" name="mahinhthuc" value="<?php echo $row["mahinhthuc"]; ?>" readonly></input>
                </div>
                <div class="txt-gv-lb">
                    <label>Tên hình thức:</label>
                    <input type="text" name="tenhinhthuc" value="<?php echo $row["tenhinhthuc"]; ?>"></input>
                </div>
            </div>
                <div class="txt-btn">
                    <input class="txt-btn-luu" type="submit" name="luu" value="Lưu lại" />
                    <a style="text-decoration: none;" class="txt-btn-huy" type="reset" href="QLHT.php">Hủy bỏ</a>
                </div>
            
        </div>
    </div>
</form>
<?php
include("footer_admin.php");
?>