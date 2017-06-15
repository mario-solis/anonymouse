<?php
	//echo 'img_counter.php' .'<br/>';
	// Count images in directory...
	$dir = "./img/";
	$num_imgs = 0;
	$actual_first = "a";
	$num_images_per_letter = array();

	
	// Open a directory, and read its content
	if (is_dir($dir)){
		$files = scandir($dir);
		
		$only_files = array_diff($files, array('.', '..'));
		$last_file = end($only_files);

		
		foreach ($only_files as $filename) {
			// convert fu*#ing characters to UTF-8
			$file_first_letter = mb_convert_encoding($filename[0], 'UTF-8', 'pass');
			
			// if first letter of filename has already been read, we increase the number of files for that letter...
			if($actual_first == $file_first_letter){
				//echo 'revisando ' . $actual_first . '<br/;>';
				$num_imgs++;
				}
			// if first letter of filename has changed...
			else {
				//values are added to the array and counters are set to zero...
				$num_images_per_letter[$actual_first] = $num_imgs;
				//echo 'guardando: ' . $actual_first . '</br>';
				// counters are set to zero...
				//echo 'archivo: ' . $filename . '<br/>';
				$actual_first = $file_first_letter;
				//echo 'revisaNdo ' . $actual_first . '<br/;>';
				$num_imgs = 1;
				// if it is the last element of the array...
				if($filename == $last_file){
					$num_images_per_letter[$actual_first] = $num_imgs;
					//echo 'guardando: ' . $actual_first . '</br>';
					}
				}
			}
		} else{
			echo $dir ." no es un directorio!";
		}
?>
