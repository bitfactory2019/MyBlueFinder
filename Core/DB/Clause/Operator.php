<?php

namespace Core\DB\Clause;

abstract class Operator extends \Core\DB\Clause {
  //protected $clauseA;
  //protected $clauseB;
  protected $clauses;

  /*public function __construct(\Core\DB\Clause $clauseA, \Core\DB\Clause $clauseB)
  {
    $this->clauseA = $clauseA;
    $this->clauseB = $clauseB;
    $this->clauses = [];
  }*/

  public function __construct()
  {
    $this->clauses = [];
  }

  public function addClause(\Core\DB\Clause $clause)
  {
    $this->clauses[] = $clause;
  }

  /*public function setDB(\Core\DB $db)
  {
    $this->clauseA->setDB($db);
    $this->clauseB->setDB($db);

    return parent::setDB($db);
  }*/
}
