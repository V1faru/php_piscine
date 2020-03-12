#!/usr/bin/php
<?php
	date_default_timezone_set('Europe/Paris');
	if ($argc != 2)
		exit();
	validate_time($argv[1]);
	if (validate_time2($argv[1]) == 0)
	{
		echo("Wrong Format\n");
		exit();
	}
	$time = preg_split("/ +|:/", $argv[1]);
	if (!checkdate(get_month($time[2]), $time[1], $time[3]))
		error();
	echo(mktime($time[4], $time[5], $time[6], get_month($time[2]), $time[1], $time[3]) . "\n");

	function error()
	{
    	echo "Wrong Format\n";
    	exit();
	}

	function get_month($month)
	{
		$month = strtolower($month);
		$monthsnbr = array(
			"janvier" => 1,
            "fevrier" => 2,
            "mars" => 3,
            "avril" => 4,
            "mai" => 5,
            "juin" => 6,
            "juillet" => 7,
            "aout" => 8,
            "septembre" => 9,
            "octobre" => 10,
            "novembre" => 11,
            "decembre" => 12
		);
		return($monthsnbr[$month]);
	}

	function validate_time($time)
	{
		$str = $time;
		$ary = explode(" ", $str);
		$timer = explode(":", $ary[4]);
    	if(count($ary) != 5)
			error();
    	//check to see if have extraneous tab and space
    	if(in_array("/\s+/", $ary))
			error();
    	//check the day of month
		if(!is_numeric($ary[1]) || !($ary[1] >= 1 && $ary[1] < 32))
			error();		
    	//check the time
    	if(count($timer) != 3)
			error();
    	if(!is_numeric($timer[0]) || !is_numeric($timer[1]) || !is_numeric($timer[2]))
			error();
    	if(!($timer[0] >= 1 && $timer[0] <= 24 && $timer[1] >= 0 && $timer[1] <= 59 && $timer[2] >= 0 && $timer[2] <= 59))
			error();
	}

	function validate_time2($time)
	{		
		$weekday = "/([Ll]undi|[Mm]ardi|[Mm]ercredi|[Jj]eudi|[Vv]endredi|[Ss]amedi|[Dd]imanche) ";
		$day = "([1-9]{1}|[0-9]{2}) ";
		$month = "([Jj]anvier|[Ff]vrier|[Mm]ars|[Aa]vril|[Mm]ai|[Jj]uin|[Jj]uillet|[Aa]out|[Ss]eptembre|[Oo]ctobre|[Nn]ovembre|[Dd]ecembre) ";
		$year_time = "([0-9]{4}) ([0-9]{2}):([0-9]{2}):([0-9]{2})/";
		$format = $weekday . $day . $month . $year_time;
		return preg_match($format, $time);
	}
?>