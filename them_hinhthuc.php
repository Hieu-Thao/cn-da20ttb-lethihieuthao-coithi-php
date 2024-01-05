<?php
include("header_admin.php");
?>
<form enctype="multipart/form-data" action="xuly_them_hinhthuc.php" name="frmxlht" method="post">
    <div>
        <div class="top-center">
            <p class="top-center-p">Quản lý chi tiết hình thức</p>
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
                
            </div>
            <div class="txt-btn">
                <input class="txt-btn-luu" type="submit" name="luu" value="Lưu lại" />
                <a style="text-decoration: none;" class="txt-btn-huy" type="reset" href="QLHT.php">Hủy bỏ</a>
            </div>
        </div>
    </div>
</form>
<?php
include("footer_admin.php");
?>