<?php

namespace Core\DB\Clause;

class NotEqual extends \Core\DB\Clause {
  public static function create($field, $value)
  {
    return new self($field, $value);
  }

  public function getPrepared()
  {
    return \sprintf(
      "(%s != %s)",
      $this->field,
      $this->db->quote($this->value)
    );
  }
}
