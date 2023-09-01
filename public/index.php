<?php

require_once __DIR__ . '/../vendor/autoload.php';

use WendnessMe\Uspa\Config;
use WendnessMe\Uspa\Utils;
use WendnessMe\Uspa\Controllers;

$utils = new Utils();
// $config = new Config();
// $res = $config->query("SELECT * FROM test");
// var_dump($res);

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
// $uri = $_SERVER['REQUEST_URI'];
// $uriPath = parse_url($uri);
// $utils->dd($uriPath);

$routes = [
  '/' => 'HomeController@index',
  '/test' => 'HomeController@test',
  '/outro' => 'HomeController@outro',
  '/api' => 'ApiController@hi',
];

if (array_key_exists($uri, $routes)) {
  $controllerArray = explode("@", $routes[$uri]);
  $controller = $controllerArray[0];
  $cont = "WendnessMe\Uspa\Controllers\\" . $controller;
  $import = new $cont();
  echo $import->hi();
  echo "<br>";
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

echo "URI: " . $uri . "<br>";
$controllerArray = explode("@", $routes['/']);
