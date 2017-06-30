//Validations:
// - not empty
// - single space
// - replace accents
function validate_form(){
	// alert("2");
	var textToValidate, email;
	var valid=true;

	textToValidate=document.getElementById('textToAnonymouse').value;
	
	// textArea is not empty...
	if(textToValidate ==""){
		document.getElementById('textToAnonymouse').setAttribute("placeholder", "escribe algo aquí, Calamar!");
		valid=false;
	}
	
	
	if (valid == true){
		// screen width...
		getScreenWidth();
		//validations here!!!
		// trim, stripslashes, htmlspecialchars
	}
	
	return valid;
}


function getScreenWidth(){
	// alert('getScreenWidth');
	// create: textArea name = 'screenWidthName' value = screen.width 
	var textAreaScreenWidth = document.createElement("textarea");
	textAreaScreenWidth.setAttribute("name", "screenWidthName");
	var nodeScreenWidth = document.createTextNode(screen.width);
	textAreaScreenWidth.appendChild(nodeScreenWidth);
	// add textArea (screen width) to Form
	document.getElementById("messageCollector").appendChild(textAreaScreenWidth);
}