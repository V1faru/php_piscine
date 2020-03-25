<?php
    include 'auth.php';
    if ($_GET["login"] == false || $_GET["passwd"] == false)
        exit ("error\n");
    if (auth($_GET['login'], $_GET['passwd']) === true)
    {
        session_start();
        $_SESSION['loggued_on_user'] = $_GET['login'];
        exit ("OK\n");
    }
    exit ("ERROR\n");
?>