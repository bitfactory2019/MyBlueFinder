<?php

namespace Core\DB\Clause;

class NotIn extends \Core\DB\Clause {
  public static function create($field, array $value)
  {
    return new self($field, $value);
  }

  public function getPrepared()
  {
    $values = \array_map(function($value) {
      return $this->db->quote($value);
    }, $this->value);

    return \sprintf(
      "(%s NOT IN (%s))",
      $this->field,
      \implode(",", $values)
    );
  }
}
