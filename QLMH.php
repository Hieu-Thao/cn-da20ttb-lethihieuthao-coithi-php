<?php
include("header_admin.php");
?>

<div>
    <div class="top-center">
        <p>Quản lý môn học</p>
    </div>
    <div class="table-center">
        <div class="btn-center">
            <div class="btn-center-bt">
                <a href="them_monhoc.php" class="button button-them">
                    <ion-icon name="add-outline"></ion-icon>
                    <p>Thêm môn học</p>
                </a>
            </div>
            <div class="btn-center-search">
                <input type="text" name="tendn" placeholder="Tìm kiếm" required>
                <button type="submit">
                    <ion-icon name="search-outline"></ion-icon>
                </button>
            </div>
        </div>
        <div class="table">
            <table width="90%" class="table-content">
                <tr style="background-color:#CDD0CB; font-weight:600; height:50px;">
                    <td width="15%">Mã môn</td>
                    <td width="40%">Tên môn</td>
                    <td width="15%">Số tín chỉ</td>
                    <td width="15%">Tính năng</td>
                </tr>
                <?php
                include("ketnoi.php");
                $sql = "SELECT * FROM monhoc";
                $kq = mysqli_query($conn, $sql) or die("Không thể xuất thông tin người dùng " . mysqli_error());
                while ($row = mysqli_fetch_array($kq)) {
                    echo "<tr style='height:50px;'>";
                    echo "<td>" . $row["mamon"] . "</td>";
                    $usern = $row["mamon"];
                    echo "<td>" . $row["tenmon"] . "</td>";
                    echo "<td>" . $row["sotinchi"] . "</td>";
                    echo "<td class='table-icon'>
                    <a href='sua_monhoc.php?user=$usern'><button><ion-icon name='create-outline'></ion-icon></button></a>
                    <a href='xoa_monhoc.php?user=$usern'><button><ion-icon name='trash-outline'></button></ion-icon></a>
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