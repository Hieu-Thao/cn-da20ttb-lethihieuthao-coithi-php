<?php 
    session_start(); 
    if(!isset($_SESSION["giangvien"]))
    {
    echo "<script language=javascript>
    alert('Bạn không có quyền trên trang này!'); 
    window.location='login.php';
    </script>";
    }
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang Người Dùng</title>
</head>
<body>
<?php 
    include("ketnoi.php");
    $sql="select * from giangvien";
    $kq=mysqli_query($conn, $sql) or die ("Không thể xuất thông tin người dùng ".mysqli_error()); 
    $gv=mysqli_fetch_array($kq);
    ?>
    <h1>Chào mừng <?php echo $gv["hotengv"]; ?> đến website quản lý công tác coi thi khoa KTCN</h1>
</body>
</html>
