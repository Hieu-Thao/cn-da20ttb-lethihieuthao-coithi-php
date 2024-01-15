<?php
session_start();

include("ketnoi.php");

$mamon = $_POST["mamon"];
$tenmon = $_POST["tenmon"];
$sotinchi = $_POST["sotinchi"];


// Update academic department in the database
$sql = "UPDATE monhoc SET tenmon = '$tenmon', sotinchi = '$sotinchi'  WHERE mamon = '$mamon'";
$kq = mysqli_query($conn, $sql) or die("Không thể cập nhật lớp: " . mysqli_error($conn));

echo "<script language=javascript>
        alert('Cập nhật môn học thành công');
        window.location='QLMH.php';
    </script>";
?>
