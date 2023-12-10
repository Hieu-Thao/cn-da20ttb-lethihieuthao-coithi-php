
// xuly_them_bomon.php
<?php
session_start();

include("ketnoi.php");

$tenbomon = $_POST["tenbomon"];

// Thêm bộ môn mới vào CSDL với khóa chính tự động tăng
$sqlInsert = "INSERT INTO bomon (tenbomon) VALUES ('" . $tenbomon . "')";
$resultInsert = mysqli_query($conn, $sqlInsert) or die("Không thể thêm bộ môn: " . mysqli_error($conn));

echo "<script language=javascript>
        alert('Thêm bộ môn thành công');
        window.location='QLBM.php';
    </script>";
?>
