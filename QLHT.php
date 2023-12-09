<?php
include("header_admin.php");
?>

<script>
    // JavaScript để tự động gửi biểu mẫu khi giá trị dropdown thay đổi
    function updateResultsPerPage() {
        document.getElementById("pagination-form").submit();
    }
</script>

<div>
    <div class="top-center">
        <p>Quản lý hình thức thi</p>
    </div>
    <div class="table-center">
        <div class="btn-center">
            <div class="btn-center-bt">
                <a href="#" class="button button-them">
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
                <button type="submit"><ion-icon name="search-outline"></ion-icon></button>
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
                // Các biến về phân trang và số lượng mục
                $items_per_page = isset($_GET['itemsPerPage']) ? (int)$_GET['itemsPerPage'] : 5;
                $page = isset($_GET['page']) ? (int)$_GET['page'] : 1; // Chuyển đổi sang số nguyên
                $offset = ($page - 1) * $items_per_page;

                $sql = "SELECT * FROM hinhthuc LIMIT $offset, $items_per_page";
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

                // Tính toán số trang và trang hiện tại
                $total_items = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM giangvien"));
                $number_of_pages = ceil($total_items / $items_per_page);
                $current_page = isset($_GET['page']) ? (int)$_GET['page'] : 1;

                ?>
            </table>
            <div class="sotrang">
                <?php
                for ($page = 1; $page <= $number_of_pages; $page++) {
                    $active_class = ($page == $current_page) ? 'active' : ''; // Kiểm tra xem có phải là trang hiện tại không
                    echo '<a href="?page=' . $page . '&itemsPerPage=' . $items_per_page . '" class="' . $active_class . '">' . $page . '</a> ';
                }
                ?>
            </div>
        </div>
    </div>
</div>