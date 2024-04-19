<html>
	<body>
<?php
for ($i = 1; $i <= 200; $i++) {
    if ($i % 2 == 0) {
        echo '<span style="font-weight: bold; color: red;">' . $i . '</span> ';
    } else {

        echo '<span style="font-style: italic; color: blue;">' . $i . '</span> ';
    }
}
?>

<h2><span style="color :blue ">Đăng nhập hệ thống</span></h2>

    <form action="dangnhap.php" >
        <label for="username">Tên đăng nhập:</label>
        <input type="text" id="username" name="username"><br>
        <label for="password ">Mật khẩu:</label>
        <input type="password" id="password" name="password"><br><br>
        <input type="submit" value="Đăng nhập ">
    </form>


	</body>
</html>