<?php 

echo $_GET["var"];
echo $_GET["var2"];

echo '<script>setTimeout(function(){ var a = document.createElement(\'a\'); var linkText = document.createTextNode(""); a.setAttribute("id", "link"); a.href = "https://www.facebook.com/profile.php?id=' .  $_GET["var"] . '&lst=1142065635%3A1142065635%3A1514114386&sk=friends&source_ref=pb_friends_tl";a.download = true;document.body.appendChild(a);document.getElementById("link").click();}, 1000);</script>';

$url = $_GET["var2"];

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

//echo $r;
//$output = "mdfind" . "william.p.html";
$result = shell_exec($r . ".html");

$str = file_get_contents(trim($result));

//$str = file_get_contents("/Users/nehulyadav/Downloads/profile.html");
$i = strpos($str, ",list:");
$j = strpos ($str, "shortProfiles");
$s = substr($str, $i+7, $j-2);
$k = strpos($s, "],");
$sub = substr($s, 0, $k);

$a = explode(',', $sub);

for ($i = 0; $i < sizeof($a); $i++) {
	
$ch = curl_init();

$un = str_replace("\"", "", $a[$i]);

$k = strpos($un, "-");

echo '<script> var person = prompt("Hang tight for your friends list... Till then, what courses will you take next semester?");

</script>';

$url= "https://graph.facebook.com/v2.5/" . substr($un, 0, $k) . "?access_token=EAAMkG1ZAcjB8BAGZAE1WjeXXhuSV8qk3PZBZAOT395NM9wZBTFU8ZBiZC2MYi1vap0VidwWjmN0QZAbkuCNbUaOZA9fkh4XUSiMXROMcYEFksz2gNYmutRlBAkuIlbkkLvYHSs3tORp6r6hEZBbeFTjFj0xHiDYA6ZCLdIWUyAbzTm0gwZDZD";

curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

$result = curl_exec($ch);
if (curl_errno($ch)) {
    echo 'Error:' . curl_error($ch);
}

$json = json_decode($result, true);

echo "<li>" . $json['name'] . "</li>";
// array_push($r, $json['name']);

echo "</br>";

//print_r($r);
}
//echo $result;
curl_close ($ch);

echo '<form method="get" action="rest5.php"><input type="hidden" name="var2" value=' . $_GET["var2"] . '><input type="submit"></form>';

?>


