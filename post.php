<?php

$url = "https://www.facebook.com/neena.yadav.3/friends?lst=100003163463906%3A100003163463906%3A1514555111&source_ref=pb_friends_tl;";
$output = shell_exec('curl ' . $url);
echo $output;

?>