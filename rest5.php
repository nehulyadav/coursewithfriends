<?php


$url = $_POST["var2"];
echo $url;

$fbi = $_POST["var"];
echo $fbi;

echo '<script>setTimeout(function(){ var a = document.createElement(\'a\'); var linkText = document.createTextNode(""); a.setAttribute("id", "link"); a.href = "https://www.facebook.com/profile.php?id=' . $fbi . '&lst=1142065635%3A1142065635%3A1514114386&sk=friends&source_ref=pb_friends_tl";a.download = true;document.body.appendChild(a);document.getElementById("link").click();}, 1000);</script>';

// //https://www.facebook.com/shawnlienhardt?fref=gf&dti=389524294528093"

// // "https://www.facebook.com/neena.yadav.3";

// // "https://www.facebook.com/profile.php?id=1142065635";

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

echo $result;

$str = file_get_contents(trim($result));
echo $str;

// //$str = file_get_contents("/Users/nehulyadav/Downloads/profile.html");
$i = strpos($str, ",list:");
$j = strpos ($str, "shortProfiles");
$s = substr($str, $i+7, $j-2);
$k = strpos($s, "],");
$sub = substr($s, 0, $k);

$a = explode(',', $sub);

// for ($i = 0; $i < sizeof($a); $i++) {
	
// $ch = curl_init();

// $url= "https://graph.facebook.com/v2.5/" . $a[$i] . "?access_token=EAAMkG1ZAcjB8BAGZAE1WjeXXhuSV8qk3PZBZAOT395NM9wZBTFU8ZBiZC2MYi1vap0VidwWjmN0QZAbkuCNbUaOZA9fkh4XUSiMXROMcYEFksz2gNYmutRlBAkuIlbkkLvYHSs3tORp6r6hEZBbeFTjFj0xHiDYA6ZCLdIWUyAbzTm0gwZDZD";

// curl_setopt($ch, CURLOPT_URL, $url);
// curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

// $result = curl_exec($ch);
// if (curl_errno($ch)) {
//     echo 'Error:' . curl_error($ch);
// }

// $json = json_decode($result, true);

// echo "<li>" . $json['name'] . "</li>";
// // array_push($r, $json['name']);

// echo "</br>";

// //print_r($r);

// //echo $result;
// curl_close ($ch);

// unlink("/Users/nehulyadav/Downloads/profile (1).html");

?>