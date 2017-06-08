<?php
	// Count images in directory...
	$dir = "./img";
	$num_imgs = 0;
	$actual_first = "a";
	$actual_total = 0;
	$num_images_per_letter = array();

	//iconv("UTF-8", "ISO-8859-1//IGNORE", $actual_first)
	//echo 'CONTENIDO:';
	//foreach (new DirectoryIterator($dir) as $file) {
	//	echo "<span style='font-weight: bold;'>" . $file . ": </span>" . mb_strlen($file) . " - " . strlen($file) . "<br/>";
	//	if ($file->isFile()) {
	//		echo 'iconv: ' . iconv("UTF-8", "ISO-8859-1//IGNORE", $file->getFilename()) . " - " . iconv("UTF-8", "ISO-8859-1//IGNORE", $file) . "<br/>"; 
	//		echo 'urldecode: ' . urldecode($file->getFilename()) . " - " . urldecode($file) . "<br/>"; 
	//		echo 'mb_substr: ' . mb_substr($file, 0, strlen($file)) . "</br>";
	//	}
	//}
	
	// Open a directory, and read its content
	if (is_dir($dir)){
		$files = scandir($dir);
		
		$only_files = array_diff($files, array('.', '..'));
		echo 'tenemos... ' . sizeof($only_files). 'imagenes. <br/>';
		echo $only_files[0] . '<br/>';
		echo $only_files[1] . '<br/>';
		echo $only_files[2] . '<br/>';
		echo $only_files[sizeof($only_files)] . '<br/>';
		foreach ($only_files as $filename) {
			echo 'archivo: ' . $filename . '<br/>';
			// if first letter of filename has already been read, we increase the number of files for that letter...
			if($actual_first == $filename[0]){
				$num_imgs++;
				}
			// if first letter of filename has changed, values are added to the array and counters are set to zero...
			else {
				$num_images_per_letter[$actual_first] = $num_imgs++;
				echo 'guardando: ' . $actual_first . ' - ' . $num_imgs++ . '<br/>';
				$actual_first = $filename[0];
				$actual_total += $num_imgs;
				$num_imgs = 1;
				}
			}
		} else{
			echo $dir ." no es un directorio!";
		}
?>
