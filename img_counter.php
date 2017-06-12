<?php
	// Count images in directory...
	$dir = "./img/";
	$num_imgs = 0;
	$actual_first = "a";
	$num_images_per_letter = array();

	
	// Open a directory, and read its content
	if (is_dir($dir)){
		$files = scandir($dir);
		
		$only_files = array_diff($files, array('.', '..'));
		
		//	echo 'contiene' . sizeof($only_files). '<br/>';
		
		// TODO: revisar esto, calamar!
		for($i=0; $i<=sizeof($only_files); $i++){
			$filename = $only_files[i];
		}
		
		foreach ($only_files as $filename) {
			// if first letter of filename has already been read, we increase the number of files for that letter...
			if($actual_first == $filename[0]){
				// echo 'archivo: ' . $filename . '<br/>';
				$num_imgs++;
				}
			// if first letter of filename has changed...
			else {
				//values are added to the array and counters are set to zero...
				$num_images_per_letter[$actual_first] = $num_imgs++;
				// echo 'guardando: ' . $actual_first . ' - ' . $num_imgs++ . '<br/>';
				// counters are set to zero...
				// echo 'archivo: ' . $filename . '<br/>';
				$actual_first = $filename[0];
				$num_imgs = 1;
				// if it is the last element of the array...
				if($filename = end($only_files)){
					$num_images_per_letter[$actual_first] = $num_imgs;
					// echo 'guardando: ' . $filename . ' - ' . $num_imgs++ . '<br/>';
					}
				}
			}
		} else{
			echo $dir ." no es un directorio!";
		}
?>
