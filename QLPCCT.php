<?php
include("header_admin.php");
?>

<div>
    <div class="top-center">
        <p>Phân công coi thi</p>
    </div>
    <div class="table-center">
        <div class="btn-center">
            <div class="btn-center-bt">
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
                <button type="submit">
                    <ion-icon name="search-outline"></ion-icon>
                </button>
            </div>
        </div>
        <div class="cdm">
            <form method="get" action="">
                
                <div class="cdm-tg">
                    <label for="ngayBD">Từ ngày:</label>
                    <input type="date" name="ngayBD" id="ngayBD">
                </div>
                <div class="cdm-tg">
                    <label for="ngayKT">Đến ngày:</label>
                    <input type="date" name="ngayKT" id="ngayKT">
                    <button type="submit">Lọc</button>
                </div>
                
                
            </form>
        </div>
        <div class="table">
            <table width="100%" class="table-content">
                <tr style="background-color:#CDD0CB; font-weight:600;">
                    <td width="5%">Mã lịch thi</td>
                    <td width="10%">Tên lịch thi</td>
                    <td width="20%">Mã giáo viên</td>
                    <td width="8%">Học kỳ</td>
                    <td width="10%">Lớp</td>
                    <td width="10%">Năm học</td>
                    <td width="10%">Môn</td>
                    <td width="10%">Ngày thi</td>
                    <td width="5%">Tiết thi</td>
                    <td width="10%">Tính năng</td>
                </tr>
                <?php

                include("ketnoi.php");
                if ($_SERVER["REQUEST_METHOD"] == "GET") {
                    // Lấy giá trị ngày từ biểu mẫu (nếu có)
                    $ngayBD = isset($_GET["ngayBD"]) ? $_GET["ngayBD"] : "";
                    $ngayKT = isset($_GET["ngayKT"]) ? $_GET["ngayKT"] : "";
                
                    // Xây dựng điều kiện lọc theo ngày (nếu có ngày được chọn)
                    $dateCondition = "";
                    if (!empty($ngayBD) && !empty($ngayKT)) {
                        $dateCondition = "AND lt.ngaythi BETWEEN '$ngayBD' AND '$ngayKT'";
                    }
                
                    // Thực hiện truy vấn với điều kiện lọc (hoặc không có điều kiện)
                    $sql = "SELECT lt.*, gv.hotengv, hk.tenhocky, l.tenlop, nh.tennamhoc, mh.tenmon
                            FROM lichthi lt
                            LEFT JOIN phancongcoithi pcc ON lt.malichthi = pcc.malichthi
                            LEFT JOIN giangvien gv ON pcc.magv = gv.magv
                            LEFT JOIN hocky hk ON lt.mahocky = hk.mahocky
                            LEFT JOIN lop l ON lt.malop = l.malop
                            LEFT JOIN namhoc nh ON lt.manamhoc = nh.manamhoc
                            LEFT JOIN monhoc mh ON lt.mamon = mh.mamon
                            WHERE 1 $dateCondition";
                
                    $kq = mysqli_query($conn, $sql) or die("Không thể xuất thông tin người dùng " . mysqli_error());

                while ($row = mysqli_fetch_array($kq)) {
                    echo "<tr>";
                    echo "<td> " . $row["malichthi"] . "</td>"; 
                    $usern = $row["malichthi"];
                    echo "<td> " . $row["tenlichthi"] . "</td>";
                    echo "<td> " . $row["hotengv"] . "</td>";
                    echo "<td> " . $row["tenhocky"] . "</td>";
                    echo "<td> " . $row["tenlop"] . "</td>";
                    echo "<td> " . $row["tennamhoc"] . "</td>";
                    echo "<td> " . $row["tenmon"] . "</td>";
                    echo "<td>" . date('d/m/Y', strtotime($row["ngaythi"])) . "</td>";
                    echo "<td> " . $row["tietthi"] . "</td>";
                    echo "<td class='table-icon'>
                        <a href='sua_pcgv.php?user=$usern'><button><ion-icon name='create-outline'></ion-icon></button></a>
                        <a href='xoa.php?user=$usern'><button><ion-icon name='trash-outline'></button></ion-icon></a>
                        </td>";
                    echo "</tr>";
                }
            }
        ?>
            </table>
        </div>
    </div>
</div>


<?php
include("footer_admin.php");
?>