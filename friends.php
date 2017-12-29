<?php
$ch = curl_init();

// curl_setopt($ch, CURLOPT_URL, "https://graph.facebook.com/v2.11/100003163463906?access_token=EAAMkG1ZAcjB8BAGZAE1WjeXXhuSV8qk3PZBZAOT395NM9wZBTFU8ZBiZC2MYi1vap0VidwWjmN0QZAbkuCNbUaOZA9fkh4XUSiMXROMcYEFksz2gNYmutRlBAkuIlbkkLvYHSs3tORp6r6hEZBbeFTjFj0xHiDYA6ZCLdIWUyAbzTm0gwZDZD");

curl_setopt($ch, CURLOPT_URL, "");


curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

$result = curl_exec($ch);
if (curl_errno($ch)) {
    echo 'Error:' . curl_error($ch);
}
curl_close ($ch);

echo $result;

?>