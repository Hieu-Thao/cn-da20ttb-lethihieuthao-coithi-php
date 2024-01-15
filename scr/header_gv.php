<?php
session_start();
if (!isset($_SESSION["giangvien"])) {
    echo "<script language=javascript>
    alert('Bạn không có quyền trên trang này!'); 
    window.location='login.php';
    </script>";
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<link rel="stylesheet" href="css_index.css">
<style>
.menu {
    background-color: #094877;
    height: 45px;
    width: 100%;
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 0px 50px;
    font-weight: 400;
}

.menu a {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 45px;
    padding: 0px 20px;
    text-decoration: none;
    color: white;
    font-size: 19px;
}

.menu a:hover {
    text-decoration: none;
    color: black;
    background-color: white;
    border-left: 2px solid #F15B2A;
    border-right: 2px solid #F15B2A;
    font-weight: 600;
    height: 45px;
}

.user {
    background-color: #F15B2A;
    height: 45px;
    display: flex;
    align-items: center;
    padding: 0px 20px;
    font-weight: 600;
    color: white;
}

.menu-left {
    display: flex;
}
</style>

<body>

<?php
    include("ketnoi.php");
    $sql = "select * from giangvien ";
    $userlogin = $_SESSION["giangvien"];
    $sql2 = "select * from giangvien where email='" . $userlogin . "'";
    $kq = mysqli_query($conn, $sql) or die("Không thể xuất thông tin người dùng " . mysqli_error());
    $kq2 = mysqli_query($conn, $sql2) or die("Không thể xuất thông tin người dùng " . mysqli_error());
    $giangviens = mysqli_fetch_array($kq);
    $giangvien_login =  mysqli_fetch_array($kq2);

    ?>

    <div class="full">
        <div class="link-tvu">
            <a href="https://www.tvu.edu.vn/">Trang chủ TVU</a>
            <a href="https://www.tvu.edu.vn/">Cổng thông tin sinh viên</a>
            <a href="https://daotao.tvu.edu.vn/">Phòng đào tạo</a>
            <a href="https://daotao.tvu.edu.vn/">Phòng khảo thí</a>
        </div>
        <div>
            <img src="hinhanh/bg.png" height="180px" width="100%">
        </div>
        <div class="menu">
            <div class="menu-left">
                <!-- <a href="index.php">Trang chủ</a> -->
                <a href="dangkygacthi.php">Đăng ký coi thi</a>
                <a href="lichcoithicanhan.php">Lịch coi thi</a>
                <a href="doimatkhau.php">Đổi mật khẩu</a>
                <a href="logout.php">Đăng xuất</a>
            </div>

            <a class="user" href="thongtincanhan.php">
                <label><?php echo $giangvien_login["hotengv"]; ?></label>
            </a>
        </div>