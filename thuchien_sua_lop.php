<?php
session_start();

include("ketnoi.php");

$malop = $_POST["malop"];
$tenlop = $_POST["tenlop"];

// Update academic department in the database
$sql = "UPDATE lop SET tenlop = '$tenlop' WHERE malop = '$malop'";
$kq = mysqli_query($conn, $sql) or die("Không thể cập nhật lớp: " . mysqli_error($conn));

echo "<script language=javascript>
        alert('Cập nhật bộ môn thành công');
        window.location='QLL.php';
    </script>";
?>
