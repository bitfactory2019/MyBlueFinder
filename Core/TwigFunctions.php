<?php

namespace Core;

use Core\Utils;

class TwigFunctions
{
  public static function varDump($args)
  {
    \Core\Debug::var_dump($args);
  }
}
