<?php

require_once __DIR__ . '/../vendor/autoload.php';

use WendnessMe\Uspa\Config;
use WendnessMe\Uspa\Utils;
use WendnessMe\Uspa\Controllers;
use WendnessMe\Uspa\Controllers\ApiController;

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

// $test = new WendnessMe\Uspa\Controllers\ApiController;
// echo "Test import: ";
// echo $test->hi() . "<br>";
// $cont = "WendnessMe\Uspa\Controllers\ApiController";
// $import = new $cont();

echo "Dynamic import: ";
// echo $import->hi() . "<br>";

if (array_key_exists($uri, $routes)) {
  $controllerArray = explode("@", $routes[$uri]);
  $controller = $controllerArray[0];
  $cont = "WendnessMe\Uspa\Controllers\\" . $controller;
  $import = new $cont();
  echo "Import from inside: ";
  echo $import->hi();
  // $controller = new \WendnessMe\Uspa\Controllers;
  // print_r($routes[$uri]);
  // print_r($controllerArray);
  echo "<br>";
}

if (!empty($routes)) {
  // Create function to check route independently of the route defined in the array
  // whether it was defined with a / (slash) or not.
  if (array_key_exists($uri, $routes) == false) {
    echo "404";
    exit;
  }

}

echo "URI: " . $uri . "<br>";
$controllerArray = explode("@", $routes['/']);

// $utils->dd($controllerArray);


// $count = 1;
// foreach ($routes as $route) {
//   $contArr = explode("@", $route);
//   echo "<h1>Controller $count:</h1>";
//   echo "<b>Class:</b> $contArr[0] <br>";
//   echo "<b>Method:</b> $contArr[1] <br>";
//   $count += 1;
//   // echo "<pre>";
//   // print_r(explode("@", $route));
//   // echo "</pre>";
// }
