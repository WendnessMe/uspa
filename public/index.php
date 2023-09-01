<?php

require_once __DIR__ . '/../vendor/autoload.php';

use WendnessMe\Uspa\Config;
use WendnessMe\Uspa\Utils;

$config = new Config();

$res = $config->query("SELECT * FROM test");
var_dump($res);
class Data
{
  public $pdo;

  public function __construct ()
  {
    $this->pdo = new PDO("sqlite:" . __DIR__ . "/../database/test.db");
  }

  public function query ($query)
  {
    // var_dump($this->pdo);

    $utils = new Utils();
    // $utils->dd(__DIR__ . '/test.db');
    $state = $this->pdo->prepare($query);
    $state->execute();

    return $state->fetchAll(PDO::FETCH_ASSOC);
  }
}

$class = new Data();
$res = $class->query("SELECT * FROM test");

// var_dump($res);

// $pdo = new PDO("sqlite:test.db");
// $statement = $pdo->prepare("SELECT * FROM test");
// $statement->execute();
// $res = $statement->fetchAll(PDO::FETCH_ASSOC);
// var_dump($res);

// $config->pdo->prepare("SELECT * FROM test");
// $config->pdo->execute();
// var_dump($config->pdo);
// echo $config->hi();
