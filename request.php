<?php

$url = "http://localhost:8000/api/get";

$ch = curl_init($url);

// print_r($ch);

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$out = curl_exec($ch);
curl_close($ch);

echo "Student name:\n";
print_r(json_decode($out)->contacts[0]->name);
echo "\n";
echo "Course name: \n";
print_r(json_decode($out)->courses->{rand(1, 5)});
echo "\n";
