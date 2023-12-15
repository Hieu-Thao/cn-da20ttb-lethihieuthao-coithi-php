<?php
session_start();

include("ketnoi.php");

$magv = $_POST["magv"];
$bomon = $_POST["bomon"];
$hotengv = $_POST["hotengv"];
$sdtgv = $_POST["sdtgv"];
$hocvi = $_POST["hocvi"];
$email = $_POST["email"];
$pass = $_POST["pass"];

if ($_FILES["hinhdaidien"]["name"] != "") {
    $duongdan = "./hinhanh/";
    $duongdan = $duongdan . basename($_FILES["hinhdaidien"]["name"]);
    move_uploaded_file($_FILES["hinhdaidien"]["tmp_name"], $duongdan);
    $hinhdaidien = $duongdan;

    // Câu truy vấn UPDATE
    $sql_update = "UPDATE giangvien SET magv = '$magv', mabomon = '$bomon', hotengv = '$hotengv', sdtgv = '$sdtgv', hocvi = '$hocvi', email = '$email', pass = '$pass', hinhdaidien = '$hinhdaidien' WHERE magv = '$magv'";

    $kq = mysqli_query($conn, $sql_update) or die("Không thể sửa giảng viên: " . mysqli_error($conn));

    echo ("<script language=javascript>
            alert('Sửa thành công');
            window.location='QLGV.php';
        </script> ");
} else {
    $hc = $_POST["hinhcu"];

    // Câu truy vấn UPDATE khi không có ảnh mới
    $sql_update = "UPDATE giangvien SET magv = '$magv', mabomon = '$bomon', hotengv = '$hotengv', sdtgv = '$sdtgv', hocvi = '$hocvi', email = '$email', pass = '$pass', hinhdaidien = '$hc' WHERE magv = '$magv'";

    $kq = mysqli_query($conn, $sql_update) or die("Không thể sửa giảng viên: " . mysqli_error($conn));

    echo ("<script language=javascript>
            alert('Sửa thành công');
            window.location='QLGV.php';
        </script> ");
}

// Truy vấn SQL thứ hai
$sql_select = "SELECT mabomon, tenbomon FROM bomon";
$kq_bm = mysqli_query($conn, $kq_bomon);

// // Xử lý kết quả nếu cần
// if ($result_select) {
//     // Xử lý kết quả ở đây
// } else {
//     echo "Lỗi: " . mysqli_error($conn);
// }

