<?php
echo $_POST["var"];

$url = "\"" . $_POST["var"] . "\"";

// https://www.facebook.com/shayla.schrenk?fref=gf&dti=389524294528093\"";

$o = strpos($url, "id");

if ($o != "") {
	$s = substr($url, $o+3);
	$a = strpos($s, "&");
	if ($a == "") {
			echo str_replace('"', "", substr($url, $o+3));
	} else {
		echo substr($s, 0, $a);
	}

} else {

$output = shell_exec('curl ' . $url);

$i = strpos($output, "entity_id");
$j = strpos($output, "&amp;context");
if ($j == "") {
	$j = strpos($output, "}]]");
	$s = substr($output, $i+12);
	$k = strpos($s, "}");
	$su = substr($s, 0, $k-1);
}
else {
$s = substr($output, $i+10);
$k = strpos($s, "&");
$su = substr($s, 0, $k);
}

echo $su;

echo '<form method="get" action="rest4.php"><input type="hidden" name="var" value=' . $su . '><input type="hidden" name="var2" value=' . $_POST["var"] . '><input type="submit"></form>';

}



?>
