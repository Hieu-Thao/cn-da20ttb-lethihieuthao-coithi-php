<?php
include("header_admin.php");
?>

<div>
    <div class="top-center">
        <p>Quản lý giảng viên</p>
    </div>
    <div class="table-center">
        <div class="btn-center">
            <div class="btn-center-bt">
                <a href="them_gv.php" class="button button-them">
                    <ion-icon name="add-outline"></ion-icon>
                    <p>Thêm giảng viên</p>
                </a>
            </div>
            <div class="btn-center-search">
                <form action="" method="GET" class="btn-center-search">
                    <input type="text" name="search_name" placeholder="Tìm kiếm tên giảng viên" required>
                    <button type="submit">
                        <ion-icon name="search-outline"></ion-icon>
                    </button>
                </form>
            </div>
        </div>
        <div class="table">
            <table width="100%" class="table-content">
                <tr style="background-color:#CDD0CB; font-weight:600; height:30px;">
                    <td width="5%">Mã GV</td>
                    <td width="10%">Bộ môn</td>
                    <td width="20%">Họ tên</td>
                    <td width="10%">Số điện thoại</td>
                    <td width="7%">Học vị</td>
                    <td width="8%">Hình ảnh</td>
                    <td width="15%">Email</td>
                    <td width="10%">Mật khẩu</td>
                    <td width="10%">Tính năng</td>
                </tr>
                <?php
                include("ketnoi.php");

                if (isset($_GET['search_name'])) {
                    $search_name = $_GET['search_name'];
                    $sql = "SELECT * FROM giangvien WHERE hotengv LIKE '%$search_name%'";
                } else {
                    $sql = "SELECT * FROM giangvien";
                }

                $kq = mysqli_query($conn, $sql) or die("Không thể xuất thông tin người dùng " . mysqli_error());
                while ($row = mysqli_fetch_array($kq)) {
                    
                    $bomons = $row["mabomon"];
                    $sql2 = "SELECT * FROM bomon WHERE mabomon='" . $bomons . "'";
                    $kq2 = mysqli_query($conn, $sql2) or die("Không thể xuất thông tin người dùng " . mysqli_error());
                    $bomon = mysqli_fetch_array($kq2);

                    echo "<tr>";
                    echo "<td> " . $row["magv"] . "</td>";
                    $usern = $row["magv"];
                    echo "<td> " . $bomon["tenbomon"] . "</td>";
                    echo "<td> " . $row["hotengv"] . "</td>";
                    echo "<td>" . $row["sdtgv"] . "</td>";
                    echo "<td>" . $row["hocvi"] . "</td>";
                    echo "<td class='gv-img'><img src= '" . $row["hinhdaidien"] . "'></td>";
                    echo "<td>" . $row["email"] . "</td>";
                    echo "<td>" . $row["pass"] . "</td>";
                    echo "<td class='table-icon'>
                    <a href='sua_gv.php?user=$usern'><button><ion-icon name='create-outline'></ion-icon></button></a>
                    <a href='xoa_gv.php?user=$usern'><button><ion-icon name='trash-outline'></button></ion-icon></a>
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