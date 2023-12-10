<?php
include("header_admin.php");
?>

<div>
    <div class="top-center">
        <p>Quản lý hình thức thi</p>
    </div>
    <div class="table-center">
        <div class="btn-center">
            <div class="btn-center-bt">
                <a href="them_hinhthuc.php" class="button button-them">
                    <ion-icon name="add-outline"></ion-icon>
                    <p>Thêm hình thức</p>
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
                <button type="submit">
                    <ion-icon name="search-outline"></ion-icon>
                </button>
            </div>
        </div>
        <div class="cdm">
            <form method="get" action="" id="pagination-form">
                <label for="itemsPerPage">Số lượng:</label>
                <select class="form-control" onchange="selectdata(this.options[this.selectedIndex].value)">
                    <option value="All">Tất cả</option>
                    <option value="TN">Tự luận</option>
                    <option value="TH">Thực hành</option>
                </select>
            </form>
        </div>
        <div class="table">
            <table width="85%" class="table-content">
                <tr style="background-color:#CDD0CB; font-weight:600;">
                    <td width="5%" height="40px"><input type="checkbox"></td>
                    <td width="15%">Mã hình thức</td>
                    <td width="20%">Tên hình thức</td>
                    <td width="15%">Thời gian</td>
                    <td width="15%">Buổi</td>
                    <td width="15%">Đơn giá</td>
                    <td width="15%">Tính năng</td>
                </tr>
                <?php
                include("ketnoi.php");
                $sql = "SELECT * FROM hinhthuc";
                $kq = mysqli_query($conn, $sql) or die("Không thể xuất thông tin người dùng " . mysqli_error());
                while ($row = mysqli_fetch_array($kq)) {
                    echo "<tr>";
                    echo "<td height='40px'><input type='checkbox'></td>";
                    echo "<td>" . $row["mahinhthuc"] . "</td>";
                    $usern = $row["mahinhthuc"];
                    echo "<td>" . $row["tenhinhthuc"] . "</td>";
                    echo "<td>" . $row["thoigian"] . "</td>";
                    echo "<td>" . $row["buoi"] . "</td>";
                    echo "<td>" . $row["dongia"] . "</td>";
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

<?php
include("footer_admin.php");
?>