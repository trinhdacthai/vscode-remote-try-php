<html>
	<body>
	<h2>Ví dụ 1:</h2>
		<p>Văn bản HTML.</p>
		<?php 
		
		echo '<p>Văn bản PHP!</p>';
			
		?>
		<p>Văn bản khác.</p>

		<h2>Ví dụ 2:</h2>
		<?php

			echo '<p>Khối dữ liệu PHP 1.</p>';

		?>
		<p>Dữ liệu HTML, <?php echo 'Dữ liệu PHP 2.'; ?></p>
		<?php echo'<b>'; ?>
			Một ví dụ kết hợp HTML & PHP
		<?php echo'</b>'; ?>

		<?php
			$NgonNgu1 = "PHP";
			$Ngonngu2 = "ASP .NET";
			echo $NgonNgu1, "và", $Ngonngu2, "là ngôn ngữ lập trình WEBSITE";

		?>


		<?php
			$num1 = 10;
			$num2 = 20;
			printf("%d+%d=%d",$num1,$num2,$num1+$num2 );
		?>

		<?php 
			define("PI", 3.14);
			$r=10;
			$s= PI * pow($r ,2);
			$p = 2 * PI * $r;
		?> <br>

<?php
for ($i = 1; $i <= 200; $i++) {
    if ($i % 2 == 0) {
        echo '<span style="font-weight: bold; color: red;">' . $i . '</span> ';
    } else {

        echo '<span style="font-style: italic; color: blue;">' . $i . '</span> ';
    }
}
?>
	

	</body>
</html>