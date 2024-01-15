<?php
include("header_gv.php");
include("ketnoi.php");

// Check if the session key is set before using it
$userlogin = isset($_SESSION["giangvien"]) ? $_SESSION["giangvien"] : null;

if ($userlogin) {
    $sql = "SELECT gv.*, bm.tenbomon
            FROM giangvien gv
            JOIN bomon bm ON gv.mabomon = bm.mabomon
            WHERE gv.email = '" . $userlogin . "'";

    $result = mysqli_query($conn, $sql) or die("Không thể xuất thông tin người dùng " . mysqli_error($conn));
    $row = mysqli_fetch_array($result);

    // Check if the form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Retrieve the form data
        $oldPassword = $_POST["oldPassword"];
        $newPassword = $_POST["newPassword"];
        $confirmPassword = $_POST["confirmPassword"];

        // Validate the old password (you might want to enhance this)
        if ($oldPassword == $row["pass"]) {
            // Validate the new password (you might want to enhance this)
            if ($newPassword == $confirmPassword) {
                // Update the password in the database
                $updateSql = "UPDATE giangvien SET pass = '$newPassword' WHERE email = '$userlogin'";
                mysqli_query($conn, $updateSql) or die("Không thể cập nhật mật khẩu " . mysqli_error($conn));
                
                // Inform the user that the password has been updated
                echo ("<script language=javascript>
                    alert('Mật khẩu của bạn đã được cập nhật');
                    window.location='thongtincanhan.php';
                    </script> ");
            } else {
                echo ("<script language=javascript>
                    alert('Mật khẩu mới không khớp! Hãy nhập lại mật khẩu mới');
                    </script>");
            }
        } else {
            echo ("<script language=javascript>
                    alert('Mật khẩu cũ không đúng! Hãy nhập lại mật khẩu');
                    </script>");
        }
    }
} else {
    // Handle the case where the user is not logged in (if needed)
    $row = null;
}
?>

<!-- The rest of your HTML code remains unchanged -->
<div class="full-dmk">
    <form method="post" action="">
        <div class="dmk-td">
            <label>Đổi mật khẩu</label>
        </div>
        <div class="btn-dmk">
            <div>
                <label>Nhập mật khẩu cũ:</label>
                <input type="password" name="oldPassword" required>
            </div>
            <div>
                <label>Nhập mật khẩu mới:</label>
                <input type="password" name="newPassword" required>
            </div>
            <div>
                <label>Nhập lại mật khẩu mới:</label>
                <input type="password" name="confirmPassword" required>
            </div>
        </div>
        <div class="btn-dmk-luu">
            <input style="background-color: #F15B2A;" type="submit" value="Lưu lại">
            <a style="text-decoration: none; background-color: #73777B;" type="reset" href="thongtincanhan.php">Hủy bỏ</a>
        </div>
    </form>
</div>

<?php
include("footer.php");
?>
