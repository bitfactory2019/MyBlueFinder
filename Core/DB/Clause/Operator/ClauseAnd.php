<?php

namespace Core\DB\Clause\Operator;

class ClauseAnd extends \Core\DB\Clause\Operator {
  /*public static function create($clauseA, $clauseB = null)
  {
    return new self($clauseA, $clauseB);
  }*/
  public static function create()
  {
    return new self();
  }

  /*public function getPrepared() {
    if (\isnull($this->clauseB)) {
      return \sprintf("(%s)", $this->clauseA->getPrepared());
    }
    else {
      return \sprintf(
        "(%s AND %s)",
        $this->clauseA->getPrepared(),
        $this->clauseB->getPrepared()
      );
    }
  }*/
  public function getPrepared()
  {
    if (empty($this->clauses)) {
      return "";
    }

    return \sprintf(
      "(%s)",
      \implode(" AND ", \array_map(function($clause) {
        return $clause->getPrepared();
      }, $this->clauses))
    );

  }
}
