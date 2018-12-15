<?php

namespace Core;

use Core\DB\Query;

class User {
  private $id;
  private $name;
  private $username;
  private $password;
  private $admin;

  public function __construct()
  {
    $this->id = null;
    $this->name = "";
    $this->username = "";
    $this->password = "";
    $this->admin = false;

    return $this;
  }

  private static function _create($data)
  {
    $user = new self();

    return $user->setId($data["id"])
      ->setName($data["name"])
      ->setUsername($data["username"])
      ->setPassword($data["password"])
      ->setAdmin($data["admin"] === "Y");
  }

  public static function createFromUsernamePassword($username, $password)
  {
    $row = \Core\DB\Query\Select::create(\Core\DB::instance())
      ->addTable("users")
      ->setFields(["*"])
      ->addClauseEqual("username", $username)
      ->addClauseEqual("password", \md5($password))
      ->query()
      ->fetch();

      if (empty($row)) {
        return false;
      }

      return self::_create($row);
  }

  public static function createFromId($id)
  {
      $row = \Core\DB\Query\Select::create(\Core\DB::instance())
        ->addTable("users")
        ->setFields(["*"])
        ->addClauseEqual("id", $id)
        ->query()
        ->fetch();

      if (empty($row)) {
        return false;
      }

      return self::_create($row);
  }

  public function setId($id)
  {
    $this->id = $id;

    return $this;
  }

  public function getId()
  {
    return $this->id;
  }

  public function setName($name)
  {
    $this->name = $name;

    return $this;
  }

  public function getName()
  {
    return $this->name;
  }

  public function setUsername($username)
  {
    $this->username = $username;

    return $this;
  }

  public function getUsername()
  {
    return $this->username;
  }

  public function setPassword($password)
  {
    $this->password = $password;

    return $this;
  }

  public function getPassword()
  {
    return $this->password;
  }

  public function setAdmin($admin)
  {
    $this->admin = $admin;

    return $this;
  }

  public function isAdmin()
  {
    return $this->admin;
  }
}
