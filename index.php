<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>a</title>
	</head>
	<body>
		<script language="javascript">
			//alert("1");
			function validate_form(){
				//alert("2");
				var textToValidate, email;
				var valid=true;
				
				//validations here!!!
				// trim, stripslashes, htmlspecialchars

				textToValidate=document.getElementById('textToAnonymouse').value;
				
				
				if(textToValidate ==""){
					document.getElementById('textToAnonymouse').setAttribute("placeholder", "escribe algo aquí, Calamar!");
					valid=false;
				}
				
				if (valid == true){
					var textAreaScreenWidth = document.createElement("textarea");
					var nodeScreenWidth = document.createTextNode(screen.width);
					textAreaScreenWidth.setAttribute("name", "screenWidthName");
					textAreaScreenWidth.appendChild(nodeScreenWidth);
					
					var element = document.getElementById("messageCollector");
					element.appendChild(textAreaScreenWidth);					
				}
				
				return valid;
			}
		</script>
	
		<a href = 'img_counter_display.php'>counter </a>
	
		<form id= "messageCollector" action="anonymouse.php" onsubmit="return validate_form()" method="POST">
			<br/>
			text: <br/>
			<textarea id="textToAnonymouse" name="addForm" rows="5" cols="40"></textarea><br/>
			<br/>
			<input type="submit">
		</form>
	</body>
</html>