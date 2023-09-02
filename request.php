<?php

$url = "http://localhost:8000/api/get";

$ch = curl_init($url);

// print_r($ch);

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$out = curl_exec($ch);
curl_close($ch);

print_r($out);
