<?php

namespace App\Controllers;

class UserController{

  private $db;

  public function __construct(\PDO $pdo)
  {
      $this->db = $pdo;
  }

  public function login($body, $response){
    $fetchUserStatement = $this->db->prepare('SELECT * FROM users WHERE username = :username');
    $fetchUserStatement->execute([
        ':username' => $body['username']
    ]);
    $user = $fetchUserStatement->fetch();

    if (password_verify($body['password'], $user['password'])) {
        $_SESSION['loggedIn'] = true;
        $_SESSION['userID'] = $user['id'];
        return $response->withJson(['data' => [ $user['id'], $user['username'] ]]);
    }
    return $response->withJson(['error' => 'wrong password']);
  }
  public function logout(){

  }
  public function register(){

  }
  public function getAll(){

  }
  public function getOne(){

  }
}
