<?php
include("header_admin.php");
?>
<div>
    <div class="top-center">
        <p>Quản lý bộ môn</p>
    </div>
    <div class="table-center">
        <div class="btn-center">
            <div class="btn-center-bt">
                <a href="them_bomon.php" class="button button-them">
                    <ion-icon name="add-outline"></ion-icon>
                    <p>Thêm bộ môn</p>
                </a>
            </div>
        </div>
        <div class="table">
            <table width="65%" class="table-content">
                <tr style="background-color:#CDD0CB; font-weight:600; height:40px;">
                    <td width="10%">Mã bộ môn</td>
                    <td width="35%">Tên bộ môn</td>
                    <td width="15%">Tính năng</td>
                </tr>
                <?php
                include("ketnoi.php");
                $sql = "select * from bomon";
                $kq = mysqli_query($conn, $sql) or die("Không thể xuất thông tin người dùng " . mysqli_error());
                while ($row = mysqli_fetch_array($kq)) {
                    echo "<tr style='height:40px;'>";
                    echo "<td>" . $row["mabomon"] . "</td>";
                    $usern = $row["mabomon"];
                    echo "<td>" . $row["tenbomon"] . "</td>";

                    echo "<td class='table-icon'>
                    <a href='sua_bomon.php?user=$usern'><button><ion-icon name='create-outline'></ion-icon></button></a>
                    <a href='xoa_bomon.php?user=$usern'><button><ion-icon name='trash-outline'></button></ion-icon></a>
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