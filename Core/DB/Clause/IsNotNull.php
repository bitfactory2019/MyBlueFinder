<?php

namespace Core\DB\Clause;

class IsNotNull extends \Core\DB\Clause {
  public static function create($field)
  {
    return new self($field, null);
  }

  public function getPrepared()
  {
    return \sprintf(
      "(%s IS NOT NULL)",
      $this->field
    );
  }
}
