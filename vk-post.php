<?php

$vkAppId = '123456789';


$vkAppSecret = 'sSecretX043';
$vkUserAccessToken = 'alkjasldoiuaysdoifyuaosidyf';
$vkGroupId = -93809475;

$book = json_decode(file_get_contents(__DIR__ . '/books/' . $argv[1]), true);

if ($vkUserAccessToken === '') {
    $url = "https://oauth.vk.com/authorize?client_id=$vkAppId&scope=photos,wall,offline&redirect_uri=https://oauth.vk.com/blank.html&response_type=token";
    echo 'AccessToken is empty. Open url in browser: ' . "\n" . $url . "\n";
    echo 'Copy value of the access_token from the address bar to variable $vkUserAccessToken in this script (' . __FILE__ . ')' . "\n";
    exit;
}

$s = '';
$s .= $book['author'] . "\n";
$s .= $book['title'] . "\n";
$s .= "✎\n";
$s .= $book['notes'] . "\n";

echo $s . "\n";

$postUrl = "https://api.vk.com/method/wall.post?owner_id=$vkGroupId&access_token=$vkUserAccessToken&message=" . urlencode($s);

if($curl = curl_init()) {
    curl_setopt($curl, CURLOPT_URL, 'https://api.vk.com/method/wall.post');
    curl_setopt($curl, CURLOPT_RETURNTRANSFER,true);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, "owner_id=$vkGroupId&access_token=$vkUserAccessToken&message=" . urlencode($s));
    $out = curl_exec($curl);
    echo $out;
    curl_close($curl);
}

$response = json_decode($out, true);

if (!array_key_exists('post_id', $response['response'])) {
    file_put_contents(__DIR__ . '/ERROR', json_encode($response));
} else {
    unlink(__DIR__ . '/books/' . $argv[1]);
}
