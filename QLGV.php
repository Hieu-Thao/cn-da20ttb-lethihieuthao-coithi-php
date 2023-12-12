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
                <select name="itemsPerPage" id="itemsPerPage" onchange="updateResultsPerPage()">
                    <option value="2">--chọn--</option>
                    <option value="2">2</option>
                    <option value="4">4</option>
                    <option value="6">6</option>
                    <option value="10">10</option>
                </select>
            </form>
        </div>
        <div class="table">
            <table width="100%" class="table-content">
                <tr style="background-color:#CDD0CB; font-weight:600;">
                    <td width="3%"><input type="checkbox"></td>
                    <td width="7%">Mã GV</td>
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
                $sql = "SELECT * FROM giangvien";
                $kq = mysqli_query($conn, $sql) or die("Không thể xuất thông tin người dùng " . mysqli_error());
                while ($row = mysqli_fetch_array($kq)) {
                    
                    $bomons = $row["mabomon"];
                    $sql2 = "SELECT * FROM bomon WHERE mabomon='" . $bomons . "'";
                    $kq2 = mysqli_query($conn, $sql2) or die("Không thể xuất thông tin người dùng " . mysqli_error());
                    $bomon = mysqli_fetch_array($kq2);

                    echo "<tr>";
                    echo "<td><input type='checkbox'></td>";
                    echo "<td> " . $row["magv"] . "</td>";
                    $usern = $row["magv"];
                    echo "<td> " . $bomon["tenbomon"] . "</td>";
                    echo "<td> " . $row["hotengv"] . "</td>";
                    echo "<td>" . $row["sdtgv"] . "</td>";
                    echo "<td>" . $row["hocvi"] . "</td>";
                    echo "<td><img src= '" . $row["hinhdaidien"] . "' height='50' width='50'></td>";
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