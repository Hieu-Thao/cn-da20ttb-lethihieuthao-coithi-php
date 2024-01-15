<?php
include("header_admin.php");
?>

<form enctype="multipart/form-data" action="xuly_them_lichthi.php" name="frmxltl" method="post">
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
                <!-- <div class="txt-gv-lb">
                    <label>Mã lịch thi:</label>
                    <input type="text" name="malichthi"></input>
                </div> -->
                <div class="txt-gv-lb">
                    <label>Mã học kỳ:</label>
                    <select name="hocky">
                        <?php
                $sql = "SELECT mahocky, tenhocky FROM hocky";
                $kq = mysqli_query($conn, $sql) or die("Không thể thêm bộ môn: " . mysqli_error($conn));
                while ($row = mysqli_fetch_assoc($kq)) {
                    $mahocky = $row['mahocky'];
                    $tenhocky = $row['tenhocky'];
                    echo "<option value=\"$mahocky\">$tenhocky</option>";
                    }
                ?>
                    </select>
                </div>
                <div class="txt-gv-lb">
                    <label>Lớp:</label>
                    <select name="lop">
                        <?php
                $sql = "SELECT malop, tenlop FROM lop";
                $kq = mysqli_query($conn, $sql) or die("Không thể thêm bộ môn: " . mysqli_error($conn));
                while ($row = mysqli_fetch_assoc($kq)) {
                    $malop = $row['malop'];
                    $tenlop = $row['tenlop'];
                    echo "<option value=\"$malop\">$tenlop</option>";
                    }
                ?>
                    </select>
                </div>
                <div class="txt-gv-lb">
                    <label>Hình thức thi:</label>
                    <select name="hinhthuc">
                        <?php
                $sql = "SELECT mahinhthuc, tenhinhthuc FROM hinhthuc";
                $kq = mysqli_query($conn, $sql) or die("Không thể thêm bộ môn: " . mysqli_error($conn));
                while ($row = mysqli_fetch_assoc($kq)) {
                    $mahinhthuc = $row['mahinhthuc'];
                    $tenhinhthuc = $row['tenhinhthuc'];
                    echo "<option value=\"$mahinhthuc\">$tenhinhthuc</option>";
                    }
                ?>
                    </select>
                </div>
            </div>
            <div class="txt-gv-bot">
                <div class="txt-gv-lb">
                    <label>Năm học:</label>
                    <select name="namhoc">
                        <?php
                $sql = "SELECT manamhoc, tennamhoc FROM namhoc";
                $kq = mysqli_query($conn, $sql) or die("Không thể thêm bộ môn: " . mysqli_error($conn));
                while ($row = mysqli_fetch_assoc($kq)) {
                    $manamhoc = $row['manamhoc'];
                    $tennamhoc = $row['tennamhoc'];
                    echo "<option value=\"$manamhoc\">$tennamhoc</option>";
                    }
                ?>
                    </select>
                </div>
                <div class="txt-gv-lb">
                    <label>Môn học:</label>
                    <select name="monhoc">
                        <?php
                $sql = "SELECT mamon, tenmon FROM monhoc";
                $kq = mysqli_query($conn, $sql) or die("Không thể thêm bộ môn: " . mysqli_error($conn));
                while ($row = mysqli_fetch_assoc($kq)) {
                    $mamon = $row['mamon'];
                    $tenmon = $row['tenmon'];
                    echo "<option value=\"$mamon\">$tenmon</option>";
                    }
                ?>
                    </select>
                </div>
                <div class="txt-gv-lb">
                    <label>Tên lịch thi:</label>
                    <select name="tenlichthi">
                        <option value="Thi kết thúc môn lần 1">Thi kết thúc môn lần 1</option>
                        <option value="Thi kết thúc môn lần 2">Thi kết thúc môn lần 2</option>
                        <!-- Thêm các option khác tương tự -->
                    </select>
                </div>
            </div>
            <div class="txt-gv-bot">
                <div class="txt-gv-lb">
                    <label>Ngày thi:</label>
                    <input type="date" name="ngaythi"></input>
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
                <a style="text-decoration: none;" class="txt-btn-huy" type="reset" href="QLLT.php">Hủy bỏ</a>
            </div>
        </div>
    </div>
</form>
<?php
include("footer_admin.php");
?>