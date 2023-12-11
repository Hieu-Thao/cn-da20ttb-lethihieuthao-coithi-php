<?php
include("header_admin.php");
?>

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
                    <option value="CNTT" selected="selected">Công nghệ thông tin</option>
                    <option value="CNOT">Công nghệ ô tô</option>
                    <option value="CNCK">Công nghệ cơ khí </option>
                    <option value="CNXD">Công nghệ xây dựng</option>
                </select>
            </div>
        </div>
        <div class="txt-gv-bot">
            <div class="txt-gv-lb">
                <label>Học vị:</label>
                <select name="hocvi">
                    <option value="CNTT" selected="selected">Thạc sĩ</option>
                    <option value="CNOT">Tiến sĩ</option>
                    <option value="CNCK">Phó giáo sư</option>
                    <option value="CNXD">Giáo sư</option>
                </select>
            </div>
            <div class="txt-gv-lb">
                <label>Emai:</label>
                <input type="text" name="emailgv"></input>
            </div>
            <div class="txt-gv-lb">
                <label>Mật khẩu:</label>
                <input type="text" name="mkgv"></input>
            </div>
            <div class="txt-gv-lb">
                <label>Ảnh đại diện:</label>
                <input type="file" name="hinhanhgv"></input>
            </div>
        </div>
        <div class="txt-btn">
            <input class="txt-btn-luu" type="submit" name="luu" value="Lưu lại"/>
            <a style="text-decoration: none;" class="txt-btn-huy" type="reset" href="QLGV.php">Hủy bỏ</a>
        </div>
    </div>
</div>
<?php
include("footer_admin.php");
?>