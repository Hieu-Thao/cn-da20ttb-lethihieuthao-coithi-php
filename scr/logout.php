<?php
    session_start();
    session_unset(); // Xóa tất cả các biến session
    session_destroy(); // Hủy bỏ session

    echo '<script>sessionStorage.removeItem("activeItemIndex");</script>';

    echo "<script language=javascript>
        alert('Bạn đã thoát ra khỏi hệ thống!');
        window.location='index.php';
        </script> ";
    exit();
?>
