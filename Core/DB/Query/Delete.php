<?php

namespace Core\DB\Query;

class Delete extends \Core\DB\Query {
  public static function create(\Core\DB $instance)
  {
    return new self($instance);
  }

  public function query()
  {
    $sql = \sprintf(
      "DELETE FROM %s",
      \implode(",", $this->tables)
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
