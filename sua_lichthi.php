<?php
include("header_admin.php");

include("ketnoi.php");

$usern = $_GET["user"];

$sql = "SELECT * FROM lichthi WHERE malichthi = '".$usern."'";
$kq = mysqli_query($conn, $sql) or die("Không thể xuất thông tin bộ môn " . mysqli_error());
$row = mysqli_fetch_array($kq);
?>
<form enctype="multipart/form-data" action="thuchien_sua_lichthi.php" name="frmxltl" method="post">
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
                    <label>Mã lịch thi:</label>
                    <input type="text" name="malichthi" value="<?php echo $row["malichthi"]; ?>" readonly></input>
                </div>
                <div class="txt-gv-lb">
                    <label>Mã học kỳ:</label>
                    <select name="hocky">
                        <?php
        $sql = "SELECT mahocky, tenhocky FROM hocky";
        $kq = mysqli_query($conn, $sql) or die("Không thể thêm bộ môn: " . mysqli_error($conn));

        while ($hocky_row = mysqli_fetch_assoc($kq)) {
            $mahocky = $hocky_row['mahocky'];
            $tenhocky = $hocky_row['tenhocky'];
            $selected = ($mahocky == $row["mahocky"]) ? "selected" : "";
            echo "<option value=\"$mahocky\" $selected>$tenhocky</option>";

        }
        ?>
                    </select>
                </div>
                <div class="txt-gv-lb">
                    <label>Lớp:</label>
                    <select name="lop">
                        <?php
        $sql1 = "SELECT malop, tenlop FROM lop";
        $kq1 = mysqli_query($conn, $sql1) or die("Không thể thêm bộ môn: " . mysqli_error($conn));

        while ($lop_row = mysqli_fetch_assoc($kq1)) {
            $malop = $lop_row['malop'];
            $tenlop = $lop_row['tenlop'];
            $selected = ($malop == $row["malop"]) ? "selected" : "";
            echo "<option value=\"$malop\" $selected>$tenlop</option>";

        }
        ?>
                    </select>
                </div>
                <div class="txt-gv-lb">
                    <label>Hình thức thi:</label>
                    <select name="hinhthuc">
                        <?php
        $sql2 = "SELECT mahinhthuc, tenhinhthuc FROM hinhthuc";
        $kq2 = mysqli_query($conn, $sql2) or die("Không thể thêm bộ môn: " . mysqli_error($conn));

        while ($hinhthuc_row = mysqli_fetch_assoc($kq2)) {
            $mahinhthuc = $hinhthuc_row['mahinhthuc'];
            $tenhinhthuc = $hinhthuc_row['tenhinhthuc'];
            $selected = ($mahinhthuc == $row["mahinhthuc"]) ? "selected" : "";
            echo "<option value=\"$mahinhthuc\" $selected>$tenhinhthuc</option>";

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

        while ($namhoc_row = mysqli_fetch_assoc($kq)) {
            $manamhoc = $namhoc_row['manamhoc'];
            $tennamhoc = $namhoc_row['tennamhoc'];
            $selected = ($manamhoc == $row["manamhoc"]) ? "selected" : "";
            echo "<option value=\"$manamhoc\" $selected>$tennamhoc</option>";

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

        while ($monhoc_row = mysqli_fetch_assoc($kq)) {
            $mamon = $monhoc_row['mamon'];
            $tenmon = $monhoc_row['tenmon'];
            $selected = ($mamon == $row["mamon"]) ? "selected" : "";
            echo "<option value=\"$mamon\" $selected>$tenmon</option>";

        }
        ?>
                    </select>
                </div>
                <div class="txt-gv-lb">
                    <label>Tên lịch thi:</label>
                    <select name="tenlichthi">
                        <option value="Thi kết thúc môn lần 1"
                            <?php echo ($row["tenlichthi"] == "Thi kết thúc môn lần 1") ? "selected" : ""; ?>>Thi kết thúc môn lần 1</option>
                        <option value="Thi kết thúc môn lần 2"
                            <?php echo ($row["tenlichthi"] == "Thi kết thúc môn lần 2") ? "selected" : ""; ?>>Thi kết thúc môn lần 2</option>
                        <!-- Thêm các option khác tương tự -->
                    </select>
                </div>
            </div>
            <div class="txt-gv-bot">
                <div class="txt-gv-lb">
                    <label>Ngày thi:</label>
                    <input type="date" name="ngaythi" value="<?php echo $row["ngaythi"]; ?>"></input>
                </div>
                <div class="txt-gv-lb">
                    <label>Phòng thi:</label>
                    <input type="text" name="phongthi" value="<?php echo $row["phongthi"]; ?>"></input>
                </div>
                <div class="txt-gv-lb">
                    <label>Tiết thi:</label>
                    <input type="text" name="tietthi" value="<?php echo $row["tietthi"]; ?>"></input>
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