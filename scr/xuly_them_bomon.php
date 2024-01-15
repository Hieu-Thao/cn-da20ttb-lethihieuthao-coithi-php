<?php
session_start();

include("ketnoi.php");

$tenbomon = $_POST["tenbomon"];

// Thêm bộ môn mới vào CSDL với khóa chính tự động tăng
$sql = "INSERT INTO bomon (tenbomon) VALUES ('" . $tenbomon . "')";
$kq = mysqli_query($conn, $sql) or die("Không thể thêm bộ môn: " . mysqli_error($conn));

echo "<script language=javascript>
        alert('Thêm bộ môn thành công');
        window.location='QLBM.php';
    </script>";
?>