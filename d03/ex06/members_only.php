<?php
	$login = "zaz";
	$pass = "Ilovemylittleponey";
	if(($_SERVER['PHP_AUTH_USER'] === $login) && ($_SERVER['PHP_AUTH_PW'] === $pass))
	{
		$file = base64_encode(file_get_contents("../img/42.png"));
		echo "<html><body>\nHello Zaz<br />\n<img src='data:image/png;base64,".$file."'>\n</body></html>\n";
	}
	else
	{
		header("HTTP/1.0 401 Unauthorized");
		header("WWW-Authenticate: Basic realm=''Member area''");
		echo "<html><body>That area is accessible for members only</body></html>";
	}
?>