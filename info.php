<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>phpinfo</title>
	</head>
	<body>
		<?php
		
		// Muestra toda la información, por defecto INFO_ALL
		phpinfo();
		
		// Muestra solamente la información de los módulos.
		// phpinfo(8) hace exactamente lo mismo.
		phpinfo(INFO_MODULES);
		
		?>
	</body>
</html>