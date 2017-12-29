<?php
//extract data from the post
extract($_POST);

//set POST variables
$url = 'https://xvxssuxdle.localtunnel.me/rest4.php';
$fields = array(
            'var' => "annonymous",
            'var2' => "a",
        );

//url-ify the data for the POST
$field_string = http_build_query($fields);

//open connection
$ch = curl_init();

//set the url, number of POST vars, POST data
curl_setopt($ch,CURLOPT_URL, $url);
curl_setopt($ch,CURLOPT_POST, 1);
curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);

//execute post
$result = curl_exec($ch);
echo $result;

//close connection
curl_close($ch);
?>