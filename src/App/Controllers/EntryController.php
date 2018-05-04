<?php

namespace App\Controllers;

class EntryController{

  private $db;

  public function __construct(\PDO $pdo)
  {
      $this->db = $pdo;
  }
}
