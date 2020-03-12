#!/usr/bin/php
<?php
    function ft_split($str)
    {
        $word_array = array();
        $words = explode(" ", $str);
        foreach($words as $word)
			if ($word != '')
				array_push($word_array, $word);
		sort($word_array);
		return($word_array);
    }
?>