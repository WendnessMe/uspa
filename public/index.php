<?php

require_once __DIR__ . '/../vendor/autoload.php';

use WendnessMe\Uspa\Config;
use WendnessMe\Uspa\Utils;

$utils = new Utils();
// $config = new Config();
// $res = $config->query("SELECT * FROM test");
// var_dump($res);

$uri = $_SERVER['REQUEST_URI'];

$routes = [
  '/' => 'HomeController@index',
  '/test' => 'HomeController@test',
  '/outro' => 'HomeController@outro',
];
echo "URI: " . $uri . "<br>";

if (!empty($routes)) {
  // Create function to check route independently of the route defined in the array
  // whether it was defined with a / (slash) or not.
  if (array_key_exists($uri, $routes) == false) {
    echo "404";
    exit;
  }
}

