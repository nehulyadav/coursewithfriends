<?php

//echo $_POST["var"];

$url = $_POST["var"];

//$url = "https://www.facebook.com/nicole.pollard.5876";
//https://www.facebook.com/shawnlienhardt?fref=gf&dti=389524294528093"

// "https://www.facebook.com/neena.yadav.3";

// "https://www.facebook.com/profile.php?id=1142065635";
$q = strripos($url, "?");
$s = strripos($url, "/");

if ($q == "") {
		$sub = substr($url, $s+1);
		$d = strripos($sub, ".");
		$su = substr($sub, 0, $d);
		$output = "mdfind " . $su;
} else {
	$sub = substr($url, $s+1);
	$q = strpos($sub, "?");
	$su = substr($sub, 0, $q);
	$output = "mdfind " . $su;
}

$r = str_replace(".php",".html",$output);

echo $r;
//$output = "mdfind" . "william.p.html";
$result = shell_exec($r . ".html");
$str = file_get_contents($result);

$i = strpos($str, "entity_id");
$j = strpos ($str, "\"}]]]}");
$s = substr($str, $i+12, $j);
$k = strpos ($s, "\"}]]]}");
$sub = substr($s, 0, $k);

echo $sub;

// unlink("/Users/nehulyadav/Downloads/profile.html");

?>