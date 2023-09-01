<?php

namespace WendnessMe\Uspa;

class Utils
{
  public function dd ($var)
  {
    echo "<pre>\n";
    var_dump($var);
    echo "</pre>\n";
    die();
  }
}
