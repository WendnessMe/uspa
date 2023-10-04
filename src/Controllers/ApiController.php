<?php

namespace WendnessMe\Uspa\Controllers;

use WendnessMe\Uspa\Config;

class ApiController
{
  public $dbConn;

  public function index ()
  {
    $message = "Hi!";

    return $message;
  }

  public function getAll ()
  {
    $this->dbConn = new Config();
    // Create a contant to use like alias?
    // like, put an 'All' on the query and it would by default 
    // make a Select * From table
    $statement = $this->dbConn->query('SELECT * FROM test');

    if (!is_null($statement)) {
        return $statement;
    } else {
        return "Foda";
    }
  }
}
