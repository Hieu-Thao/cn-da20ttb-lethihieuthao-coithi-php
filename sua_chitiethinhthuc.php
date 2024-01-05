<?php
include("header_admin.php");

include("ketnoi.php");

$usern=$_REQUEST["user"];

$sql = "SELECT * FROM chitiethinhthuc WHERE machitiet = '".$usern."'";
$kq = mysqli_query($conn, $sql) or die("Không thể xuất thông tin bộ môn " . mysqli_error());
$row = mysqli_fetch_array($kq);
?>
<form enctype="multipart/form-data" action="thuchien_sua_chitiethinhthuc.php" name="frmxlctht" method="post">
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
                    <label>Mã chi tiết:</label>
                    <input type="text" name="machitiet" value="<?php echo $row["machitiet"]; ?>" readonly></input>
                </div>
                <div class="txt-gv-lb">
                    <label>Hình thức:</label>
                    <select name="hinhthuc">
                        <?php
                $sql2 = "SELECT mahinhthuc, tenhinhthuc FROM hinhthuc";
                $kq2 = mysqli_query($conn, $sql2) or die("Không thể thêm hình thức: " . mysqli_error($conn));
                while ($rowht = mysqli_fetch_assoc($kq2)) {
                    $mahinhthuc = $rowht['mahinhthuc'];
                    $tenhinhthuc = $rowht['tenhinhthuc'];
                    $selected = ($mahinhthuc == $rowht["mahinhthuc"]) ? "selected" : "";
                    echo "<option value=\"$mahinhthuc\" $selected>$tenhinhthuc</option>";
                    }
                ?>
                    </select>
                </div>
                <div class="txt-gv-lb">
                    <label>Tên chi tiết:</label>
                    <input type="text" name="tenchitiet" value="<?php echo $row["tenchitiet"]; ?>"></input>
                </div>
            </div>
            <div class="txt-gv-bot">
                <div class="txt-gv-lb">
                    <label>Thời gian</label>
                    <input type="text" name="thoigian" value="<?php echo $row["thoigian"]; ?>"></input>
                </div>
                <div class="txt-gv-lb">
                    <label>Buổi</label>
                    <select name="buoi">
                        <option value="Sáng" <?php echo ($row["buoi"] == "Sáng") ? "selected" : ""; ?>>Sáng</option>
                        <option value="Chiều" <?php echo ($row["buoi"] == "Chiều") ? "selected" : ""; ?>>Chiều</option>
                        <option value="Tối" <?php echo ($row["buoi"] == "Tối") ? "selected" : ""; ?>>Tối</option>
                        <!-- Thêm các option khác tương tự -->
                        </select>
                </div>
                <div class="txt-gv-lb">
                    <label>Đơn giá</label>
                    <input type="text" name="dongia" value="<?php echo $row["dongia"]; ?>"></input>
                </div>
            </div>
            <div class="txt-btn">
                <input class="txt-btn-luu" type="submit" name="luu" value="Lưu lại" />
                <a style="text-decoration: none;" class="txt-btn-huy" type="reset" href="QLCTHT.php">Hủy bỏ</a>
            </div>
        </div>
    </div>
</form>
<?php
include("footer_admin.php");
?>