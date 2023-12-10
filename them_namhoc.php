<?php
include("header_admin.php");
?>

<div>
    <div class="top-center">
        <p class="top-center-p">Quản lý năm học</p>
    </div>
    <div class="table-center">
        <div class="btn-center">
            <div class="btn-center-bt">
                <p>Thêm mới năm học</p>
            </div>
        </div>
        <div class="txt-gv-top">
            <div class="txt-gv-lb">
                <label>Mã năm học:</label>
                <input type="text" name="manamhoc"></input>
            </div>
            <div class="txt-gv-lb">
                <label>Tên năm học:</label>
                <input type="text" name="tennamhoc"></input>
            </div>
            <div class="txt-gv-lb">
                <label>Thời gian bắt đầu:</label>
                <input type="text" name="tgbd"></input>
            </div>
            <div class="txt-gv-lb">
                <label>Thời gian kết thúc:</label>
                <input type="text" name="tgkt"></input>
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