<?php

namespace Core;

class Utils {
  public static function loadConf()
  {
    return self::_load_json(__DIR__."/config");
  }

  public static function getDefaultLang()
  {
    return self::loadConf()["default_lang"];
  }

  public static function loadLang($code)
  {
    return \Core\DB\Query\Select::create(\Core\DB::instance())
      ->setFields(["*"])
      ->addTable("langs")
      ->addClauseEqual("code", $code)
      ->query()
      ->fetch();
  }

  public static function loadTranslation()
  {
    return self::_load_json("langs/".$_SESSION["lang"]["code"]);
  }

  private static function _load_json($filename)
  {
    $file = \fopen($filename.".json", "r");
    $content = \fread($file, \filesize($filename.".json"));

    return \json_decode($content, true);
  }

  public static function getUniqID()
  {
    $chars = ["A","B","C","D","E","F","G","H","L","M","N","P","Q","R","S","T","U","V","Z"];
    $digits = ["0","1","2","3","4","5","6","7","8","9"];

    $uniqid = "";

    for ($i=0; $i<3; $i++) {
      $uniqid .= $chars[rand(0, \count($chars) - 1)];
    }

    $uniqid .= "-";

    for ($i = 0; $i < 6; $i++) {
      $uniqid .= $digits[rand(0, \count($digits) - 1)];
    }

    return $uniqid;
  }

  public static function redirect($page)
  {
    \header("Location: ".__URL_ROOT__.$page.".php");
  }

  public static function redirectAdmin($page)
  {
    \header("Location: ".__ADMIN_URL_ROOT__.$page.".php");
  }
}
