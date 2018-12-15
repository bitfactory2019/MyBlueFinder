<?php

namespace Core\DB\Query;

class Raw extends \Core\DB\Query {
  public static function create(\Core\DB $instance)
  {
    return new self($instance);
  }

  public function query($sql)
  {
    return $this->_query($sql);
  }
}
