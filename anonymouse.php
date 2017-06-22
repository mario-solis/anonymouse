<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>b</title>
	</head>
	<body>
		<br/>
		<?php
			include 'img_counter.php';
			
			echo "<br/>";
			
			//convert array $_POST (1 element: K=attribute 'name' of the form; V=text) into a array of chars...
			$char_array = str_split($_POST['addForm']);
			//$char_array = mb_substr($_POST['addForm'],mb_strlen($_POST['addForm'],'UTF-8'),1);
			//echo 'ancho pantalla: ' . $_POST['screenWidthname'] . '<br/>';
			
			// iterate over String at $_POST['addForm']
			for ($i = 0; $i < mb_strlen($_POST['addForm']); $i++ ) {
				$pintar = mb_substr($_POST['addForm'], $i, 1);
					
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
			echo "<a href=".$_SERVER['HTTP_REFERER'].">BACK</a>";
			
			// Captura de pantalla & enviar mail.
		?>
		<br/><br/>
	</body>
</html>