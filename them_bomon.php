<?php
include("header_admin.php");
?>

<div>
    <div class="top-center">
        <p class="top-center-p">Quản lý bộ môn</p>
    </div>
    <div class="table-center">
        <div class="btn-center">
            <div class="btn-center-bt">
                <p>Thêm mới bộ môn</p>
            </div>
        </div>
        <div class="txt-gv-top">
            <form enctype="multipart/form-data" action="xuly_them_bomon.php" name="frmxlbm" method="post">
            <div class="txt-gv-lb">
                    <label>Mã bộ môn: (*)</label>
                    <input type="text" name="mabomon" readonly></input>
                </div>
            <div class="txt-gv-lb">
                    <label>Tên bộ môn</label>
                    <input type="text" name="tenbomon"></input>
                </div>

        </div>
        <div class="txt-btn">
            <input class="txt-btn-luu" type="submit" name="luu" value="Lưu lại" />
            <a style="text-decoration: none;" class="txt-btn-huy" type="reset" href="QLBM.php">Hủy bỏ</a>
        </div>
        </form>
    </div>
</div>
<?php
include("footer_admin.php");
?>