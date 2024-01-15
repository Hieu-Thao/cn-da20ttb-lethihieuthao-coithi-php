<?php
session_start();
include("ketnoi.php");

// Lấy dữ liệu từ form
$magv = $_POST["magv"];
$bomon = $_POST["bomon"];
$hotengv = $_POST["hotengv"];
$sdtgv = $_POST["sdtgv"];
$hocvi = $_POST["hocvi"];
$email = $_POST["email"];
$pass = $_POST["pass"];

// Xử lý upload hình đại diện
$duongdan = "hinhanh/"; // Thư mục lưu trữ hình ảnh, bạn cần tạo thư mục này trong dự án của mình
$duongdan = $duongdan . basename($_FILES["hinhanhgv"]["name"]);
move_uploaded_file($_FILES["hinhanhgv"]["tmp_name"], $duongdan);
$hinhdaidien = $duongdan;

// Thêm giảng viên mới vào CSDL
$sql = "INSERT INTO giangvien (magv, mabomon, hotengv, sdtgv, hocvi, email, pass, hinhdaidien) VALUES ('$magv', '$bomon', '$hotengv', '$sdtgv', '$hocvi', '$email', '$pass', '$hinhdaidien')";
$kq = mysqli_query($conn, $sql) or die("Không thể thêm giảng viên: " . mysqli_error($conn));

echo "<script language=javascript>
        alert('Thêm bộ môn thành công');
        window.location='QLGV.php';
    </script>";
?>
