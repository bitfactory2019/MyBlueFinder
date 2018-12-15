<?php

namespace Core;

class Debug {
  public static function print_r($data)
  {
    echo "<pre>";
      print_r($data);
    echo "</pre>";
  }

    public static function var_dump($data)
    {
      echo "<pre>";
        var_dump($data);
      echo "</pre>";
    }
}
