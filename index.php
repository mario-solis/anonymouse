<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<script type="text/javascript" src="js/index.js"></script>
		<title>a</title>
		<link rel="icon" href="argimiro.png">
	</head>
	<body>
		<a href = 'img_counter_display.php'>counter </a>
	
		<form id= "messageCollector" action="anonymouse.php" onsubmit="return validate_form()" method="POST">
			<br/>
			text: <br/>
			<textarea id="textToAnonymouse" name="addForm" rows="5" cols="40"></textarea><br/>
			<noscript><textarea id="textToAnonymouse" name="phpValidation" style="visibility:hidden">Y</textarea><br/></noscript>
			<br/>
			<input type="submit">
		</form>
	</body>
</html>