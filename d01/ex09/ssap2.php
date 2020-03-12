#!/usr/bin/php
<?php

	$words = array();
	for($i = 1; $argv[$i]; $i++)
		$words = array_merge($words, ft_split($argv[$i]));
	usort($words, "ft_compare");
	print_words($words);

	function ft_split($str)
	{
		$word_array = array();
		$words = explode(" ", $str);
		foreach($words as $word)
			if ($word != '')
				array_push($word_array, $word);
		return($word_array);
	}
	function ft_compare($s1, $s2)
	{
    	$order = "abcdefghijklmnopqrstuvwxyz0123456789 !\"#$%&'()*+,-./:;<=>?@[\]^_`{|}~";
    	$s1 = strtolower($s1);
    	$s2 = strtolower($s2);
    	$len1 = strlen($s1);
    	$len2 = strlen($s2);
    	while ($i < $len1)
    	{	
        	if ($i >= $len2)
            	return 1;
        	$pos1 = strpos($order, $s1[$i]);
        	$pos2 = strpos($order, $s2[$i]);
        	if ($pos1 < $pos2)
            	return -1;
        	else if ($pos1 > $pos2)
            	return 1;
        	$i++;
    	}
}
	function print_words($words)
	{
		foreach($words as $word)
			if(ctype_alpha($word[0]))
				echo($word."\n");
		foreach($words as $word)
			if(ctype_digit($word[0]))
				echo($word."\n");
		foreach($words as $word)
			if(!ctype_digit($word[0]) and !ctype_alpha($word[0]))
				echo($word."\n");
	}
?>