<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>b</title>
	</head>
	<body>
		<br/>
		<?php
			include 'img_counter.php';
			
			$anonymous_msg = $_POST['addForm'];
			
			// javascript deactivated...
			if($_POST['phpValidation'] == 'Y'){
				include 'validations.php';
				$anonymous_msg = $textToValidate;
			}
			// $char_array = mb_substr($_POST['addForm'],mb_strlen($_POST['addForm'],'UTF-8'),1);
			// echo 'ancho pantalla: ' . $_POST['screenWidthName'] . '<br/>';
			
			// iterate over String at $anonymous_msg
			for ($i = 0; $i < mb_strlen($anonymous_msg); $i++ ) {
				$pintar = mb_substr($anonymous_msg, $i, 1);
				// echo 'pintando: ' . $pintar;
					
				//check if there is a image for the letter...
				if(array_key_exists($pintar,$num_images_per_letter)){
					//echo $pintar . ' exist!' . '<br/>';
					$num_imgs_available = $num_images_per_letter[$pintar];
					
					// only one image, just print it!
					if($num_imgs_available==0){
						echo "<img src='./img/" . $pintar . "00.png' />";
					}
					// more than 1 img for that char => RND to select img...
					if($num_imgs_available > 0){
						echo "<img src='./img/" . $pintar . sprintf('%02d', rand(0,--$num_imgs_available)) .".png' />";
					}
				}
				
				// no image for the char...
				else{
					// space management (css?)....
					if ($pintar == " "){
						$pintar = "<img src='./img/space00.png' />";
					}
					
					// char doesn't has an image and it is not a space, make it bigger and print it.
					else {
						$pintar = "<span style='font-size: 81px; color: red;'>" . $pintar . "</span>";
					}
					echo $pintar;
				}
			}
			
			echo "<br/>";
			echo "<br/>";
			
			//link to return to previous page...
			echo "<a href='index.php'>index</a>";
			
			// Captura de pantalla & enviar mail.
		?>
		<br/><br/>
	</body>
</html>
