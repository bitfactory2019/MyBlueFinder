<?php
require_once("../../autoload.php");

unset($_SESSION["user"]);

\Core\Utils::redirectAdmin("login");
