<?php
session_start();
include("ketnoi.php");

// Lấy dữ liệu từ form
$malichthi = $_POST["malichthi"];
$hocky = $_POST["hocky"];
$lop = $_POST["lop"];
$hinhthuc = $_POST["hinhthuc"];
$namhoc = $_POST["namhoc"];
$monhoc = $_POST["monhoc"];
$tenlichthi = $_POST["tenlichthi"];
$ngaythi = $_POST["ngaythi"];
$phongthi = $_POST["phongthi"];
$tietthi = $_POST["tietthi"];

// Thêm giảng viên mới vào CSDL
$sql = "INSERT INTO lichthi (malichthi, mahocky, malop, mahinhthuc, manamhoc, mamon, tenlichthi, ngaythi, phongthi, tietthi) VALUES ('$malichthi', '$hocky', '$lop', '$hinhthuc', '$namhoc', '$monhoc', '$tenlichthi', '$ngaythi', '$phongthi', '$tietthi')";
$kq = mysqli_query($conn, $sql) or die("Không thể thêm giảng viên: " . mysqli_error($conn));

echo "<script language=javascript>
        alert('Thêm bộ môn thành công');
        window.location='QLLT.php';
    </script>";
?>
