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
                <form action="" method="GET" class="btn-center-search">
                    <input type="text" name="search_name" placeholder="Tìm kiếm tên môn học" required>
                    <button type="submit">
                        <ion-icon name="search-outline"></ion-icon>
                    </button>
                </form>
            </div>
        </div>
        <div class="table">
            <table width="80%" class="table-content">
                <tr style="background-color:#CDD0CB; font-weight:600; height:50px;">
                    <td width="10%">Mã môn</td>
                    <td width="45%">Tên môn</td>
                    <td width="10%">Số tín chỉ</td>
                    <td width="15%">Tính năng</td>
                </tr>
                <?php
                include("ketnoi.php");
                if (isset($_GET['search_name'])) {
                    $search_name = $_GET['search_name'];
                    $sql = "SELECT * FROM monhoc WHERE tenmon LIKE '%$search_name%'";
                } else {
                    $sql = "SELECT * FROM monhoc";
                }
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