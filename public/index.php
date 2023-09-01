<?php

require_once __DIR__ . '/../vendor/autoload.php';

use WendnessMe\Uspa\Config;
use WendnessMe\Uspa\Utils;

$utils = new Utils();
$config = new Config();
$res = $config->query("SELECT * FROM test");
// var_dump($res);

$uri = $_SERVER['REQUEST_URI'];

$routes = [
  '/' => 'HomeController@index',
  '/test' => 'HomeController@test',
  'outro' => 'HomeController@outro',
];

function routeCheck ($route, $array)
{
  if (array_key_exists($route, $array)) {
    return true;
  } else {
    return false;
  }
}

if (!empty($routes)) {
  // echo $_SERVER['REQUEST_URI'];
  // echo routeCheck($uri, $routes);
  if (routeCheck($uri, $routes) == false) {
    echo "404";
    exit;
  }

  // print_r(array_key_exists('/', $routes));
  // if (array_key_exists('outro', $array)) {
  //   echo "FOda";
  // }
}

