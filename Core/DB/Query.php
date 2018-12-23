<?php

namespace Core\DB;

class Query {
  protected $db;
  protected $tables;
  protected $fields;
  protected $clauses;

  public function __construct($instance)
  {
    $this->db = $instance;
    $this->tables = [];
    $this->fields = [];
    $this->clause = null;
    $this->clauses = [];
  }

  public static function create(\Core\DB $instance)
  {
    return new self($instance);
  }

  public function setFields($fields)
  {
    $this->fields = $fields;

    return $this;
  }

  public function addTable($table)
  {
    $this->tables[] = $table;

    return $this;
  }

  public function setClause(\Core\DB\Clause $clause)
  {
    $clause->setDB($this->db);
    $this->clause = $clause;

    return $this;
  }

  public function addClause(\Core\DB\Clause $clause)
  {
    $clause->setDB($this->db);
    $this->clauses[] = $clause;

    return $this;
  }

  public function addClauseEqual($field, $value) {
    $clause = \Core\DB\Clause\Equal::create($field, $value);
    $clause->setDB($this->db);

    $this->clauses[] = $clause;

    return $this;
  }

  protected function _query($sql)
  {
    return $this->db->doQuery($sql);
  }
}
