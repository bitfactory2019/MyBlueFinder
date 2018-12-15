<?php
require_once("../autoload.php");

if (empty($_SESSION["user_id"])) {
  \Core\Template::renderAdmin("login");
}
else {
  \Core\Template::renderAdmin("index");
}
