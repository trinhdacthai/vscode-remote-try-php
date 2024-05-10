<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'config/database.php';

    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM User WHERE TenUser='$username' AND MatKhau='$password'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        $_SESSION['logged_in'] = true;
        header("Location: Sach.php");
        exit();
    } else {
        echo "Tên người dùng hoặc mật khẩu không chính xác.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>
    <form action="login.php" method="POST">
        <label for="username">Username:</label><br>
        <input type="text" id="username" name="username"><br>
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password"><br><br>
        <input type="submit" value="Login">
    </form>
    <p>Chưa có tài khoản? <a href="register.php">Đăng ký ngay</a>.</p>
</body>
</html>
