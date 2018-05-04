<?php

namespace App\Controllers;

class CommentController{

  private $db;

  public function __construct(\PDO $pdo)
  {
      $this->db = $pdo;
  }
}
