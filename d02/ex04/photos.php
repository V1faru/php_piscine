#!/usr/bin/php
<?php
	if ($argc != 2)
	{
		echo "Error \n";
		exit();
	}
	
	if(($fd = curl_init($argv[1])) == false)
		error();
	curl_setopt($fd, CURLOPT_FOLLOWLOCATION, true);
	curl_setopt($fd, CURLOPT_RETURNTRANSFER, true);
	$html = curl_exec($fd);

	$website = preg_replace("/https:\/\//", "", $argv[1]);
	$website = preg_replace("/http:\/\//", "", $website);
	if(!is_dir($website))
		mkdir($website);
	preg_match_all('/<img src="(.*?)".*?>/', $html, $out, PREG_SET_ORDER);
	foreach($out as $instance)
	{
		$url = $instance[1];
		if (preg_match("/https:\/\//", $url) == 0)
    	{
        	if(preg_match("/www/", $url) == 0)
            	$url = "https://www.".$website.$url;
        	else
            	$url = "https://".$website.$url;
		}
		$fd2 = curl_init ($url);
    	curl_setopt($fd2, CURLOPT_RETURNTRANSFER, 1);
    	curl_setopt($fd2, CURLOPT_BINARYTRANSFER, 1);
    	curl_setopt($fd2, CURLOPT_TIMEOUT, 2);
    	$rawdata=curl_exec($fd2);
    	curl_close ($fd2);
		file_put_contents($website."/".basename($url), $rawdata);
	}
	
	function error()
	{
		echo "Invalid URL \n";
		exit ;
	}
?>