<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

include("header_admin.php");
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

                // Lấy thông tin chi tiết lịch thi từ CSDL
                $lichthi_info_query = "SELECT lt.*, gv.hotengv, gv.magv, hk.tenhocky, l.tenlop, nh.tennamhoc, mh.tenmon, pcc.tinhtrang, ht.thoigian
                                        FROM lichthi lt
                                        LEFT JOIN phancongcoithi pcc ON lt.malichthi = pcc.malichthi
                                        LEFT JOIN giangvien gv ON pcc.magv = gv.magv
                                        LEFT JOIN hocky hk ON lt.mahocky = hk.mahocky
                                        LEFT JOIN lop l ON lt.malop = l.malop
                                        LEFT JOIN namhoc nh ON lt.manamhoc = nh.manamhoc
                                        LEFT JOIN monhoc mh ON lt.mamon = mh.mamon
                                        INNER JOIN hinhthuc ht ON lt.mahinhthuc = ht.mahinhthuc
                                        WHERE lt.malichthi = '$malichthi'";
                $lichthi_info_result = mysqli_query($conn, $lichthi_info_query);
                $lichthi_info = mysqli_fetch_assoc($lichthi_info_result);

                require 'vendor/autoload.php'; // Đường dẫn đến file autoload.php của Composer

                $mail = new PHPMailer(true);

                try {
                    // Server settings
                    $mail->isSMTP();
                    $mail->Host       = 'smtp.gmail.com'; // SMTP server
                    $mail->SMTPAuth   = true;
                    $mail->Username   = 'lehthaoz99@gmail.com'; // SMTP username
                    $mail->Password   = 'ysya yppu gtib pedm'; // SMTP password
                    $mail->SMTPSecure = 'ssl';
                    $mail->Port       = 465; // Port for SMTPS

                    // Recipients
                    $mail->setFrom('lehthaoz99@gmail.com', 'KHOA KTCN');
                    $mail->addAddress($gv_info['email'], $gv_info['hotengv']);

                    // Content
                    $mail->isHTML(true);
                    $mail->CharSet = 'UTF-8';
                    $mail->Subject = 'Thông báo phân công coi thi đã được duyệt';

                    // Nội dung email với thông tin chi tiết lịch thi
                    $mail->Body    = "Xin chào {$gv_info['hotengv']},<br><br>"
                                    . "Lịch thi của bạn đã được duyệt:<br>"
                                    . "- Môn coi thi: {$lichthi_info['tenmon']}<br>"
                                    . "- Lớp: {$lichthi_info['tenlop']}<br>"
                                    . "- Ngày thi: {$lichthi_info['ngaythi']}<br>"
                                    . "- Tiết thi: {$lichthi_info['tietthi']}<br>"
                                    . "- Phòng thi: {$lichthi_info['phongthi']}<br><br>"
                                    . "Vui lòng sắp xếp thời gian để tham gia coi thi.";

                    $mail->send();
                    echo 'Email đã được gửi thành công.';
                } catch (Exception $e) {
                    echo "Không thể gửi email: {$mail->ErrorInfo}";
                }
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

                // Lấy thông tin chi tiết lịch thi từ CSDL
                $lichthi_info_query = "SELECT lt.*, gv.hotengv, gv.magv, hk.tenhocky, l.tenlop, nh.tennamhoc, mh.tenmon, pcc.tinhtrang, ht.thoigian
                                        FROM lichthi lt
                                        LEFT JOIN phancongcoithi pcc ON lt.malichthi = pcc.malichthi
                                        LEFT JOIN giangvien gv ON pcc.magv = gv.magv
                                        LEFT JOIN hocky hk ON lt.mahocky = hk.mahocky
                                        LEFT JOIN lop l ON lt.malop = l.malop
                                        LEFT JOIN namhoc nh ON lt.manamhoc = nh.manamhoc
                                        LEFT JOIN monhoc mh ON lt.mamon = mh.mamon
                                        INNER JOIN hinhthuc ht ON lt.mahinhthuc = ht.mahinhthuc
                                        WHERE lt.malichthi = '$malichthi'";
                $lichthi_info_result = mysqli_query($conn, $lichthi_info_query);
                $lichthi_info = mysqli_fetch_assoc($lichthi_info_result);

                require 'vendor/autoload.php'; // Đường dẫn đến file autoload.php của Composer

                $mail = new PHPMailer(true);

                try {
                    // Server settings
                    $mail->isSMTP();
                    $mail->Host       = 'smtp.gmail.com'; // SMTP server
                    $mail->SMTPAuth   = true;
                    $mail->Username   = 'lehthaoz99@gmail.com'; // SMTP username
                    $mail->Password   = 'ysya yppu gtib pedm'; // SMTP password
                    $mail->SMTPSecure = 'ssl';
                    $mail->Port       = 465; // Port for SMTPS

                    // Recipients
                    $mail->setFrom('lehthaoz99@gmail.com', 'KHOA KTCN');
                    $mail->addAddress($gv_info['email'], $gv_info['hotengv']);

                    // Content
                    $mail->isHTML(true);
                    $mail->CharSet = 'UTF-8';
                    $mail->Subject = 'Thông báo Lịch coi thi bạn đăng ký đã được duyệt';

                    // Nội dung email với thông tin chi tiết lịch thi
                    $mail->Body    = "Xin chào {$gv_info['hotengv']},<br><br>"
                                    . "Lịch thi của bạn đã được duyệt:<br>"
                                    . "- Môn coi thi: {$lichthi_info['tenmon']}<br>"
                                    . "- Lớp: {$lichthi_info['tenlop']}<br>"
                                    . "- Ngày thi: {$lichthi_info['ngaythi']}<br>"
                                    . "- Tiết thi: {$lichthi_info['tietthi']}<br>"
                                    . "- Phòng thi: {$lichthi_info['phongthi']}<br><br>"
                                    . "Vui lòng sắp xếp thời gian để tham gia coi thi.";
                    $mail->send();
                    echo 'Email đã được gửi thành công.';
                } catch (Exception $e) {
                    echo "Không thể gửi email: {$mail->ErrorInfo}";
                }
            }
        } else {
            echo "Không thể thêm mới phân công giảng viên coi thi: " . mysqli_error($conn);
        }
    }
} else {
    // If machitiet doesn't exist, show an error message
    echo "Machitiet does not exist!";
}

include("footer_admin.php");
?>
