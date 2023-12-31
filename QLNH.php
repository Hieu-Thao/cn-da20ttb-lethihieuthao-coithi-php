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
                <a href="them_namhoc.php" class="button button-them">
                    <ion-icon name="add-outline"></ion-icon>
                    <p>Thêm năm học</p>
                </a>
            </div>
        </div>
        <div class="table">
            <table width="90%" class="table-content">
                <tr style="background-color:#CDD0CB; font-weight:600; height:40px;">
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
                    echo "<tr style='height:40px;'>";
                    echo "<td>" . $row["manamhoc"] . "</td>";
                    $usern = $row["manamhoc"];
                    echo "<td>" . $row["tennamhoc"] . "</td>";
                    echo "<td>" . date('d/m/Y', strtotime($row["thoigianBD"])) . "</td>";
                    echo "<td>" . date('d/m/Y', strtotime($row["thoigianKT"])) . "</td>";
                    echo "<td class='table-icon'>
                    <a href='sua_namhoc.php?user=$usern'><button><ion-icon name='create-outline'></ion-icon></button></a>
                    <a href='xoa_namhoc.php?user=$usern'><button><ion-icon name='trash-outline'></button></ion-icon></a>
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