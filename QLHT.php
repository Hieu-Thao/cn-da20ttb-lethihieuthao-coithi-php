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
            </div>
            <div class="btn-center-search">
                <form action="" method="GET" class="btn-center-search">
                    <input type="text" name="search_name" placeholder="Tìm kiếm tên hình thức" required>
                    <button type="submit">
                        <ion-icon name="search-outline"></ion-icon>
                    </button>
                </form>
            </div>
        </div>
        <div class="table">
            <table width="90%" class="table-content">
                <tr style="background-color:#CDD0CB; font-weight:600; height:40px;">
                    <td width="10%">Mã hình thức</td>
                    <td width="20%">Tên hình thức</td>
                    <td width="15%">Hình thức thi</td>
                    <td width="10%">Thời gian</td>
                    <td width="10%">Buổi</td>
                    <td width="10%">Đơn giá</td>
                    <td width="15%">Tính năng</td>
                </tr>
                <?php
                include("ketnoi.php");

                if (isset($_GET['search_name'])) {
                    $search_name = $_GET['search_name'];
                    $sql = "SELECT * FROM hinhthuc WHERE tenhinhthuc LIKE '%$search_name%'";
                } else {
                    $sql = "SELECT * FROM hinhthuc";
                }

                $kq = mysqli_query($conn, $sql) or die("Không thể xuất thông tin người dùng " . mysqli_error());
                while ($row = mysqli_fetch_array($kq)) {
                    echo "<tr style='height:40px;'>";
                    echo "<td>" . $row["mahinhthuc"] . "</td>";
                    $usern = $row["mahinhthuc"];
                    echo "<td>" . $row["tenhinhthuc"] . "</td>";
                    echo "<td>" . $row["hinhthucthi"] . "</td>";
                    echo "<td>" . $row["thoigian"] . "</td>";
                    echo "<td>" . $row["buoi"] . "</td>";
                    echo "<td>" . $row["dongia"] . "</td>";
                    echo "<td class='table-icon'>
                    <a href='sua_hinhthuc.php?user=$usern'><button><ion-icon name='create-outline'></ion-icon></button></a>
                    <a href='xoa_hinhthuc.php?user=$usern'><button><ion-icon name='trash-outline'></button></ion-icon></a>
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