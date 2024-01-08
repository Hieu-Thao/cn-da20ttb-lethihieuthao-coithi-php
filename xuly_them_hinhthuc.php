<?php
session_start();

include("ketnoi.php");

$mahinhthuc = $_POST["mahinhthuc"];
$tenhinhthuc = $_POST["tenhinhthuc"];
$hinhthucthi = $_POST["hinhthucthi"];
$thoigian = $_POST["thoigian"];
$buoi = $_POST["buoi"];
$dongia = $_POST["dongia"];

// Thêm bộ môn mới vào CSDL với khóa chính tự động tăng
$sql = "INSERT INTO hinhthuc VALUES ('" . $mahinhthuc . "', '" . $tenhinhthuc . "', '" . $hinhthucthi . "', '" . $thoigian . "', '" . $buoi . "', '" . $dongia . "')";
$kq = mysqli_query($conn, $sql) or die("Không thể thêm bộ môn: " . mysqli_error($conn));

echo "<script language=javascript>
        alert('Thêm hình thức thành công');
        window.location='QLHT.php';
    </script>";
?>
