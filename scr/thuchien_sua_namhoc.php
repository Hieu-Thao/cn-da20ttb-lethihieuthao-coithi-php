<?php
session_start();

include("ketnoi.php");

$manamhoc = $_POST["manamhoc"];
$tennamhoc = $_POST["tennamhoc"];
$thoigianBD = $_POST["thoigianBD"];
$thoigianKT = $_POST["thoigianKT"];


// Update academic department in the database
$sql = "UPDATE namhoc SET tennamhoc = '$tennamhoc', thoigianBD = '$thoigianBD', thoigianKT = '$thoigianKT'  WHERE manamhoc = '$manamhoc'";
$kq = mysqli_query($conn, $sql) or die("Không thể cập nhật lớp: " . mysqli_error($conn));

echo "<script language=javascript>
        alert('Cập nhật môn học thành công');
        window.location='QLNH.php';
    </script>";
?>
