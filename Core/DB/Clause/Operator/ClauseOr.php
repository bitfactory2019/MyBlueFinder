<?php

namespace Core\DB\Clause\Operator;

class ClauseOr extends \Core\DB\Clause\Operator {
  public static function create($clauseA, $clauseB)
  {
    return new self($clauseA, $clauseB);
  }

  public function getPrepared() {
    return \sprintf(
      "(%s OR %s)",
      $this->clauseA->getPrepared(),
      $this->clauseB->getPrepared()
    );
  }
}
