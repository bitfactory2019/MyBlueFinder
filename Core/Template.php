<?php

namespace Core;

use Core\Utils;

class Template {
  public static function render($path, $options = [])
  {
    $twig = new \Twig_Environment(
      new \Twig_Loader_Filesystem(__PATH_ROOT__."/tpl"),
      ['debug' => true]
    );
    $twig->addExtension(new \Twig_Extension_Debug());
    $twig->addFilter(new \Twig_SimpleFilter('tr', 'Core\TwigFilters::tr'));
    $twig->addFilter(new \Twig_SimpleFilter('lang', 'Core\TwigFilters::lang'));

    $twig->addFunction(new \Twig_SimpleFunction('var_dump', 'Core\TwigFunctions::varDump'));
    $twig->addFunction(new \Twig_SimpleFunction('marinas', 'Core\TwigFunctions::getMarinas'));

    $glob = [
      "conf" => Utils::loadConf(),
      "get" => $_GET,
      "post" => $_POST,
      "session" => $_SESSION,
      "root" => [
        "admin" => [
          "path" => __ADMIN_PATH_ROOT__,
          "url" => __ADMIN_URL_ROOT__
        ],
        "path" => __PATH_ROOT__,
        "url" => __URL_ROOT__,
        "img" => [
          "url" => __URL_IMG_ROOT__
        ]
      ],
      "page" => !empty($matches[2]) ? $matches[2] : ''
    ];

    $twig->addGlobal("glob", $glob);

    $tpl = $twig->loadTemplate($path.".html");

    \preg_match("/(.*)\/(.*)\.html$/", $path.".html", $matches);

    echo $tpl->render($options);
  }

  public static function renderAdmin($path, $options = [])
  {
    self::render("admin/".$path, $options);
  }
}
