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
			// echo 'archivo (mb): ' . $filename . '<br/>'; // linux: ñ00.png
			// convert fu*#ing characters to UTF-8
			// $file_first_letter = mb_convert_encoding($filename[0], 'UTF-8', 'pass'); // works on windows
			$file_first_letter = mb_substr(mb_convert_encoding($filename, 'UTF-8', 'pass'), 0, 1,  mb_internal_encoding()); // works on windows
			if(strlen($filename)>7){
					$file_first_letter = mb_substr(($filename),0,1);
				}
			// echo 'file_first_letter: ' . $file_first_letter .'<br/>';
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
		}
		else{
			echo $dir ." no es un directorio!";
		}
?>
