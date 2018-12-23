<?php

namespace Core;

use Core\Utils;

class TwigFilters
{
  public static function tr($value)
  {
    $translations = Utils::loadTranslation();
    $default_lang = Utils::getDefaultLang();

    if ($_SESSION["lang"] == $default_lang) {
      return $value;
    }

    return $translations[$value] ? $translations[$value] : $value."*";
  }

  public static function lang($value)
  {
    if ($_SESSION["lang"] == Utils::getDefaultLang()) {
      return $value;
    }

    return $value."_en";
  }
}
