<html>
	<head>
		<title>img_db</title>
		<meta charset="UTF-8">
	</head>
	
	<body style="margin:30;padding:0">
		<?php
			include './includes/img_counter.php';
			
			//echo 'img_counter_display.php' . '<br/>';
			
			foreach($num_images_per_letter as $key => $value) {
				//$key = mb_convert_encoding($key, 'UTF-8', 'pass');
				echo $key . ' - ';
				if($value <=2){
					echo "<span style='color: red;'>" . $value . "</span>"; 
				}
				
				else{		
					echo $value;
				}

				while ($value--) 	echo "<img src='./img/" . $key .  sprintf("%02d", $value) . ".png' style='margin-left:5px' />";
				
				echo "<br/>";
			}
			
			echo '<br/>';
			
			//link to return to previous page...
			echo "<a href='index.php'>index</a>";
			
		?>	
			
	</body>
</html>
