<?php
function _load($dir) {
  if ($directory_handle = opendir($dir)) {
    $dirs = [];

    while (($file = readdir($directory_handle)) !== false) {
        if (($file == ".") || ($file == "..")) {
          continue;
        }

        if (filetype($dir."/".$file) === "dir") {
          $dirs[] = $dir."/".$file;
        }
        else if (\substr($file, -4) !== ".php") {
          continue;
        }
        else {
          require_once($dir."/".$file);
        }
    }

    foreach ($dirs as $dir) {
      _load($dir);
    }

    closedir($directory_handle);
  }
}

error_reporting(E_ALL & ~E_NOTICE);
ini_set('display_errors', 1);
session_start();

require_once(__DIR__."/Twig/Autoloader.php");
\Twig_Autoloader::register();
$twig = new \Twig_Environment(
    new \Twig_Loader_Filesystem(__DIR__."/tpl"),
    []
);

_load(__DIR__."/Core");
$base_path = "mybluefinder";

$config = \Core\Utils::loadConf();

if (!empty($_GET["lang_code"])) {
  $_SESSION["lang"] = \Core\Utils::loadLang($_GET["lang_code"]);
}
elseif (empty($_SESSION["lang"])) {
  $_SESSION["lang"] = \Core\Utils::loadLang($config["default_lang"]);
}

if ($_SESSION["lang"]["code"] == $config["default_lang"]) {
  $_SESSION["lang"]["suffix"] = "";
}
else {
  $_SESSION["lang"]["suffix"] = "_".$_SESSION["lang"]["code"];
}

define('__PATH_ROOT__', __DIR__."/");
define('__URL_IMG_ROOT__', "http://".$_SERVER["HTTP_HOST"]."/".$base_path."/img/");
define('__URL_ROOT__', 'http://'.$_SERVER["HTTP_HOST"].'/'.$base_path."/");
define('__ADMIN_URL_ROOT__', __URL_ROOT__."admin/");
define('__ADMIN_PATH_ROOT__', __PATH_ROOT__."admin/");
