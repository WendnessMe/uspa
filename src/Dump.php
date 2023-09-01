<?php

// print_r($_SERVER['REQUEST_METHOD']);
header('Access-Control-Allow-Origin: *');
// header('Access-Control-Allow-Headers', 'Origin, Accept, Accept- Version, Content-Length, Content-MD5, Content-Type, Date, X-Api-Version, X-Response-Time, X-PINGOTHER, X-CSRF-Token, Authorization');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, PATCH, OPTIONS');
header('Content-Type: application/json; charset=utf-8');
// return $_SERVER['REQUEST_METHOD'];
$error = '';
$data = [
  'error' => $error,
  // 'message' => $_SERVER['REQUEST_METHOD'],
  'message' => [
    'HTTP Method' => $_SERVER['REQUEST_METHOD'],
    'Content' => 'Brabo demais',
  ]
];

$return = json_encode($data);

echo $return;
