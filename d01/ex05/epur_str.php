#!/usr/bin/php
<?php
    function ft_split($str)
    {
        $word_array = array();
        $words = explode(" ", $str);
        foreach($words as $word)
            if ($word != '')
                array_push($word_array, $word);
            return($word_array);
    }

    $array = ft_split($argv[1]);
    $space = 0;
    foreach($array as $word)
    {
        if($space == 1)
            echo " ";
        echo $word;
        $space = 1;
    }
    echo "\n";
        
?>