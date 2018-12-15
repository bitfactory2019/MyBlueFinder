<?php

namespace Core\DB\Clause;

class Equal extends \Core\DB\Clause {
  public static function create($field, $value)
  {
    return new self($field, $value);
  }

  public function getPrepared()
  {
    if (is_array($this->value)) {
      $value = \array_map(function($value) {
        return $this->db->quote($value);
      }, $this->value);

      return \sprintf(
        "(%s IN (%s))",
        $this->field,
        \implode(",", $value)
      );
    }
    else {
      return \sprintf(
        "(%s = %s)",
        $this->field,
        $this->db->quote($this->value)
      );
    }
  }
}
