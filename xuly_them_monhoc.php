<?php
session_start();

include("ketnoi.php");

$mamon = $_POST["mamon"];
$tenmon = $_POST["tenmon"];
$sotinchi = $_POST["sotinchi"];

// Thêm bộ môn mới vào CSDL với khóa chính tự động tăng
$sql = "INSERT INTO monhoc VALUES ('" .$mamon. "', '" .$tenmon. "', '" .$sotinchi. "')";
$kq = mysqli_query($conn, $sql) or die("Không thể thêm bộ môn: " . mysqli_error($conn));

echo "<script language=javascript>
        alert('Thêm môn học thành công');
        window.location='QLMH.php';
    </script>";
?>