<?php
$url = $_POST["var"];
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

//$str = file_get_contents("/Users/nehulyadav/Downloads/profile.html");
$i = strpos($str, ",list:");
$j = strpos ($str, "shortProfiles");
$s = substr($str, $i+7, $j-2);
$k = strpos($s, "],");
$sub = substr($s, 0, $k);

echo $sub;

// unlink("/Users/nehulyadav/Downloads/profile (1).html");

?>