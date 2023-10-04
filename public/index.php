<?php

require_once __DIR__ . '/../vendor/autoload.php';

use WendnessMe\Uspa\Utils;

header('Access-Control-Allow-Origin: *');

$utils = new Utils();

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
$method = strtolower($_SERVER['REQUEST_METHOD']);

$routes = [
  '/' => 'ApiController@index',
  '/api/get' => 'ApiController@getAll',
];

if (array_key_exists($uri, $routes)) {

  if ($method === "get") {

    header('Content-Type: application/json; charset=utf-8');

    $controller = explode("@", $routes[$uri])[0];
    $controller = "WendnessMe\Uspa\Controllers\\" . $controller;
    
    $action = explode('@', $routes[$uri])[1];
    $import = new $controller();
    $data = $import->$action();

    $response = [
      'status' => '200',
      'content' => $data,
    ];

    echo json_encode($response);
    exit;

  } else {

    http_response_code(405);

    $response = [
      'error' => 'Method not allowed',
      'status'=> 405,
      'content' => '',
    ];

    echo json_encode($response);
    exit;
  }

} else {

  header('Content-Type: application/json; charset=utf-8');
  http_response_code('404');

  $response = [
    'error' => 'Resource not found',
    'status' => "404",
    'content' => '',
  ];

  echo json_encode($response);
  exit;
}

if (!empty($routes)) {
  // To-do:
  // Validate if a route is valid whether it was defined with a / or not.

  if (array_key_exists($uri, $routes) == false) {
    $response = [
      'error' => 'Resource not found',
      'status' => "404",
      'content' => '',
    ];

    echo json_encode($response);
    exit;
  }

}
