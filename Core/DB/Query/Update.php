<?php

namespace Core\DB\Query;

class Update extends \Core\DB\Query {
  public static function create(\Core\DB $instance)
  {
    return new self($instance);
  }

  public function query()
  {
    $sql = \sprintf(
      "UPDATE %s SET %s",
      \implode(",", $this->tables),
      \implode(",", $this->_format_fields())
    );

    if (!empty($this->clause)) {
      $sql .= \sprintf(
        " WHERE %s",
        $this->clause->getPrepared()
      );
    }

    return $this->_query($sql);
  }

  private function _format_fields()
  {
    $fields = [];

    foreach ($this->fields as $field => $value) {
      $fields[] = $field."=".$this->db->quote($value);
    }

    return $fields;
  }
}
