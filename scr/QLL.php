<?php
include("header_admin.php");
?>

<div>
    <div class="top-center">
        <p>Quản lý lớp</p>
    </div>
    <div class="table-center">
        <div class="btn-center">
            <div class="btn-center-bt">
                <a href="them_lop.php" class="button button-them">
                    <ion-icon name="add-outline"></ion-icon>
                    <p>Thêm lớp</p>
                </a>
            </div>
            <div class="btn-center-search">
                <form action="" method="GET" class="btn-center-search">
                    <input type="text" name="search_name" placeholder="Tìm kiếm tên lớp" required>
                    <button type="submit">
                        <ion-icon name="search-outline"></ion-icon>
                    </button>
                </form>
            </div>
        </div>
        <div class="table">
            <table width="85%" class="table-content">
                <tr style="background-color:#CDD0CB; font-weight:600; height:40px;">
                    <td width="15%">Mã lớp</td>
                    <td width="50%">Tên lớp</td>
                    <td width="15%">Tính năng</td>
                </tr>
                <?php
                include("ketnoi.php");

                if (isset($_GET['search_name'])) {
                    $search_name = $_GET['search_name'];
                    $sql = "SELECT * FROM lop WHERE malop LIKE '%$search_name%'";
                } else {
                    $sql = "SELECT * FROM lop";
                }


                $kq = mysqli_query($conn, $sql) or die("Không thể xuất thông tin người dùng " . mysqli_error());
                while ($row = mysqli_fetch_array($kq)) {
                    echo "<tr style='height:40px;'>";
                    echo "<td>" . $row["malop"] . "</td>";
                    $usern = $row["malop"];
                    echo "<td>" . $row["tenlop"] . "</td>";
                    echo "<td class='table-icon'>
                    <a href='sua_lop.php?user=$usern'><button><ion-icon name='create-outline'></ion-icon></button></a>
                    <a href='xoa_lop.php?user=$usern'><button><ion-icon name='trash-outline'></button></ion-icon></a>
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