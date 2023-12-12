<?php
include("header_admin.php");
?>

<div>
    <div class="top-center">
        <p>Quản lý lịch thi</p>
    </div>
    <div class="table-center">
        <div class="btn-center">
            <div class="btn-center-bt">
                <a href="them_lichthi.php" class="button button-them">
                    <ion-icon name="add-outline"></ion-icon>
                    <p>Thêm lịch thi</p>
                </a>
                <a href="#" class="button button-in">
                    <ion-icon name="print-outline"></ion-icon>
                    <p>In dữ liệu</p>
                </a>
                <a href="#" class="button button-xtt">
                    <ion-icon name="trash-outline"></ion-icon>
                    <p>Xóa tất cả</p>
                </a>
            </div>
            <div class="btn-center-search">
                <input type="text" name="tendn" placeholder="Tìm kiếm" required>
                <button type="submit"><ion-icon name="search-outline"></ion-icon></button>
            </div>
        </div>
        <div class="cdm">
            <form method="get" action="" id="pagination-form">
                <label for="itemsPerPage">Số lượng:</label>
                <select name="itemsPerPage" id="itemsPerPage" onchange="updateResultsPerPage()">
                    <option value="2">--chọn--</option>
                    <option value="2">2</option>
                    <option value="4">4</option>
                    <option value="6">6</option>
                    <option value="10">10</option>
                </select>
            </form>
        </div>
        <div class="table">
            <table width="100%" class="table-content">
                <tr style="background-color:#CDD0CB; font-weight:600;">
                    <td width="3%"><input type="checkbox"></td>
                    <td width="5%">Mã lịch thi</td>
                    <td width="7%">Mã <br>học kỳ</td>
                    <td width="15%">Mã lớp</td>
                    <td width="10%">Mã<br> hình thức</td>
                    <td width="10%">Mã năm học</td>
                    <td width="10%">Mã môn</td>
                    <td width="10%">Tên lịch thi</td>
                    <td width="10%">Ngày thi</td>
                    <td width="7%">Phòng thi</td>
                    <td width="5%">Tiết thi</td>
                    <td width="10%">Tính năng</td>
                </tr>
                <?php
                include("ketnoi.php");

                $sql = "SELECT * FROM lichthi";
                $kq = mysqli_query($conn, $sql) or die("Không thể xuất thông tin người dùng " . mysqli_error());
                while ($row = mysqli_fetch_array($kq)) {

                    $hockys = $row["mahocky"];
                    $sql2 = "SELECT * FROM hocky WHERE mahocky='" . $hockys . "'";
                    $kq2 = mysqli_query($conn, $sql2) or die("Không thể xuất thông tin người dùng " . mysqli_error());
                    $hocky = mysqli_fetch_array($kq2);

                    $lops = $row["malop"];
                    $sql3 = "SELECT * FROM lop WHERE malop='" . $lops . "'";
                    $kq3 = mysqli_query($conn, $sql3) or die("Không thể xuất thông tin người dùng " . mysqli_error());
                    $lop = mysqli_fetch_array($kq3);

                    $hinhthucs = $row["mahinhthuc"];
                    $sql4 = "SELECT * FROM hinhthuc WHERE mahinhthuc='" . $hinhthucs . "'";
                    $kq4 = mysqli_query($conn, $sql4) or die("Không thể xuất thông tin người dùng " . mysqli_error());
                    $hinhthuc = mysqli_fetch_array($kq4);

                    $namhocs = $row["manamhoc"];
                    $sql5 = "SELECT * FROM namhoc WHERE manamhoc='" . $namhocs . "'";
                    $kq5 = mysqli_query($conn, $sql5) or die("Không thể xuất thông tin người dùng " . mysqli_error());
                    $namhoc = mysqli_fetch_array($kq5);

                    $monhocs = $row["mamon"];
                    $sql6 = "SELECT * FROM monhoc WHERE mamon='" . $monhocs . "'";
                    $kq6 = mysqli_query($conn, $sql6) or die("Không thể xuất thông tin người dùng " . mysqli_error());
                    $monhoc = mysqli_fetch_array($kq6);

                    echo "<tr>";
                    echo "<td><input type='checkbox'></td>";
                    echo "<td> " . $row["malichthi"] . "</td>";
                    $usern = $row["malichthi"];
                    echo "<td> " . $hocky["tenhocky"] . "</td>";
                    echo "<td> " . $lop["tenlop"] . "</td>";
                    echo "<td> " . $hinhthuc["tenhinhthuc"] . "</td>";
                    echo "<td> " . $namhoc["tennamhoc"] . "</td>";
                    echo "<td> " . $monhoc["tenmon"] . "</td>";
                    echo "<td> " . $row["tenlichthi"] . "</td>";
                    echo "<td>" . $row["ngaythi"] . "</td>";
                    echo "<td>" . $row["phongthi"] . "</td>";
                    echo "<td>" . $row["tietthi"] . "</td>";
                    echo "<td class='table-icon'>
                    <a href='sua_lichthi.php?user=$usern'><button><ion-icon name='create-outline'></ion-icon></button></a>
                    <a href='xoa_lichthi.php?user=$usern'><button><ion-icon name='trash-outline'></button></ion-icon></a>
                    </td>";
                    echo "</tr>";
                }
                ?>
            </table>
        </div>
    </div>
</div>

<?php
include("footer_admin.php");
?>