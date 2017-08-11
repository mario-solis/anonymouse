//Validations:
// - not empty
// - single space
// - replace accents
function validate_form(){
	//console.log("validate_form");
	var textToValidate;
	var emial;
	var valid=true;

	textToValidate=document.getElementById('textToAnonymouse').value;
	
	// textArea is empty...
	if(textToValidate ==""){
		document.getElementById('textToAnonymouse').setAttribute("placeholder", "escribe algo aquí, Calamar!");
		valid=false;
	}
	
	if (valid == true){
		// if js is activated, php validation is not needed ...
		addPhpValidation();
		
		// screen width...
		getScreenWidth();
		
		// single space...
		textToValidate = textToValidate.replace(/\s{2,}/g,' ');
			
		// only letters, numbers, question and exclamation marks...
		textToValidate = removeSpecial(textToValidate);		
		
		//replace foreign chars, accents...
		textToValidate = replaceForeignChars(textToValidate);
		document.getElementById('textToAnonymouse').value = textToValidate;		
	}
	return valid;
}

function addPhpValidation(){
	// create: textArea name = 'phpValidation' value = 'N' style='display:none'
	var textAreaPhpValidation = document.createElement("textarea");
	textAreaPhpValidation.setAttribute("name", "phpValidation");
	var nodePhpValidation = document.createTextNode('N');
	textAreaPhpValidation.appendChild(nodePhpValidation);
	textAreaPhpValidation.style.display = 'none';
	// add textArea (screen width) to Form
	document.getElementById("messageCollector").appendChild(textAreaPhpValidation);
}


function getScreenWidth(){
	// create: textArea name = 'screenWidthName' value = screen.width style='display:none'
	var textAreaScreenWidth = document.createElement("textarea");
	textAreaScreenWidth.setAttribute("name", "screenWidthName");
	var nodeScreenWidth = document.createTextNode(screen.width);
	textAreaScreenWidth.appendChild(nodeScreenWidth);
	textAreaScreenWidth.style.display = 'none';
	// add textArea (screen width) to Form
	document.getElementById("messageCollector").appendChild(textAreaScreenWidth);
}

//return true if char is a number
function isNumber (text) {
  reg = new RegExp('[0-9]+$');
  if(text) {
    return reg.test(text);
  }
  return false;
}

// only letters, numbers, question and exclamation marks.
function removeSpecial (text) {
	if(text) {
		var qeMarks = ['¿','?','¡','!',"'"];
		var lower = text.toLowerCase();
		var upper = text.toUpperCase();
		var result = "";
		
		for(var i=0; i<lower.length; ++i) {
			console.log('lower' + lower[i]);
			console.log('indice de ' + text[i] + ': ' + qeMarks.indexOf(text[i]));
			if(isNumber(text[i]) || (lower[i] != upper[i]) || (lower[i].trim() === '') || qeMarks.indexOf(text[i]) > 0) {
				result += lower[i];
			}
		}
    return result;
  }
  return '';
}


function replaceForeignChars(form){
	var a = ['À', 'Á', 'Â', 'Ã', 'Ä', 'Å', 'Æ', 'Ç', 'È', 'É', 'Ê', 'Ë', 'Ì', 'Í', 'Î', 'Ï', 'Ð', 'Ò', 'Ó', 'Ô', 'Õ', 'Ö', 'Ø', 'Ù', 'Ú', 'Û', 'Ü', 'Ý', 'ß', 'à', 'á', 'â', 'ã', 'ä', 'å', 'æ', 'ç', 'è', 'é', 'ê', 'ë', 'ì', 'í', 'î', 'ï', 'ò', 'ó', 'ô', 'õ', 'ö', 'ø', 'ù', 'ú', 'û', 'ü', 'ý', 'ÿ', 'Ā', 'ā', 'Ă', 'ă', 'Ą', 'ą', 'Ć', 'ć', 'Ĉ', 'ĉ', 'Ċ', 'ċ', 'Č', 'č', 'Ď', 'ď', 'Đ', 'đ', 'Ē', 'ē', 'Ĕ', 'ĕ', 'Ė', 'ė', 'Ę', 'ę', 'Ě', 'ě', 'Ĝ', 'ĝ', 'Ğ', 'ğ', 'Ġ', 'ġ', 'Ģ', 'ģ', 'Ĥ', 'ĥ', 'Ħ', 'ħ', 'Ĩ', 'ĩ', 'Ī', 'ī', 'Ĭ', 'ĭ', 'Į', 'į', 'İ', 'ı', 'Ĳ', 'ĳ', 'Ĵ', 'ĵ', 'Ķ', 'ķ', 'Ĺ', 'ĺ', 'Ļ', 'ļ', 'Ľ', 'ľ', 'Ŀ', 'ŀ', 'Ł', 'ł', 'Ń', 'ń', 'Ņ', 'ņ', 'Ň', 'ň', 'ŉ', 'Ō', 'ō', 'Ŏ', 'ŏ', 'Ő', 'ő', 'Œ', 'œ', 'Ŕ', 'ŕ', 'Ŗ', 'ŗ', 'Ř', 'ř', 'Ś', 'ś', 'Ŝ', 'ŝ', 'Ş', 'ş', 'Š', 'š', 'Ţ', 'ţ', 'Ť', 'ť', 'Ŧ', 'ŧ', 'Ũ', 'ũ', 'Ū', 'ū', 'Ŭ', 'ŭ', 'Ů', 'ů', 'Ű', 'ű', 'Ų', 'ų', 'Ŵ', 'ŵ', 'Ŷ', 'ŷ', 'Ÿ', 'Ź', 'ź', 'Ż', 'ż', 'Ž', 'ž', 'ſ', 'ƒ', 'Ơ', 'ơ', 'Ư', 'ư', 'Ǎ', 'ǎ', 'Ǐ', 'ǐ', 'Ǒ', 'ǒ', 'Ǔ', 'ǔ', 'Ǖ', 'ǖ', 'Ǘ', 'ǘ', 'Ǚ', 'ǚ', 'Ǜ', 'ǜ', 'Ǻ', 'ǻ', 'Ǽ', 'ǽ', 'Ǿ', 'ǿ'];
	
	var b = ['a', 'a', 'a', 'a', 'a', 'a', 'ae', 'c', 'c', 'e', 'e', 'e', 'i', 'i', 'i', 'i', 'd', 'o', 'o', 'o', 'o', 'o', 'o', 'u', 'u', 'u', 'u', 't', 's', 'a', 'a', 'a', 'a', 'a', 'a', 'ae', 'c', 'e', 'e', 'e', 'e', 'i', 'i', 'i', 'i', 'o', 'o', 'o', 'o', 'o', 'o', 'u', 'u', 'u', 'u', 'y', 'y', 'a', 'a', 'a', 'a', 'a', 'a', 'c', 'c', 'c', 'c', 'c', 'c', 'c', 'c', 'd', 'd', 'd', 'd', 'e', 'e', 'e', 'e', 'e', 'e', 'e', 'e', 'e', 'e', 'g', 'g', 'g', 'g', 'g', 'g', 'g', 'g', 'h', 'h', 'h', 'h', 'i', 'i', 'i', 'i', 'i', 'i', 'i', 'i', 'i', 'i', 'ij', 'ij', 'j', 'j', 'k', 'k', 'l', 'l', 'l', 'l', 'l', 'l', 'l', 'l', 'l', 'l', 'n', 'n', 'n', 'n', 'n', 'n', 'n', 'o', 'o', 'o', 'o', 'o', 'o', 'oe', 'oe', 'r', 'r', 'r', 'r', 'r', 'r', 's', 's', 's', 's', 's', 's', 's', 's', 't', 't', 't', 't', 't', 't', 'u', 'u', 'u', 'u', 'u', 'u', 'u', 'u', 'u', 'u', 'u', 'u', 'w', 'w', 'y', 'y', 'y', 'z', 'z', 'z', 'z', 'z', 'z', 's', 'f', 'o', 'o', 'u', 'u', 'a', 'a', 'i', 'i', 'o', 'o', 'u', 'u', 'u', 'u', 'u', 'u', 'u', 'u', 'u', 'u', 'a', 'a', 'ae', 'ae', 'o', 'o'];

	var i = a.length;
	while (i--) form = form.replace(a[i], b[i]);
	return form;	
}