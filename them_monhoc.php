<?php
include("header_admin.php");
?>

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
            <div class="txt-gv-lb">
                <label>Mã môn học:</label>
                <input type="text" name="mamonhoc"></input>
            </div>
            <div class="txt-gv-lb">
                <label>Tên môn học:</label>
                <input type="text" name="tenmonhoc"></input>
            </div>
            <div class="txt-gv-lb">
                <label>Số tín chỉ:</label>
                <input type="text" name="stc"></input>
            </div>
        </div>
        <div class="txt-btn">
            <input class="txt-btn-luu" type="submit" name="luu" value="Lưu lại" />
            <input class="txt-btn-huy" type="submit" name="huy" value="Hủy bỏ" />
        </div>
    </div>
</div>
<?php
include("footer_admin.php");
?>