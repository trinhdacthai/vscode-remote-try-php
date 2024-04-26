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

    <form action="login" method="POST">
		<span>Username <input type="text" name="user" size="15"></span><br>
		<span>Password <input type=" password " name="pass" size="15"></span>
		<br><input type="submit" name="submit" value="Đăng nhập">
		</form>
		<?php
			if($_SERVER["REQUEST_METHOD"] == "POST");
			{
				$username = $_POST ['user'];
				$password = $_POST ['pass'];
				if($username == "admin" && $password == "11111")
				{
					echo '<b style = "color : red"> '. $username . '</b>';
				}
				else
				{
					echo 'username hoặc password không chính xác';
				}
			}
		?>
	
	</body>
</html>