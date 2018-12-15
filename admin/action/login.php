<?php
require_once("../../autoload.php");

$user = \Core\User::createFromUsernamePassword($_POST["username"], $_POST["password"]);

if (empty($user)) {
  unset($_SESSION["user"]);

  \Core\Utils::redirectAdmin("login");
}
else {
  $_SESSION["user_id"] = $user->getId();

  \Core\Utils::redirectAdmin("index");
}
