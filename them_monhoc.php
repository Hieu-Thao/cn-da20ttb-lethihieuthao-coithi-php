<?php
include("header_admin.php");
?>

<form enctype="multipart/form-data" action="xuly_them_monhoc.php" name="frmxlmh" method="post">
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
                    <input type="text" name="mamon"></input>
                </div>
                <div class="txt-gv-lb">
                    <label>Tên môn học:</label>
                    <input type="text" name="tenmon"></input>
                </div>
                <div class="txt-gv-lb">
                    <label>Số tín chỉ:</label>
                    <input type="text" name="sotinchi"></input>
                </div>
            </div>
            <div class="txt-btn">
                <input class="txt-btn-luu" type="submit" name="luu" value="Lưu lại" />
                <a style="text-decoration: none;" class="txt-btn-huy" type="reset" href="QLMH.php">Hủy bỏ</a>
            </div>
        </div>
    </div>
</form>
<?php
include("footer_admin.php");
?>