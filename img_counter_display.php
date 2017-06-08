<html>
	<head>
		<title>counter</title>
	</head>
	
	<body style="margin:30;padding:0">
		<?php
			include 'img_counter.php';
			
			foreach($num_images_per_letter as $key => $value) {
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
					
		
		$text = "./img/ñ00.png";
		
		echo 'Original : ', $text, '</br/>';
		if(file_exists($text)){
			echo 'EXIST';
		} else {echo 'NO!';}
		echo '</br/>';
		
		$fileLile = iconv("UTF-8", "ISO-8859-1//TRANSLIT", $text);
		echo 'TRANSLIT : ', $fileLile, '</br/>';
		if(file_exists($fileLile)){
			echo 'EXIST';
		} else {echo 'NO!';}
		echo '</br/>';
		
		$fileLile = iconv("UTF-8", "ISO-8859-1//IGNORE", $text);
		echo 'IGNORE   : ', $fileLile, '</br/>';
		if(file_exists($fileLile)){
			echo 'EXIST';
		} else {echo 'NO!';}
		echo '</br/>';
		
		$fileLile = iconv("UTF-8", "ISO-8859-1", $text);
		echo 'Plain    : ', $fileLile, '</br/>';
		if(file_exists($fileLile)){
			echo 'EXIST';
		} else {echo 'NO!';}
		echo '</br/>';
		
		?>
		
		
		
		
	</body>
</html>