<?php
require_once("../autoload.php");

if (empty($_SESSION["user_id"])) {
  \Core\Template::renderAdmin("login.html");
}

$seaport = \Core\DB\Query\Select::create(\Core\DB::instance())
  ->setFields(["*"])
  ->addTable("seaports")
  ->addClauseEqual("id", $_GET["id"])
  ->query()
  ->fetch();

$users = \Core\DB\Query\Select::create(\Core\DB::instance())
  ->setFields(["*"])
  ->addTable("users")
  ->addClauseEqual("admin", "N")
  ->query()
  ->fetchAll();

  \Core\Template::renderAdmin("seaport", [
    "seaport" => $seaport,
    "users" => $users
  ]);
