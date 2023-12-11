<?php
session_start();

include("ketnoi.php");

$manamhoc = $_POST["manamhoc"];
$tennamhoc= $_POST["tennamhoc"];
$thoigianBD = $_POST["thoigianBD"];
$thoigianKT = $_POST["thoigianKT"];

// Thêm bộ môn mới vào CSDL với khóa chính tự động tăng
$sql = "INSERT INTO namhoc VALUES ('" . $manamhoc . "', '" . $tennamhoc . "', '" . $thoigianBD . "', '" . $thoigianKT . "')";
$kq = mysqli_query($conn, $sql) or die("Không thể thêm bộ môn: " . mysqli_error($conn));

echo "<script language=javascript>
        alert('Thêm năm học thành công');
        window.location='QLNH.php';
    </script>";
?>