<?php

namespace WendnessMe\Uspa;

class Config
{
  public $pdo;

  public function __construct ()
  {
    try {
      $this->pdo = new \PDO('sqlite:' . __DIR__ . '/../database/test.db');
      return $this->pdo;
    } catch (\PDOException $e) {
      exit($e->getMessage());
    }
  }

  public function query ($query)
  {
    $statement = $this->pdo->prepare($query);
    $statement->execute();

    return $statement->fetchAll(\PDO::FETCH_ASSOC);
  }

  public function hi ()
  {
    return "hi\n";
  }
}
