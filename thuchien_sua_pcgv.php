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
            } else {
                echo "Không thể thêm mới phân công giảng viên coi thi: " . mysqli_error($conn);
            }
        }
    } else {
        // If machitiet doesn't exist, show an error message
        echo "Machitiet does not exist!";
    }
?>
