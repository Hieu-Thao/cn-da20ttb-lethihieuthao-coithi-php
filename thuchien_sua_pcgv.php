<?php
session_start();
include("ketnoi.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $malichthi = $_POST["malichthi"];
    $giangvien = $_POST["giangvien"];
    $tinhtrang = $_POST["tinhtrang"];

    // Kiểm tra xem có phân công giảng viên cho lịch thi này chưa
    $check = "SELECT * FROM phancongcoithi WHERE malichthi = '$malichthi'";
    $checkkq = mysqli_query($conn, $check);

    if (mysqli_num_rows($checkkq) > 0) {
        // Nếu đã có phân công, thực hiện UPDATE
        $updatesql = "UPDATE phancongcoithi SET magv = '$giangvien', tinhtrang = '$tinhtrang'  WHERE malichthi = '$malichthi'";
        $updatekq = mysqli_query($conn, $updatesql);

        if ($updatekq) {
            // Kiểm tra xem trạng thái có chuyển sang 'Đã duyệt' không
            if ($tinhtrang == 'Đã duyệt') {
                // Lấy thông tin giảng viên từ CSDL
                $gv_info_query = "SELECT hotengv, email FROM giangvien WHERE magv = '$giangvien'";
                $gv_info_result = mysqli_query($conn, $gv_info_query);
                $gv_info = mysqli_fetch_assoc($gv_info_result);

                // Gửi email
                $subject = "Thông báo phân công coi thi đã được duyệt";
                $message = "Chào " . $gv_info['hotengv'] . ",\n\nLịch thi của bạn đã được duyệt.\nCảm ơn bạn đã đóng góp.";

                $headers = "From: lehthaoz99@gmail.com\r\n";
                $headers .= "Reply-To: lehthaoz99@gmail.com\r\n";
                $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

                mail($gv_info['email'], $subject, $message, $headers);
            }

            echo ("<script language=javascript>
                    alert('Sửa giảng viên coi thi thành công');
                    window.location='QLPCCT.php';
                </script>");
        } else {
            echo "Không thể sửa phân công giảng viên coi thi: " . mysqli_error($conn);
        }
    } else {
        // Nếu chưa có phân công, thực hiện INSERT
        $insertsql = "INSERT INTO phancongcoithi (malichthi, magv, tinhtrang) VALUES ('$malichthi', '$giangvien', '$tinhtrang')";
        $insertkq = mysqli_query($conn, $insertsql);

        if ($insertkq) {
            echo ("<script language=javascript>
                    alert('Phân công coi thi thành công');
                    window.location='QLPCCT.php';
                </script>");

            // Kiểm tra xem trạng thái có chuyển sang 'Đã duyệt' không
            if ($tinhtrang == 'Đã duyệt') {
                // Lấy thông tin giảng viên từ CSDL
                $gv_info_query = "SELECT hotengv, email FROM giangvien WHERE magv = '$giangvien'";
                $gv_info_result = mysqli_query($conn, $gv_info_query);
                $gv_info = mysqli_fetch_assoc($gv_info_result);

                // Gửi email
                $subject = "Thông báo phân công coi thi đã được duyệt";
                $message = "Chào " . $gv_info['hotengv'] . ",\n\nLịch thi của bạn đã được duyệt.\nCảm ơn bạn đã đóng góp.";

                $headers = "From: lehthaoz99@gmail.com\r\n";
                $headers .= "Reply-To: lehthaoz99@gmail.com\r\n";
                $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

                mail($gv_info['email'], $subject, $message, $headers);
            }
        } else {
            echo "Không thể thêm mới phân công giảng viên coi thi: " . mysqli_error($conn);
        }
    }
} else {
    // If machitiet doesn't exist, show an error message
    echo "Machitiet does not exist!";
}
?>
