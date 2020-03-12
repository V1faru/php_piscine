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
	$words = array();
	for($i = 1; $argv[$i]; $i++)
		$words = array_merge($words, ft_split($argv[$i]));		
	sort($words);
	foreach($words as $word)
		echo($word . "\n");
?>