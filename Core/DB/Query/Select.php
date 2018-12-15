<?php

namespace Core\DB\Query;

class Select extends \Core\DB\Query {
  private $join;
  private $sort;
  private $limit;

  public function __construct($instance)
  {
    $this->join = [];
    $this->sort = [];
    $this->limit = "";

    return parent::__construct($instance);
  }

  public static function create(\Core\DB $instance)
  {
    return new self($instance);
  }

  public function addJoin($table, $fields)
  {
    $this->join[$table] = $fields;

    return $this;
  }

  public function addSort($field, $direction = "ASC")
  {
    $this->sort[] = $field." ".$direction;

    return $this;
  }

  public function setLimit($limit)
  {
    $this->limit = $limit;

    return $this;
  }

  public function query()
  {
    $sql = \sprintf(
      "SELECT %s FROM %s",
      \implode(", ", $this->fields),
      \implode(", ", $this->tables)
    );

    if (!empty($this->join)) {
      foreach ($this->join as $table => $args) {
        foreach ($args as $field_a => $field_b) {
          $sql .= \sprintf(
            " JOIN %s on %s=%s",
            $table,
            $field_a,
            $field_b
          );
        }
      }
    }

    if (!empty($this->clause)) {
      $sql .= \sprintf(
        " WHERE %s",
        $this->clause->getPrepared()
      );
    }
    elseif (!empty($this->clauses)) {
      $clause_and = \Core\DB\Clause\Operator\ClauseAnd::create();

      foreach ($this->clauses as $clause) {
        $clause_and->addClause($clause);
      }

      $sql .= \sprintf(
        " WHERE %s",
        $clause_and->getPrepared()
      );
    }

    if (!empty($this->sort)) {
      $sql .= \sprintf(
        " ORDER BY %s",
        \implode(",", $this->sort)
      );
    }

    if (!empty($this->limit)) {
      $sql .= \sprintf(
        " LIMIT %s",
        $this->limit
      );
    }

    return $this->_query($sql);
  }
}
