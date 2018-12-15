<?php

namespace Core;

use \Core\DB;

class API {
  public static function getProducts(array $args = [])
  {
    $dbo = DB\Query\Select::create(DB::instance())
      ->setFields(["*"])
      ->addTable("pagine_ecommerce")
      ->addClauseEqual("visibile", "si");

    if (!empty($args["idcat"])) {
      $dbo->addClauseEqual("idcat", $args["idcat"]);
    }

    if (!empty($args["sort"])) {
      $dbo->addSort($args["sort"]);
    }

    if (!empty($args["limit"])) {
      $dbo->setLimit($args["limit"]);
    }

    return $dbo->query()->fetchAll();
  }

  public static function getProduct($id)
  {
    return DB\Query\Select::create(DB::instance())
      ->setFields(["*"])
      ->addTable("pagine_ecommerce")
      ->addClauseEqual("visibile", "si")
      ->addClauseEqual("id", $id)
      ->query()
      ->fetch();
  }

  public static function getCategory($args)
  {
    $single = false;

    $dbo = DB\Query\Select::create(DB::instance())
      ->setFields(["categorie.*", "tipi_pagine.tabella AS page_type"])
      ->addTable("categorie")
      ->addJoin("tipi_pagine", [
        "categorie.tipo_pagina" => "tipi_pagine.id"
      ]);

    if (isset($args["id"])) {
      $dbo->setClause(DB\Clause\Equal::create("categorie.id", $args["id"]));
      $single = true;
    }
    elseif (isset($args["super"])) {
      $dbo->setClause(DB\Clause\Equal::create("categorie.super", $args["super"]));
    }

    if (isset($args["sort"])) {
      $dbo->addSort($args["sort"]);
    }

    if ($single) {
      return $dbo->query()->fetch();
    }
    else {
      return $dbo->query()->fetchAll();
    }
  }

  public static function getHtml($args)
  {
    $dbo = DB\Query\Select::create(DB::instance())
      ->setFields(["*"])
      ->addTable("pagine_html");

      if (!empty($args["id"])) {
        $dbo->addClauseEqual("id", $args["id"]);
      }
      elseif (!empty($args["idcat"])) {
        $dbo->addClauseEqual("idcat", $args["idcat"]);
      }

      return $dbo->query()->fetch();
  }

  public function getUser($data)
  {
    if (empty($data["username"]) || empty($data["password"])) {
      return;
    }

    return DB\Query\Select::create(DB::instance())
      ->setFields(["*"])
      ->addTable("ottici")
      ->addClauseEqual("username", $data["username"])
      ->addClauseEqual("pwd", $data["password"])
      ->query()
      ->fetch();
  }
}
