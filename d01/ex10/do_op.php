#!/usr/bin/php
<?php
    if ($argc != 4)
    {
        echo "Incorrect Parameters\n";
        exit();
    }
    $res = 0;
	$i = trim($argv[1]);
	$op = trim($argv[2]);
	$j = trim($argv[3]);
	if ($op == "+")
		$res = $i + $j;
    else if ($op == "-")
		$res = $i - $j;
	else if ($op == "*")
		$res = $i * $j;
	else if ($op == "/")
		$res = $i / $j;
	else if ($op == "%")
		$res = $i % $j;
	echo($res . "\n");
?>