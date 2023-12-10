<?php
include("header_admin.php");
?>

<div>
    <div class="top-center">
        <p class="top-center-p">Quản lý lịch thi</p>
    </div>
    <div class="table-center">
        <div class="btn-center">
            <div class="btn-center-bt">
                <p>Thêm mới lịch thi</p>
            </div>
        </div>
        <div class="txt-gv-top">
            <div class="txt-gv-lb">
                <label>Học kỳ:</label>
                <select name="hocky">
                    <option value="hk1" selected="selected">Học kỳ 1</option>
                    <option value="hk2">Học kỳ 2</option>
                    <option value="hk3">Học kỳ 3</option>
                </select>
            </div>
            <div class="txt-gv-lb">
                <label>Lớp:</label>
                <select name="lop">
                    <option value="DA20TTB" selected="selected">ĐH Công nghệ thông tin B khóa 2020</option>
                    <option value="DA20TTA">ĐH Công nghệ thông tin A khóa 2020</option>
                    <option value="DA20OTA">ĐH Công nghệ ô tô A khóa 2020</option>
                    <option value="DA20OTB">ĐH Công nghệ ô tô B khóa 2020</option>
                </select>
            </div>
            <div class="txt-gv-lb">
                <label>Hình thức thi:</label>
                <select name="hinhthuc">
                    <option value="TL60" selected="selected">Tự luận - 60'</option>
                    <option value="TL90">Tự luận - 90'</option>
                    <option value="TH60">Thực hành - 60'</option>
                    <option value="TH90">Thực hành - 90'</option>
                </select>
            </div>
        </div>
        <div class="txt-gv-bot">
            <div class="txt-gv-lb">
                <label>Năm học:</label>
                <select name="monhoc">
                    <option value="1" selected="selected">Năm học 2021 - 2022</option>
                    <option value="2">Năm học 2022 - 2023</option>
                    <option value="3">Năm học 2023 - 2024</option>
                    <option value="4">Năm học 2024 - 2025</option>
                </select>
            </div>
            <div class="txt-gv-lb">
                <label>Môn học:</label>
                <select name="monhoc">
                    <option value="1" selected="selected">Kỹ thuật lập trình</option>
                    <option value="2">Kiến trúc máy tính</option>
                    <option value="3">Điện toán đám mây</option>
                    <option value="4">Hệ điều hành</option>
                </select>
            </div>
            <div class="txt-gv-lb">
                <label>Tên lịch thi:</label>
                <input type="text" name="tenlichthi"></input>
            </div>
        </div>
        <div class="txt-gv-bot">
        <div class="txt-gv-lb">
                <label>Ngày thi:</label>
                <input type="text" name="ngaythi"></input>
            </div>
            <div class="txt-gv-lb">
                <label>Phòng thi:</label>
                <input type="text" name="phongthi"></input>
            </div>
            <div class="txt-gv-lb">
                <label>Tiết thi:</label>
                <input type="text" name="tietthi"></input>
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