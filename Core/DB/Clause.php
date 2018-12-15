<?php

namespace Core\DB;

abstract class Clause {
  protected $db;
  protected $field;
  protected $value;

  public function __construct($field, $value)
  {
    $this->field = $field;
    $this->value = $value;
    $this->db = false;
  }

  public function setDB(\Core\DB $db)
  {
    $this->db = $db;

    return $this;
  }

  abstract public function getPrepared();
}
