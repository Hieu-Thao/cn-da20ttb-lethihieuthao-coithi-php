<?php
session_start();

include("ketnoi.php");

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
    $sql = "UPDATE lichthi SET malichthi = '$malichthi', mahocky = '$hocky', malop = '$lop', mahinhthuc = '$hinhthuc', manamhoc = '$namhoc', mamon= '$monhoc', tenlichthi = '$tenlichthi', ngaythi = '$ngaythi', phongthi = '$phongthi', tietthi = '$tietthi' WHERE malichthi = '$malichthi'";
    $kq = mysqli_query($conn, $sql) or die("Không thể sửa giảng viên: " . mysqli_error($conn));

    echo ("<script language=javascript>
            alert('Sửa thành công');
            window.location='QLLT.php';
        </script> ");
        
?>
