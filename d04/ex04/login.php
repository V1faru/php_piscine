<?php
    include 'auth.php';
    if ($_POST["login"] && $_POST["passwd"] && auth($_POST['login'], $_POST['passwd']))
    {
        session_start();
        $_SESSION['loggued_on_user'] = $_POST['login'];
        echo '
        <!DOCTYPE html>
        <html>
			<head>
				<meta charset="UTF-8">
				<title>42 Chat</title>
			</head>
			<body>
				<iframe name="chat" src="chat.php" width="100%" height="550px"></iframe>
				<iframe name="speak" src="speak.php" width="100%" height="50px"></iframe>
			</body>
        </html>
       ';
    }
    else
    {
        header('Location: ./index.html');
        exit ("ERROR\n");
    }
        
?>