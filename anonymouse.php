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
			
			// array $_POST: 1 element: 
			//    K=attribute 'name' of the form; 
			//    V=text
			
			// echo 'caracteres: ' . mb_strlen($_POST['addForm']) . '<br/>';
			// iterate over String at $_POST['addForm']
			for ($i = 0; $i < mb_strlen($_POST['addForm']); $i++ ) {
				
				$pintar = mb_substr($_POST['addForm'], $i, 1);
				
				$img_name = $dir . $pintar . "00.png";
				
				//check if there is a image for the letter...
				
				if(file_exists($img_name)){
					//echo 'exist' . '<br/>';
					//num files for that character >1 => RND
					$num_imgs_available = $num_images_per_letter[$pintar];
					
					// more than 1 img for that char => cRND to select img...
					if($num_imgs_available > 1){
						echo "<img src='./img/" . $pintar . sprintf('%02d', rand(0,--$num_imgs_available)) .".png' />";
					}
					
					//num files for that character == 1 => just print it, calamar!
					else{
						echo "<img src='./img/" . $pintar . "00.png' />";
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
