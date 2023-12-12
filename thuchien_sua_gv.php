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

//kiểm tra người dùng có chọn vào ảnh mới hay không, nếu có thì thực hiện khối lệnh trong if, ngược lại (người dùng không muốn thay đổi ảnh đại diện) thì thực hiện khối lệnh trong else 
if($_FILES["hinhdaidien"]["name"]!="")
{
    $duongdan = "./hinhanh/"; // Thư mục lưu trữ hình ảnh, bạn cần tạo thư mục này trong dự án của mình
    $duongdan = $duongdan . basename($_FILES["hinhdaidien"]["name"]);
    move_uploaded_file($_FILES["hinhdaidien"]["tmp_name"], $duongdan);
    $hinhdaidien = $duongdan;

// Thêm giảng viên mới vào CSDL
    $sql = "UPDATE giangvien SET magv = '$magv', mabomon = '$bomon', hotengv = '$hotengv', sdtgv = '$sdtgv', hocvi = '$hocvi', email = '$email', pass = '$pass', hinhdaidien = '$hinhdaidien' WHERE magv = '$magv'";
    $kq = mysqli_query($conn, $sql) or die("Không thể sửa giảng viên: " . mysqli_error($conn));

    echo ("<script language=javascript>
            alert('Sửa thành công');
            window.location='QLGV.php';
        </script> ");
}
else
{
    $hc=$_POST["hinhcu"];
    $sql = "UPDATE giangvien SET magv = '$magv', mabomon = '$bomon', hotengv = '$hotengv', sdtgv = '$sdtgv', hocvi = '$hocvi', email = '$email', pass = '$pass', hinhdaidien = '$hc' WHERE magv = '$magv'";
    $sql = "SELECT mabomon, tenbomon FROM bomon";
    $kq = mysqli_query($conn, $sql) or die("Không thể thêm bộ môn: " . mysqli_error($conn));
    
    echo ("<script language=javascript>
            alert('Sửa thành công');
            window.location='QLGV.php';
        </script> ");
}
?>
