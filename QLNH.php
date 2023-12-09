<?php
include("header_admin.php");
?>

<div>
    <div class="top-center">
        <p>Quản lý năm học</p>
    </div>
    <div class="table-center">
        <div class="btn-center">
            <div class="btn-center-bt">
                <a href="#" class="button button-them">
                    <ion-icon name="add-outline"></ion-icon>
                    <p>Thêm năm học</p>
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
        <div class="table">
            <table width="90%" class="table-content">
                <tr style="background-color:#CDD0CB; font-weight:600;">
                    <td width="5%" height="40px"><input type="checkbox"></td>
                    <td width="15%">Mã năm học</td>
                    <td width="25%">Tên năm học</td>
                    <td width="20%">Thời gian bắt đầu</td>
                    <td width="20%">Thời gian kết thúc</td>
                    <td width="15%">Tính năng</td>
                </tr>
                <?php
                include("ketnoi.php");
    
                $sql = "SELECT * FROM namhoc";
                $kq = mysqli_query($conn, $sql) or die("Không thể xuất thông tin người dùng " . mysqli_error());
                while ($row = mysqli_fetch_array($kq)) {
                    echo "<tr>";
                    echo "<td height='40px'><input type='checkbox'></td>";
                    echo "<td>" . $row["manamhoc"] . "</td>";
                    $usern = $row["manamhoc"];
                    echo "<td>" . $row["tennamhoc"] . "</td>";
                    echo "<td>" . $row["thoigianBD"] . "</td>";
                    echo "<td>" . $row["thoigianKT"] . "</td>";
                    echo "<td class='table-icon'>
                    <a href='sua.php?user=$usern'><button><ion-icon name='create-outline'></ion-icon></button></a>
                    <a href='xoa.php?user=$usern'><button><ion-icon name='trash-outline'></button></ion-icon></a>
                    </td>";
                    echo "</tr>";
                }
                ?>
            </table>
        </div>
    </div>
</div>