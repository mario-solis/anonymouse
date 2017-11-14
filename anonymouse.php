<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>b</title>
	</head>
	<body>
		<br/>
		<?php
			include './includes/img_counter.php';
			
			$anonymous_msg = $_POST['addForm'];
			$line_length = $_POST['screenWidthName'];
			//echo 'longitud de línea: ' . $line_length . '<br/>';
			
			// javascript deactivated => PHP validations...
			if($_POST['phpValidation'] == 'Y'){
				echo "validations.php" . "<br/>";
				include 'validations.php';
				$anonymous_msg = $textToValidate;
			}
			
			//echo "longitud de línea: " . $line_length . "<br/>";
			//echo "text to anonymouze: " . $anonymous_msg . "<br/>";
			$position_wspcs = array();
			$pos = -1;
			while (($pos = strpos($anonymous_msg, " ", $pos+1)) !== false) {
				$position_wspcs[] = $pos;
			}
			// echo "hay " . sizeof($position_wspcs) . " espacios en blanco" . "<br/>";
			//for ($r=0; $r<sizeof($position_wspcs);$r++){
			//	echo "espacio " . $r . " en posición: " . $position_wspcs[$r] . " - " . $position_wspcs[$r]*54 . "<br/>";
			//}
			
			$actual_space = 0;
			$line_num = 1;
			// iterate over String at $anonymous_msg
			for ($i = 0; $i < mb_strlen($anonymous_msg); $i++ ) {
				$pintar = mb_substr($anonymous_msg, $i, 1);
				// echo '<br/>pintando: ' . $pintar . "<br/>";
					
				//check if there is a image for the letter...
				if(array_key_exists($pintar,$num_images_per_letter)){
					// echo '<br/>existe ' .$pintar.'<br/>';
					// check how many images available per letter...
					$num_imgs_available = $num_images_per_letter[$pintar];

					// only one image, just print it!
					if($num_imgs_available==0){
						$pintar = "<img src='./img/" . $pintar . "00.png' />";
					}
					// more than 1 img for that char => RND to select img...
					if($num_imgs_available > 0){
						$pintar = "<img src='./img/" . $pintar . sprintf('%02d', rand(0,--$num_imgs_available)) .".png' />";
					}
				}
				
				// no image for the char...
				else{
					if($pintar == "'"){
						$pintar = "<img src='./img/_APOSTROPHE.png' />";
					}
					if ($pintar == " "){
						if(sizeof($position_wspcs)==1){
							$end_next_word = $position_wspcs[$actual_space] * 54;
						}
						
						if($actual_space<sizeof($position_wspcs)-1){
							$actual_space++;
							$end_next_word = $position_wspcs[$actual_space] * 54;
						}
						
						// echo $actual_space . " - " . $line*$line_num . " - " . $end_next_word;
						if(($line_length*$line_num)<$end_next_word){
							$pintar = "<br/>";
							$line_num++;
						}
						else{
							$pintar = "<img src='./img/_space00.png' />";
						}
						
					}
					
					// char doesn't has an image and it is not a space, make it bigger and print it.
					else {
						$pintar = "<span style='font-size: 105px; color: red;'>" . $pintar . "</span>";
					}
				}
				echo $pintar;
			}
			
			echo "<br/>";
			echo "<br/>";
			
			//link to PDF
			echo "<a href = 'anonymouse_pdf.php'>PDF</a>";
			
			echo "<br/>";
			
			//link to return to previous page...
			echo "<a href='index.php'>index</a>";
			
			// Captura de pantalla & enviar mail.
		?>
		<br/><br/>
	</body>
</html>
