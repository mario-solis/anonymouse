<?php
	// echo 'validations.php' . "<br/>";
	// screen width...
	// phph can't get screen width... CSS?


	$textToValidate = $_POST['addForm'];
	// text to validate is empty...
	if (strlen($textToValidate) <1){
		echo "ja payo que no m'escribiste ná!" . "<br/>";
		echo "<a href='index.php'>index</a>";
	}
	
	// text to validate is not empty => validations...
	else{
		//replace foreign chars, accents...
		$foreign_char_array =  array('Á'=>'a','á'=>'a','À'=>'a','à'=>'a','Â'=>'a','â'=>'a','Ä'=>'a','ä'=>'a','Ǎ'=>'a','ǎ'=>'a','Ă'=>'a','ă'=>'a','Ā'=>'a','ā'=>'a','Ã'=>'a','ã'=>'a','Å'=>'a','å'=>'a','Ą'=>'a','ą'=>'a','Ǻ'=>'a','ǻ'=>'a','Æ'=>'ae','æ'=>'ae','Ǽ'=>'ae','ǽ'=>'ae','Ć'=>'c','ć'=>'c','Ċ'=>'c','ċ'=>'c','Ĉ'=>'c','ĉ'=>'c','Č'=>'c','č'=>'c','Ç'=>'c','ç'=>'c','Ď'=>'d','ď'=>'d','Đ'=>'d','đ'=>'d','Ð'=>'d','É'=>'e','é'=>'e','È'=>'c','è'=>'e','Ė'=>'e','ė'=>'e','Ê'=>'e','ê'=>'e','Ë'=>'e','ë'=>'e','Ě'=>'e','ě'=>'e','Ĕ'=>'e','ĕ'=>'e','Ē'=>'e','ē'=>'e','Ę'=>'e','ę'=>'e','ƒ'=>'f','Ġ'=>'g','ġ'=>'g','Ĝ'=>'g','ĝ'=>'g','Ğ'=>'g','ğ'=>'g','Ģ'=>'g','ģ'=>'g','Ĥ'=>'h','ĥ'=>'h','Ħ'=>'h','ħ'=>'h','ı'=>'i','Í'=>'i','í'=>'i','Ì'=>'i','ì'=>'i','İ'=>'i','Î'=>'i','î'=>'i','Ï'=>'i','ï'=>'i','Ǐ'=>'i','ǐ'=>'i','Ĭ'=>'i','ĭ'=>'i','Ī'=>'i','ī'=>'i','Ĩ'=>'i','ĩ'=>'i','Į'=>'i','į'=>'i','Ĳ'=>'ij','ĳ'=>'ij','Ĵ'=>'j','ĵ'=>'j','Ķ'=>'k','ķ'=>'k','Ĺ'=>'l','ĺ'=>'l','Ŀ'=>'l','ŀ'=>'l','Ľ'=>'l','ľ'=>'l','Ļ'=>'l','ļ'=>'l','Ł'=>'l','ł'=>'l','Ń'=>'n','ń'=>'n','Ň'=>'n','ň'=>'n','Ņ'=>'n','ņ'=>'n','ŉ'=>'n','Ó'=>'o','ó'=>'o','Ò'=>'o','ò'=>'o','Ô'=>'o','ô'=>'o','Ö'=>'o','ö'=>'o','Ǒ'=>'o','ǒ'=>'o','Ŏ'=>'o','ŏ'=>'o','Ō'=>'o','ō'=>'o','Õ'=>'o','õ'=>'o','Ő'=>'o','ő'=>'o','Ø'=>'o','ø'=>'o','Ǿ'=>'o','ǿ'=>'o','Ơ'=>'o','ơ'=>'o','Œ'=>'oe','œ'=>'oe','Ŕ'=>'r','ŕ'=>'r','Ř'=>'r','ř'=>'r','Ŗ'=>'r','ŗ'=>'r','Ś'=>'s','ś'=>'s','Ŝ'=>'s','ŝ'=>'s','Š'=>'s','š'=>'s','Ş'=>'s','ş'=>'s','ß'=>'s','ſ'=>'s','Ť'=>'t','ť'=>'t','Ţ'=>'t','ţ'=>'t','Ŧ'=>'t','ŧ'=>'t','Ú'=>'u','ú'=>'u','Ù'=>'u','ù'=>'u','Û'=>'u','û'=>'u','Ü'=>'u','ü'=>'u','Ǔ'=>'u','ǔ'=>'u','Ŭ'=>'u','ŭ'=>'u','Ū'=>'u','ū'=>'u','Ũ'=>'u','ũ'=>'u','Ů'=>'u','ů'=>'u','Ų'=>'u','ų'=>'u','Ű'=>'u','ű'=>'u','Ǘ'=>'u','ǘ'=>'u','Ǜ'=>'u','ǜ'=>'u','Ǚ'=>'u','ǚ'=>'u','Ǖ'=>'u','ǖ'=>'u','Ư'=>'u','ư'=>'u','Ŵ'=>'w','ŵ'=>'w','Ý'=>'t','ý'=>'y','Ŷ'=>'y','ŷ'=>'y','ÿ'=>'y','Ÿ'=>'y','Ź'=>'z','ź'=>'z','Ż'=>'z','ż'=>'z','Ž'=>'z','ž'=>'z');
		
		// echo $textToValidate . "<br/>";
		$textToValidate = mb_convert_case($_POST['addForm'], MB_CASE_LOWER);
		$length_validate = mb_strlen($textToValidate);
		
		// only numbers and letters and foreign character replacement...
		$result = "";
		
		for($i=0; $i<=$length_validate; $i++) {
			$validate = mb_substr($textToValidate, $i, 1);
			
			$lower = mb_convert_case($validate, MB_CASE_LOWER);
			$upper = mb_convert_case($validate, MB_CASE_UPPER);
			// check for letters and numbers...
			if(preg_match('/^[0-9]*$/', $validate)|| ($lower != $upper) || (trim($lower) == '') ){
				// replace foreign characters...
				if(array_key_exists($validate, $foreign_char_array)){
					$validate = $foreign_char_array[$validate];
				}
				$result .= $validate;
			}
		}
		$textToValidate =  $result;
		//echo "text to validate: " . $textToValidate . "<br/>";
	
		// single space...
		$textToValidate = trim(preg_replace('/\s+/', ' ',$textToValidate));
	}
?>