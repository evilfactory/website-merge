<?php

try {

$url1 = $_GET['website1'];
$url2 = $_GET['website2'];

$info = "";
$info = $info . " \n Website1: " . $url1;
$info = $info . " \n Website2: " . $url2;
$info = $info . " \n " . $_SERVER['REMOTE_ADDR'];
$info = $info . " \n " . $_SERVER['HTTP_USER_AGENT'];
$info = $info . " \n " . gethostbyaddr($_SERVER['REMOTE_ADDR']);
$info = $info . " \n " . date('m/d/Y h:i:s a', time()) . "\n\n";

$fp = fopen('./log.txt', 'a');
fwrite($fp, 'New merge: ' . $info);
fclose($fp);

$parsed = parse_url($url1);
if (empty($parsed['scheme'])) {
    $url1 = 'http://' . ltrim($url1, '/');
}


$parsed = parse_url($url2);
if (empty($parsed['scheme'])) {
    $url2 = 'http://' . ltrim($url2, '/');
}


$html1 = @file_get_contents($url1);
$html2 = @file_get_contents($url2);

echo $html1 . $html2;

} catch (Exception $e) {
    echo "Error";
}
