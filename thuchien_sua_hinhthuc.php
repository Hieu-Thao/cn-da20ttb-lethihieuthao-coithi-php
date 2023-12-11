<?php
session_start();

include("ketnoi.php");

$mahinhthuc = $_POST["mahinhthuc"];
$tenhinhthuc = $_POST["tenhinhthuc"];
$thoigian = $_POST["thoigian"];
$buoi = $_POST["buoi"];
$dongia = $_POST["dongia"];

// Update academic department in the database
$sql = "UPDATE hinhthuc SET tenhinhthuc = '$tenhinhthuc', thoigian = '$thoigian', buoi = '$buoi', dongia = '$dongia'  WHERE mahinhthuc = '$mahinhthuc'";
$kq = mysqli_query($conn, $sql) or die("Không thể cập nhật lớp: " . mysqli_error($conn));

echo "<script language=javascript>
        alert('Cập nhật hình thức thành công');
        window.location='QLHT.php';
    </script>";
?>
