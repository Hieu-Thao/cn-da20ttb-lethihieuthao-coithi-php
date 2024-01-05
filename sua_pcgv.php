<?php
include("header_admin.php");
include("ketnoi.php");


$usern=$_REQUEST["user"];

        $sql = "SELECT lt.*, gv.hotengv, gv.magv, hk.tenhocky, l.tenlop, nh.tennamhoc, mh.tenmon, pcc.tinhtrang, ht.thoigian
                FROM lichthi lt
                LEFT JOIN phancongcoithi pcc ON lt.malichthi = pcc.malichthi
                LEFT JOIN giangvien gv ON pcc.magv = gv.magv
                LEFT JOIN hocky hk ON lt.mahocky = hk.mahocky
                LEFT JOIN lop l ON lt.malop = l.malop
                LEFT JOIN namhoc nh ON lt.manamhoc = nh.manamhoc
                LEFT JOIN monhoc mh ON lt.mamon = mh.mamon
                INNER JOIN hinhthuc ht ON lt.mahinhthuc = ht.mahinhthuc
                WHERE lt.malichthi = '".$usern."'";

        $kq = mysqli_query($conn, $sql) or die("Không thể xuất thông tin bộ môn " . mysqli_error($conn));
        $row = mysqli_fetch_array($kq);
?>



<form enctype="multipart/form-data" action="thuchien_sua_pcgv.php" name="frmxlpcgv" method="post">
    <div>
        <div class="top-center">
            <p class="top-center-p">Phân công coi thi</p>
        </div>
        <div class="table-center">
            <div class="btn-center">
                <div class="btn-center-bt">
                    <p>Phân công giảng viên coi thi</p>
                </div>
            </div>
            <div class="txt-gv-top">
                <div class="txt-gv-lb">
                    <label>Mã lịch thi:</label>
                    <input type="text" name="malichthi" value="<?php echo $row["malichthi"]; ?>" readonly></input>
                </div>

                <div class="txt-gv-lb">
                    <label>Tên lịch thi:</label>
                    <input type="text" name="tenlichthi" value="<?php echo $row["tenlichthi"]; ?>" readonly></input>
                </div>
                <div style="background-color: lightgray; padding:15px; border-radius:5px;" class="txt-gv-lb">
                    <label>Giảng viên:</label>
                    <select name="giangvien">
                        <?php
                            $sql = "SELECT * FROM giangvien"; // Retrieve all records from the 'giangvien' table
                            $kq = mysqli_query($conn, $sql) or die("Không thể thêm giảng viên: " . mysqli_error($conn));
                            
                            while ($gv_row = mysqli_fetch_assoc($kq)) {
                                $magv = $gv_row['magv'];
                                $hotengv = $gv_row['hotengv'];
                                $selected = ($magv == $row["magv"]) ? "selected" : "";
                                echo "<option value=\"$magv\"$selected>$hotengv</option>";
                            }
                            ?>
                    </select>
                </div>
            </div>
            
            <div class="txt-gv-bot">
            <!-- <div class="txt-gv-lb">
                    <label>Học kỳ:</label>
                    <input type="text" name="hocky" value="<?php echo $row["tenhocky"]; ?>" readonly></input>
                </div> -->
                <div class="txt-gv-lb">
                    <label>Lớp:</label>
                    <input type="text" name="lop" value="<?php echo $row["tenlop"]; ?>" readonly></input>
                </div>
                <!-- <div class="txt-gv-lb">
                    <label>Năm học:</label>
                    <input type="text" name="namhoc" value="<?php echo $row["tennamhoc"]; ?>" readonly></input>
                </div> -->
                <div class="txt-gv-lb">
                    <label>Môn học:</label>
                    <input type="text" name="monhoc" value="<?php echo $row["tenmon"]; ?>" readonly></input>
                </div>
                <div class="txt-gv-lb">
                    <label>Ngày thi:</label>
                    <input type="text" name="ngaythi" value="<?php echo $row["ngaythi"]; ?>" readonly></input>
                </div>
                </div>
                <div class="txt-gv-lb">
                    <label>Tiết thi:</label>
                    <input type="text" name="tietthi" value="<?php echo $row["tietthi"]; ?>" readonly></input>
                </div>
                <div class="txt-gv-bot">
                <div class="txt-gv-lb">
                    <label>Thời gian:</label>
                    <input type="text" name="thoigian" value="<?php echo $row["thoigian"]; ?>" readonly></input>
                </div>
                
                <div style="background-color: lightgray; padding:15px; border-radius:5px;" class="txt-gv-lb">
    <label>Tình trạng:</label>
    <select name="tinhtrang">
        <option value="Đã duyệt" <?php echo ($row["tinhtrang"] == "Đã duyệt") ? "selected" : ""; ?>>Đã duyệt</option>
        <option value="Chờ duyệt" <?php echo ($row["tinhtrang"] == "Chờ duyệt") ? "selected" : ""; ?>>Chờ duyệt</option>
    </select>
</div>
            </div>
            <div class="txt-btn">
                <input class="txt-btn-luu" type="submit" name="luu" value="Lưu lại" />
                <a style="text-decoration: none;" class="txt-btn-huy" type="reset" href="QLPCCT.php">Hủy bỏ</a>
            </div>
        </div>
    </div>
</form>
<?php
include("footer_admin.php");
?>