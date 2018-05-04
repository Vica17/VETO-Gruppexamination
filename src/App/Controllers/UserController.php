<?php

namespace App\Controllers;

class UserController{

  private $db;

  public function __construct(\PDO $pdo)
  {
      $this->db = $pdo;
  }
}
