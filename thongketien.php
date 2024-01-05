<?php
include("header_admin.php");
?>

<div>
    <div class="top-center">
        <p>Quản lý lương coi thi của GV</p>
    </div>

   
        <form action="" method="GET">
             <div class="loc-thang">
            <label for="select-month"><ion-icon name="funnel-outline"></ion-icon></label>
            <select name="select-month" id="select-month">
                <option value="">Tất cả các tháng</option>
                <?php
                include("ketnoi.php");

                $selected_filter = isset($_GET['select-month']) ? $_GET['select-month'] : ''; // Lưu giá trị đã chọn

                $monthQuery = "SELECT DISTINCT DATE_FORMAT(lt.ngaythi, '%m-%Y') AS Thang
                            FROM lichthi lt
                            ORDER BY Thang DESC";

                $monthResult = mysqli_query($conn, $monthQuery);
                while ($monthRow = mysqli_fetch_assoc($monthResult)) {
                    $selected = ($selected_filter == $monthRow['Thang']) ? 'selected' : ''; // Kiểm tra xem giá trị đã chọn trước đó không
                    echo "<option value='" . $monthRow['Thang'] . "' $selected>" . $monthRow['Thang'] . "</option>";
                }
                ?>
            </select>

            <input type="submit" value="Lọc">
        </form>
    </div>

    <!-- Bảng hiển thị dữ liệu -->
    <div class="table-center">
        <!-- ... Các nút chức năng khác ... -->
        <div class="table">
            <table width="65%" class="table-content">
                <tr style="background-color:#CDD0CB; font-weight:600; height:40px;">
                    <td width="10%">Mã GV</td>
                    <td width="35%">Họ Tên</td>
                    <td width="15%">Tháng</td>
                    <td width="15%">Tổng tiền</td>
                </tr>
                <?php
                // Xử lý khi người dùng chọn tháng từ select box
                $filterMonth = isset($_GET['select-month']) ? $_GET['select-month'] : '';

                // Truy vấn SQL để lấy dữ liệu dựa trên tháng đã chọn
                $query = "SELECT gv.magv, gv.hotengv,
                            DATE_FORMAT(lt.ngaythi, '%m-%Y') AS Thang, SUM(ht.dongia) AS TongTien
                            FROM giangvien gv
                            JOIN phancongcoithi pcc ON gv.magv = pcc.magv
                            JOIN lichthi lt ON pcc.malichthi = lt.malichthi
                            JOIN hinhthuc ht ON lt.mahinhthuc = ht.mahinhthuc";

                if (!empty($filterMonth)) {
                    $query .= " WHERE DATE_FORMAT(lt.ngaythi, '%m-%Y') = '$filterMonth'";
                }

                $query .= " GROUP BY gv.magv, gv.hotengv, DATE_FORMAT(lt.ngaythi, '%m-%Y')";
                
                $result = mysqli_query($conn, $query);
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr style='height:40px;'>";
                    echo "<td>" . $row['magv'] . "</td>";
                    echo "<td>" . $row['hotengv'] . "</td>";
                    echo "<td>" . $row['Thang'] . "</td>";
                    echo "<td>" . $row['TongTien'] . "</td>";
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
