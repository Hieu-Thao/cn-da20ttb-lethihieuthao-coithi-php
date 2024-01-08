<?php
include("header_admin.php");
?>
<form enctype="multipart/form-data" action="xuly_them_hinhthuc.php" name="frmxlht" method="post">
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
                    <label>Mã hình thức:</label>
                    <input type="text" name="mahinhthuc"></input>
                </div>
                <div class="txt-gv-lb">
                    <label>Tên hình thức:</label>
                    <input type="text" name="tenhinhthuc"></input>
                </div>
                <div class="txt-gv-lb">
                    <label>Hình thức thi:</label>
                    <select name="hinhthucthi">
                        <option value="Tự luận">Tự luận</option>
                        <option value="Trắc nghiệm">Trắc nghiệm</option>
                        <option value="Thực hành">Thực hành</option>
                    </select>
                </div>
            </div>
            <div class="txt-gv-bot">
                <div class="txt-gv-lb">
                    <label>Thời gian:</label>
                    <input type="number" name="thoigian" min="0"></input>
                </div>
                <div class="txt-gv-lb">
                    <label>Buổi:</label>
                    <select name="buoi">
                        <option value="Ban ngày">Ban ngày</option>
                        <option value="Ban đêm">Ban đêm</option>
                    </select>
                </div>
                <div class="txt-gv-lb">
                    <label>Đơn giá:</label>
                    <input type="number" name="dongia" min="0"></input>
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