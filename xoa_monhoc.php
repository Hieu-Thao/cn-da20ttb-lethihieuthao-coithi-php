<?php
session_start();
if (!isset($_SESSION["admin"])) {
    echo "<script language=javascript>
    alert('Bạn không có quyền trên trang này!'); 
    window.location='login.php';
    </script>";
}
?>

<?php
include("header_admin.php");
?>

<?php include("ketnoi.php");
    $user_xoa=$_REQUEST["user"]; //Nhận giá trị user từ link xóa của quantri.php
    $sql="delete from monhoc where mamon='".$user_xoa."'";
    $kq=mysqli_query($conn, $sql) or die ("Không thể xuất thông tin người dùng ".mysqli_error());
    echo ("<script language=javascript>
    {
    alert('Xóa thành công');
    window.location='QLMH.php';}
    </script> ");
?>

<?php
include("footer_admin.php");
?>