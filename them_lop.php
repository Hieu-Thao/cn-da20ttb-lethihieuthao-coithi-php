<?php
include("header_admin.php");
?>

<div>
    <div class="top-center">
        <p class="top-center-p">Quản lý lớp</p>
    </div>
    <div class="table-center">
        <div class="btn-center">
            <div class="btn-center-bt">
                <p>Thêm mới lớp</p>
            </div>
        </div>
        <div class="txt-gv-top-lop">
            <div class="txt-gv-lb">
                <label>Mã lớp:</label>
                <input type="text" name="malop"></input>
            </div>
            <div class="txt-gv-lb">
                <label>Tên lớp:</label>
                <input type="text" name="tenlop"></input>
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