<?php
session_start();

include("ketnoi.php");

$mabomon = $_POST["mabomon"];
$tenbomon = $_POST["tenbomon"];

// Update academic department in the database
$sql = "UPDATE bomon SET tenbomon = '$tenbomon' WHERE mabomon = '$mabomon'";
$kq = mysqli_query($conn, $sql) or die("Không thể cập nhật bộ môn: " . mysqli_error($conn));

echo "<script language=javascript>
        alert('Cập nhật bộ môn thành công');
        window.location='QLBM.php';
    </script>";
?>
