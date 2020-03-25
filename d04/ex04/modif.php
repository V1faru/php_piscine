<?php

    $loginexists = false;
    if ($_POST["login"] && $_POST["oldpw"] && $_POST["newpw"] && $_POST["submit"] && $_POST["submit"] === "OK")
    {
        if ($_POST["newpw"] === $_POST["oldpw"])
            error();
        if (file_exists("../htdocs/private/passwd"))
            $array = unserialize((file_get_contents("../htdocs/private/passwd")));
        else
            $array = array();
        foreach ($array as $key => &$entry)
        {
            if ($entry['login'] === $_POST['login'])
            {
                $loginexists = true;
                if ($entry['passwd'] == hash("whirlpool", $_POST['oldpw']))
                    $entry['passwd'] = hash("whirlpool", $_POST['newpw']);
                else
                    error();
                break;
            }
        }
        if ($loginexists == false)
            error();
        file_put_contents("../htdocs/private/passwd", serialize($array));
        echo "OK\n";
        header("Location: ./index.html");
        exit ();
    }

    function error()
    {
        echo "ERROR\n";
        exit ;
    }
?>