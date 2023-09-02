<?php

require_once __DIR__ . '/../vendor/autoload.php';

use WendnessMe\Uspa\Config;
use WendnessMe\Uspa\Utils;
use WendnessMe\Uspa\Controllers;

$utils = new Utils();
// $config = new Config();
// $res = $config->query("SELECT * FROM test");
// echo "<pre>";
// var_dump($res);
// echo "</pre>";

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
// $uri = $_SERVER['REQUEST_URI'];
// $uriPath = parse_url($uri);
// $utils->dd($uriPath);

$routes = [
  '/' => 'HomeController@index',
  // '/test' => 'HomeController@test',
  // '/outro' => 'HomeController@outro',
  '/api' => 'ApiController@hi',
  '/all' => 'ApiController@getAll',
  '/api/get' => 'ApiController@getAll',
];

$response = [
  'error' => '',
  'message' => [],
];

if (array_key_exists($uri, $routes)) {
  header('Access-Control-Allow-Origin: *');
  // header('Content-Type: application/json; charset=utf-8');

  $controllerArray = explode("@", $routes[$uri]);
  $controller = $controllerArray[0];
  $cont = "WendnessMe\Uspa\Controllers\\" . $controller;

  $import = new $cont();
  // echo $import->hi();
  // echo "<br>";
  // $utils->dd($import->getAll());
  $data = $import->getAll();
  // $utils->dd($data);
  // $response['message'] = ($data);
  $response = [
    'error' => '',
    'status' => '200',
    'message' => $data,
  ];

  header('Content-Type: application/json; charset=utf-8');

  // $utils->dd($response);
  // print_r($response);
  echo json_encode($response);
} else {
  header('Content-Type: application/json; charset=utf-8');
  header('Access-Control-Allow-Origin: *');
  http_response_code('404');
  $response = [
    'error' => '404',
    'message' => ['empty'],
  ];
  $json = json_encode($response);
  // return $json;
  echo $json;
}

if (!empty($routes)) {
  // To-do:
  // Create function to check route independently of the route defined in the array
  // whether it was defined with a / (slash) or not.
  if (array_key_exists($uri, $routes) == false) {
    echo "404";
    exit;
  }

}

// echo "URI: " . $uri . "<br>";
$controllerArray = explode("@", $routes['/']);
