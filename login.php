<?php 
    session_start(); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css_login.css">
    <title>Document</title>
    <style>
        body{
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 95vh;
        }
    </style>
</head>
<body>
    <div class="login_box">
        <img src="logo_set1.png" alt="Logo">
        <h2>QUẢN LÝ CÔNG TÁC COI THI <br> KHOA KỸ THUẬT VÀ CÔNG NGHỆ</h2>
        
            <form action="xulydangnhap.php" name="dangnhap" method="post">
            <div class="login_input">
                <input type="text" name="tendn" placeholder="Email" required>
                <input type="password" name="matkhau" placeholder="Mật khẩu" required>
                <div class="login_remember">
                    <input id="remember_pw" type="checkbox">
                    <label for="remember_pw">Nhớ mật khẩu</label>
                </div>
                <button type="submit" name="dn">Đăng nhập</button>
            </form>
        </div>
    </div>
</body>
</html>