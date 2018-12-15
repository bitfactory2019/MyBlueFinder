<?php

namespace Core\DB\Clause;

class IsNull extends \Core\DB\Clause {
  public static function create($field)
  {
    return new self($field, null);
  }

  public function getPrepared()
  {
    return \sprintf(
      "(%s IS NULL)",
      $this->field
    );
  }
}
