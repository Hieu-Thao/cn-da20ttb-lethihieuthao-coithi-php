<?php
session_start();
include("ketnoi.php");

// Lấy dữ liệu từ form
$machitiet = $_POST["machitiet"];
$hinhthuc = $_POST["hinhthuc"];
$tenchitiet = $_POST["tenchitiet"];
$thoigian = $_POST["thoigian"];
$buoi = $_POST["buoi"];
$dongia = $_POST["dongia"];


// Thêm giảng viên mới vào CSDL
$sql = "INSERT INTO chitiethinhthuc (machitiet, mahinhthuc, tenchitiet, thoigian, buoi, dongia) VALUES ('$machitiet', '$hinhthuc', '$tenchitiet', '$thoigian', '$buoi', '$dongia')";
$kq = mysqli_query($conn, $sql) or die("Không thể thêm giảng viên: " . mysqli_error($conn));

echo "<script language=javascript>
        alert('Thêm chi tiết hình thức thành công');
        window.location='QLCTHT.php';
    </script>";
?>
