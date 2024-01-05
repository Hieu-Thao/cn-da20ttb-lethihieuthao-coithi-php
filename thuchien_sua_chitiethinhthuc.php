<?php
session_start();

include("ketnoi.php");

$machitiet = $_POST["machitiet"];
$hinhthuc = $_POST["hinhthuc"];
$tenchitiet = $_POST["tenchitiet"];
$thoigian = $_POST["thoigian"];
$buoi = $_POST["buoi"];
$dongia = $_POST["dongia"];

// Thêm giảng viên mới vào CSDL
$sql = "UPDATE chitiethinhthuc SET mahinhthuc = '$hinhthuc', tenchitiet = '$tenchitiet', thoigian = '$thoigian', buoi= '$buoi', dongia = '$dongia' WHERE machitiet = '$machitiet'";
$kq = mysqli_query($conn, $sql) or die("Không thể sửa chi tiết hình thức: " . mysqli_error($conn));

    echo ("<script language=javascript>
            alert('Sửa thành công');
            window.location='QLCTHT.php';
        </script> ");
        
?>
