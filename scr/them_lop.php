<?php
include("header_admin.php");
?>

<form enctype="multipart/form-data" action="xuly_them_lop.php" name="frmxll" method="post">
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
                <input class="txt-btn-luu" type="submit" name="luu" value="Lưu lại" />
                <a style="text-decoration: none;" class="txt-btn-huy" type="reset" href="QLL.php">Hủy bỏ</a>
            </div>
        </div>
    </div>
</form>
<?php
include("footer_admin.php");
?>