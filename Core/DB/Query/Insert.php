<?php

namespace Core\DB\Query;

class Insert extends \Core\DB\Query {
  public static function create(\Core\DB $instance)
  {
    return new self($instance);
  }

  public function query()
  {
    $values = \array_map(function($value) {
      return $this->db->quote($value);
    }, \array_values($this->fields));

    $sql = \sprintf(
      "INSERT INTO %s (%s) VALUES (%s)",
      \implode(",", $this->tables),
      \implode(",", \array_keys($this->fields)),
      \implode(",", $values)
    );

    if (!empty($this->clause)) {
      $sql .= \sprintf(
        " WHERE %s",
        $this->clause->getPrepared()
      );
    }

    return $this->_query($sql);
  }
}
