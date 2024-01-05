<?php
include("header_admin.php");
?>
<form enctype="multipart/form-data" action="xuly_them_chitiethinhthuc.php" name="frmxlht" method="post">
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
                    <input type="text" name="machitiet"></input>
                </div>
                <div class="txt-gv-lb">
                    <label>Hình thức:</label>
                    <select name="hinhthuc">
                        <?php
                $sql = "SELECT mahinhthuc, tenhinhthuc FROM hinhthuc";
                $kq = mysqli_query($conn, $sql) or die("Không thể thêm hình thức: " . mysqli_error($conn));
                while ($row = mysqli_fetch_assoc($kq)) {
                    $mahinhthuc = $row['mahinhthuc'];
                    $tenhinhthuc = $row['tenhinhthuc'];
                    echo "<option value=\"$mahinhthuc\">$tenhinhthuc</option>";
                    }
                ?>
                    </select>
                </div>
                <div class="txt-gv-lb">
                    <label>Tên chi tiết:</label>
                    <input type="text" name="tenchitiet"></input>
                </div>
            </div>
            <div class="txt-gv-bot">
                <div class="txt-gv-lb">
                    <label>Thời gian</label>
                    <input type="number" name="thoigian"></input>
                </div>
                <div class="txt-gv-lb">
                    <label>Buổi</label>
                    <select name="buoi">
                        <option value="Sáng">Sáng</option>
                        <option value="Chiều">Chiều</option>
                        <option value="Tối">Tối</option>
                    </select>
                </div>
                <div class="txt-gv-lb">
                    <label>Đơn giá</label>
                    <input type="number" name="dongia"></input>
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