<?php

namespace Core;

use Core\Utils;

class TwigFunctions
{
  public static function varDump($args)
  {
    \Core\Debug::var_dump($args);
  }

  public static function getMenu($super = 0)
  {
    $menu = \Core\API::getCategory([
      "super" => $super,
      "sort" => "ordine"
    ]);

    foreach ($menu as $index => $item) {
      $menu[$index]["children"] = self::getMenu($item["id"]);
    }

    return $menu;
  }

  public static function getCategory($args)
  {
    return \Core\API::getCategory($args);
  }

  public static function getHtml($id)
  {
    return \Core\API::getHtml($id);
  }

  public static function getProducts($args)
  {
    return \Core\API::getProducts($args);
  }

  public static function getRegions()
  {
    return \Core\DB\Query\Select::create(\Core\DB::instance())
      ->setFields(["*"])
      ->addTable("regioni")
      ->addSort("nome")
      ->query()
      ->fetchAll();
  }
}
