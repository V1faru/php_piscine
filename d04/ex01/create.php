<?php
    if(file_exists("../htdocs/private") == false)
    {
        if(file_exists("../htdocs") == false)
            mkdir("../htdocs");
        mkdir("../htdocs/private");
    }

    if ($_POST["login"] == false || $_POST["passwd"] == false || $_POST["submit"] != "OK")
        exit ("ERROR\n");
    else
    {
        $new_user = array(
            "login" => $_POST["login"],
            "passwd" => hash('whirlpool', $_POST["passwd"])
        );

        if(file_exists("../htdocs/private/passwd"))
            $array = unserialize((file_get_contents("../htdocs/private/passwd")));
        else
            $array = array();
        foreach($array as $key => $item)
        {
            if($item["login"] === $_POST["login"])
                exit("ERROR\n");
        }
        $array[] = $new_user;
        file_put_contents("../htdocs/private/passwd", serialize($array));
        exit ("OK\n");
    }
?>