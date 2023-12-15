<?php
include("header_admin.php");

include("ketnoi.php");

$usern=$_REQUEST["user"];

$sql = "SELECT * FROM giangvien WHERE magv = '".$usern."'";
$kq = mysqli_query($conn, $sql) or die("Không thể xuất thông tin bộ môn " . mysqli_error());
$row = mysqli_fetch_array($kq);
?>

<form enctype="multipart/form-data" action="thuchien_sua_gv.php" name="frmxlgv" method="post">
    <div>
        <div class="top-center">
            <p class="top-center-p">Quản lý giảng viên</p>
        </div>
        <div class="table-center">
            <div class="btn-center">
                <div class="btn-center-bt">
                    <p>Thêm mới giảng viên</p>
                </div>
            </div>
            <div class="txt-gv-top">
                <div class="txt-gv-lb">
                    <label>Mã GV:</label>
                    <input type="text" name="magv" value="<?php echo $row["magv"]; ?>" readonly></input>
                </div>
                <div class="txt-gv-lb">
                    <label>Họ tên:</label>
                    <input type="text" name="hotengv" value="<?php echo $row["hotengv"]; ?>"></input>
                </div>
                <div class="txt-gv-lb">
                    <label>Số điện thoại:</label>
                    <input type="text" name="sdtgv" value="<?php echo $row["sdtgv"]; ?>"></input>
                </div>
                <div class="txt-gv-lb">
                    <label>Bộ môn:</label>
                    <select name="bomon">
                        <?php
        $sql = "SELECT mabomon, tenbomon FROM bomon";
        $kq = mysqli_query($conn, $sql) or die("Không thể thêm bộ môn: " . mysqli_error($conn));
        while ($bomon_row = mysqli_fetch_assoc($kq)) {
            $mabomon = $bomon_row['mabomon'];
            $tenbomon = $bomon_row['tenbomon'];
            $selected = ($mabomon == $row["mabomon"]) ? "selected" : "";
            echo "<option value=\"$mabomon\" $selected>$tenbomon</option>";
        }
        ?>
                    </select>
                </div>
            </div>
            <div class="txt-gv-bot">
                <div class="txt-gv-lb">
                    <label>Học vị:</label>
                    <input type="text" name="hocvi" value="<?php echo $row["hocvi"]; ?>"></input>
                </div>
                <div class="txt-gv-lb">
                    <label>Emai:</label>
                    <input type="text" name="email" value="<?php echo $row["email"]; ?>"></input>
                </div>
                <div class="txt-gv-lb">
                    <label>Mật khẩu:</label>
                    <input type="text" name="pass" value="<?php echo $row["pass"]; ?>"></input>
                </div>
                <div class="txt-gv-lb">
                    <label>Ảnh đại diện:</label>
                    <img src="<?php echo $row['hinhdaidien']; ?>" height="100" width="100">
                    <input type="hidden" name="hinhcu" value="<?php echo $row['hinhdaidien']; ?>"><br>Ảnh mới:
                    <input type="file" name="hinhdaidien">
                    <input type="hidden" name="MAX_FILE_SIZE" value="1000000">
                </div>
            </div>
            <div class="txt-btn">
                <input class="txt-btn-luu" type="submit" name="luu" value="Lưu lại" />
                <a style="text-decoration: none;" class="txt-btn-huy" type="reset" href="QLGV.php">Hủy bỏ</a>
            </div>
        </div>
    </div>
</form>
<?php
include("footer_admin.php");
?>