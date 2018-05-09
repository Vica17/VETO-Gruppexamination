<?php

namespace App\Controllers;

class UserController{

  private $db;

  public function __construct(\PDO $pdo)
  {
    $this->db = $pdo;
  }

  public function login($body){

    $fetchUserStatement = $this->db->prepare('SELECT * FROM users WHERE username = :username');
    $fetchUserStatement->execute([
        ':username' => $body['username']
    ]);
    $user = $fetchUserStatement->fetch();

    if (password_verify($body['password'], $user['password'])) {
        $_SESSION['loggedIn'] = true;
        $_SESSION['userID'] = $user['userID'];
        return ['data' => [ $user['userID'], $user['username'] ]];
    }
    return ['error' => 'wrong password'];
  }

  public function logout(){
    session_destroy();
    return "Success";
  }

  public function register($args){

    $hashed = password_hash($args['password'], PASSWORD_DEFAULT);
    $statement = $this->db->prepare(
      "INSERT INTO users (username, password)
      VALUES (:username, :password)"
    );
    $statement->execute([
      ":username" => $args['username'],
      ":password" => $hashed
    ]);
    return "Success!";
  }

  public function isLoggedIn(){
    if( isset($_SESSION["loggedIn"]) ){
      return true;
    } else {
      return false;
    }
  }

  public function getAll($amount = null){
    $sql = "SELECT userID, username, createdAt FROM users";

    if($amount !== null && is_numeric($amount)){
      $sql .= " LIMIT " . $amount;
    }

    $getAll = $this->db->prepare($sql);
    $getAll->execute();

    return $getAll->fetchAll();
  }

  public function getOne($amount){
    $getOne = $this->db->prepare("SELECT userID, username, createdAt FROM users WHERE userID = :userID");
    $getOne->execute([
      ":userID" => $amount
    ]);
    return $getOne->fetch();
  }
}
