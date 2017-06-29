<html>
	<head>
		<title>counter</title>
		<meta charset="UTF-8">
	</head>
	
	<body style="margin:30;padding:0">
		<?php
			include 'img_counter.php';
			
			echo 'img_counter_display.php' . '<br/>';
			
			foreach($num_images_per_letter as $key => $value) {
				//$key = mb_convert_encoding($key, 'UTF-8', 'pass');
				echo $key . ' - ';
				if($value <=2){
					echo "<span style='color: red;'>" . $value . "</span>"; 
				}
				
				else{		
					echo $value;
				}
				echo "<br/>";
			}
			
			echo '<br/>';
			
			//link to return to previous page...
			echo "<a href=".$_SERVER['HTTP_REFERER'].">BACK</a>";
			
		?>	
			
	</body>
</html>
