#!/usr/bin/php
<?php
    if ($argc != 2)
    {
        echo "Incorrect Parameters\n";
        exit();
    }

	$string = $argv[1];
    $nbr1 = "";
    $nbr2 = "";
    $i = 0;
    while(strlen($string) > $i && strpos("-+/*%", $string[$i]) == FALSE)
    {
        $nbr1 = $nbr1.$string[$i];
         $i++;
    }
    if(strlen($string) != $i)
        $operator = $string[$i++];
    while(strlen($string) > $i)
    {
        $nbr2 = $nbr2.$string[$i];
         $i++;
    }
    $nbr1 = preg_replace('/\s+/', '', $nbr1);
    $nbr2 = preg_replace('/\s+/', '', $nbr2);
    if(!is_numeric($nbr1) || !is_numeric($nbr2))
    {
        echo "Syntax Error\n";
        exit ;
    }
    if($operator == '+')
        $answer = $nbr1 + $nbr2;
    else if($operator == '-')
        $answer = $nbr1 - $nbr2;
    else if($operator == '*')
        $answer = $nbr1 * $nbr2;
    else if($operator == '/')
        $answer = $nbr1 / $nbr2;
    else if($operator == '%')
        $answer = $nbr1 % $nbr2;
	echo $answer."\n";
?>