<?php

namespace Core;

use Core\Utils;

class TwigFunctions
{
  public static function varDump($args)
  {
    \Core\Debug::var_dump($args);
  }

  public static function getMarinas($args = [])
  {
    $marinas = \Core\DB\Query\Select::create(\Core\DB::instance())
      ->addTable("marinas")
      ->setFields([
        "marinas.id",
        "marinas_langs.name",
        "marinas_langs.description"
      ])
      ->addJoin("marinas_langs", [
        "marinas.id" => "marinas_langs.marina_id"
      ])
      ->addClauseEqual("marinas_langs.lang_id", $_SESSION["lang"]["id"])
      ->query()
      ->fetchAll();

    foreach ($marinas as $i => $marina) {
      $marinas[$i]["files"] = \Core\DB\Query\Select::create(\Core\DB::instance())
        ->addTable("marinas_files")
        ->setFields(["*"])
        ->addClauseEqual("marina_id", $marina["id"])
        ->query()
        ->fetchAll();

      $marinas[$i]["services"] = \Core\DB\Query\Select::create(\Core\DB::instance())
        ->addTable("marinas_services")
        ->setFields(["services.*"])
        ->addJoin("services", [
          "marinas_services.service_id" => "services.id"
        ])
        ->addClauseEqual("marinas_services.marina_id", $marina["id"])
        ->query()
        ->fetchAll();
    }

    return $marinas;
  }
}
