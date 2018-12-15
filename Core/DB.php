<?php

namespace Core;

class DB extends \PDO
{
    private $stmt;

    public function __construct() {
      $params = \Core\Utils::loadConf();

      parent::__construct(
        "mysql:host=".$params["db"]["host"].";"."dbname=".$params["db"]["dbname"],
        $params["db"]["username"],
        $params["db"]["password"]
      );

      $this->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    }

    public static function instance()
    {
      return new self();
    }

    public function doQuery($sql)
    {
      try {
        $this->stmt = $this->query($sql);
      }
      catch (\PDOException $e) {
        print_r($e->getMessage());
        exit;
      }

      return $this;
    }

    public function fetch()
    {
        return $this->stmt->fetch(\PDO::FETCH_ASSOC);
    }

    public function fetchAll()
    {
        return $this->stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function fetchOneField($field)
    {
        $result = $this->stmt->fetch(\PDO::FETCH_ASSOC);

        return !empty($result[$field]) ? $result[$field] : false;
    }
}
