<?php
include("header_admin.php");
?>

<form enctype="multipart/form-data" action="xuly_them_gv.php" name="frmxlgv" method="post">
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
                    <input type="text" name="magv"></input>
                </div>
                <div class="txt-gv-lb">
                    <label>Họ tên:</label>
                    <input type="text" name="hotengv"></input>
                </div>
                <div class="txt-gv-lb">
                    <label>Số điện thoại:</label>
                    <input type="text" name="sdtgv"></input>
                </div>
                <div class="txt-gv-lb">
                    <label>Bộ môn:</label>
                    <select name="bomon">
                        <?php
                $sql = "SELECT mabomon, tenbomon FROM bomon";
                $kq = mysqli_query($conn, $sql) or die("Không thể thêm bộ môn: " . mysqli_error($conn));
                while ($row = mysqli_fetch_assoc($kq)) {
                    $mabomon = $row['mabomon'];
                    $tenbomon = $row['tenbomon'];
                    echo "<option value=\"$mabomon\">$tenbomon</option>";
                    }
                ?>
                    </select>
                </div>
            </div>
            <div class="txt-gv-bot">
                <div class="txt-gv-lb">
                    <label>Học vị:</label>
                    <input type="text" name="hocvi"></input>
                </div>
                <div class="txt-gv-lb">
                    <label>Emai:</label>
                    <input type="text" name="email"></input>
                </div>
                <div class="txt-gv-lb">
                    <label>Mật khẩu:</label>
                    <input type="text" name="pass"></input>
                </div>
                <div class="txt-gv-lb">
                    <label>Ảnh đại diện:</label>
                    <input type="hidden" name="MAX_FILE_SIZE" value="1000000" />
                    <input type="file" name="hinhdaidien"></input>
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