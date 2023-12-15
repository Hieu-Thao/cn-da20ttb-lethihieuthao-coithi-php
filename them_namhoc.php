<?php
include("header_admin.php");
?>

<form enctype="multipart/form-data" action="xuly_them_namhoc.php" name="frmxlnh" method="post">
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
                    <input type="date" name="thoigianBD"></input>
                </div>
                <div class="txt-gv-lb">
                    <label>Thời gian kết thúc:</label>
                    <input type="date" name="thoigianKT"></input>
                </div>
            </div>
            <div class="txt-btn">
                <input class="txt-btn-luu" type="submit" name="luu" value="Lưu lại" />
                <a style="text-decoration: none;" class="txt-btn-huy" type="reset" href="QLNH.php">Hủy bỏ</a>
            </div>
        </div>
    </div>
</form>
<?php
include("footer_admin.php");
?>