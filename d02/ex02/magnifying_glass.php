#!/usr/bin/php
<?php
	$rigex = array(
		"/(<.*title=\")(.*)(\">)/i",
		"/(<div.*>)(.*)(<\/div)/i",
		"/(<a.*>)(.*)(<\/a)/i",
		"/(<a.*>)(.*)(<img)/i",
		"/(<span.*>)(.*)(<div)/i",
		"/(<.*title=\")(.*)(><span)/i"
	 );
	$text = get_text($argv[1]);
   	foreach ($rigex as $rig)
      	$text = preg_replace_callback($rig, "replace", $text);
   	echo($text);

	function get_text($file)
	{
   		$text = "";
   		$fd = fopen($file, 'r');
   		while (!feof($fd))
      		$text = $text . fgets($fd);
   		fclose($fd);
		return ($text);
	}
	
	function replace($matches)
   	{
      	return ($matches[1] . strtoupper($matches[2]) . $matches[3]);
   	}
?>