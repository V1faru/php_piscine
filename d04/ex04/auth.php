<?php
    function auth($login, $passwd)
    {
        $match = false;
        if (file_exists("../htdocs/private/passwd"))
            $array = unserialize((file_get_contents("../htdocs/private/passwd")));
        foreach ($array as $key => $item)
        {
            if ($item['login'] == $login)
                if ($item['passwd'] == hash("whirlpool", $passwd))
                    $match = true;
        }
        return $match;
    }
?>