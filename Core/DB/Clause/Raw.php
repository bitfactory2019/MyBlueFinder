<?php

namespace Core\DB\Clause;

class Raw extends \Core\DB\Clause {
  private $clause;

  public function __construct($sql)
  {
    $this->clause = $sql;

    return parent::__construct(null, null);
  }

  public static function create($sql)
  {
    return new self($sql);
  }

  public function getPrepared()
  {
    return $this->clause;
  }
}
