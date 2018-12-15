<?php
require_once("../autoload.php");

if (empty($_SESSION["user_id"])) {
  \Core\Template::renderAdmin("login.html");
}

$seaports_dbo = \Core\DB\Query\Select::create(\Core\DB::instance())
  ->setFields(["*"])
  ->addTable("seaports");

$user = \Core\User::createFromId($_SESSION["user_id"]);

if (!$user->isAdmin()) {
  $seaports_dbo->addClauseEqual("user_id", $user->getId());
}

$seaports = $seaports_dbo->query()->fetchAll();

\Core\Template::renderAdmin("seaports", [
  "seaports" => $seaports
]);
