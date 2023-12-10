<?php
include("header_admin.php");
?>

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
                <label>Tên hình thức:</label>
                <input type="text" name="tenhinhthuc"></input>
            </div>
            <div class="txt-gv-lb">
                <label>Thời gian:</label>
                <input type="text" name="thoigian"></input>
            </div>
            <div class="txt-gv-lb">
                <label>Buổi:</label>
                <input type="text" name="buoi"></input>
            </div>
            <div class="txt-gv-lb">
                <label>Đơn giá:</label>
                <input type="text" name="dongia"></input>
            </div>
        </div>
        <div class="txt-btn">
            <input class="txt-btn-luu" type="submit" name="luu" value="Lưu lại"/>
            <input class="txt-btn-huy" type="submit" name="huy" value="Hủy bỏ" />
        </div>
    </div>
</div>
<?php
include("footer_admin.php");
?>