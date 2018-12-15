<?php

require_once("../../../autoload.php");

if (empty($_SESSION["user_id"])) {
  \Core\Template::renderAdmin("login.html");
}

$user = \Core\User::createFromId($_SESSION["user_id"]);

var_dump($_POST["exit"]);
var_dump($user->isAdmin() ? $_POST["user_id"] : $user->getId());exit;
if (empty($_POST["id"])) {
  \Core\DB\Query\Insert::create(\Core\DB::instance())
    ->addTable("seaports")
    ->setFields([
      "user_id" => $user->isAdmin() ? $_POST["user_id"] : $user->getId()
      "name" => $_POST["name"]
    ])
    ->query();
}
else {
  \Core\DB\Query\Update::create(\Core\DB::instance())
    ->addTable("seaports")
    ->setFields([
      "name" => $_POST["name"]
    ])
    ->addClauseEqual("id", $_POST["id"])
    ->query();
}

\Core\Utils::redirectAdmin("seaports");
