<html>
	<body>
		<form action="index.php" method="get">
				Từ khóa: 
                <input type="text" name="txtTukhoa" /></br>
                <input type="submit" value="Tìm">
		</form>
	
		<?php
			$sTukhoa = $_REQUEST["txtTukhoa"];

			if(isset($sTukhoa)){
				print "Từ khóa tìm sách là: $sTukhoa";
				echo "<br>Kết quả tìm là: ";
			}
		?>

	</body>
</html>