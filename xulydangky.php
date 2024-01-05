<?php
session_start();
include("ketnoi.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["magv"]) && isset($_POST["malichthi"])) {
        $malichthi = $_POST["malichthi"];
        $magv = $_POST["magv"];
        $tinhtrang = "Chờ duyệt"; // Trạng thái mặc định khi đăng ký

        // Thêm dữ liệu vào bảng phancongcoithi
        $sqlInsert = "INSERT INTO phancongcoithi (malichthi, magv, tinhtrang) VALUES ('$malichthi', '$magv', '$tinhtrang')";

    
    if (mysqli_query($conn, $sqlInsert)) {
        header("Location: dangkygacthi.php"); // Chuyển hướng về trang chủ hoặc trang danh sách lịch thi
        exit();
    } else {
        // Xử lý lỗi nếu có
        echo "Lỗi: " . mysqli_error($conn);
    }
}
}
?>
