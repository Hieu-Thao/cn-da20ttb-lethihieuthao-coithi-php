<?php
session_start();

include("ketnoi.php");

$malop = $_POST["malop"];
$tenlop = $_POST["tenlop"];

// Thêm bộ môn mới vào CSDL với khóa chính tự động tăng
$sql = "INSERT INTO lop VALUES ('" . $malop . "', '" . $tenlop . "')";
$kq = mysqli_query($conn, $sql) or die("Không thể thêm bộ môn: " . mysqli_error($conn));

echo "<script language=javascript>
        alert('Thêm bộ môn thành công');
        window.location='QLL.php';
    </script>";
?>
