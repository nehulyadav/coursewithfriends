<?php 

$ch = curl_init();

$url= "https://graph.facebook.com/oauth/access_token?client_id=884124761754655&client_secret=28c0cdcf4cc94f3e5ee7308c4990689e&grant_type=fb_exchange_token&fb_exchange_token=EAAMkG1ZAcjB8BAFNLWoNJy8282kjxkPfND5qTEJqh1cLoKq34PwPcKMmnMMLaFdU5bH28NyICEj7hSmtCnoEqKX7PkbWNjZCro43iF1CY4n6HwckOmqrmJHFMGfsA8FAZCPqzYuqoZA88b8ecKKy8o9axxKysWxGiERnd54DXyYuzikua7X8SwblE8j6tXEZD";


// /oauth/access_token?
// grant_type=fb_exchange_token&
// client_id={app-id}& client_secret={app-secret}& fb_exchange_token={short-lived-token}

// $url = "https://graph.facebook.com/oauth/access_token?client_id=884124761754655&client_secret=28c0cdcf4cc94f3e5ee7308c4990689e&grant_type=client_credentials";

curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

$result = curl_exec($ch);
if (curl_errno($ch)) {
    echo 'Error:' . curl_error($ch);
}

echo $result;

curl_close ($ch);



?>

