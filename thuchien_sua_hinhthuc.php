<?php
session_start();

include("ketnoi.php");

$mahinhthuc = $_POST["mahinhthuc"];
$tenhinhthuc = $_POST["tenhinhthuc"];

// Update academic department in the database
$sql = "UPDATE hinhthuc SET tenhinhthuc = '$tenhinhthuc'  WHERE mahinhthuc = '$mahinhthuc'";
$kq = mysqli_query($conn, $sql) or die("Không thể cập nhật lớp: " . mysqli_error($conn));

echo "<script language=javascript>
        alert('Cập nhật hình thức thành công');
        window.location='QLHT.php';
    </script>";
?>
