<?php

namespace App\Controllers;

class UserController{

  private $db;

  public function __construct(\PDO $pdo = null)
  {
    $this->db = $pdo;
  }

  // Login User
  public function login($body){

    $fetchUserStatement = $this->db->prepare('SELECT * FROM users WHERE username = :username');
    $fetchUserStatement->execute([
        ':username' => $body['username']
    ]);
    $user = $fetchUserStatement->fetch();

    if (password_verify($body['password'], $user['password'])) {
        $_SESSION['loggedIn'] = true;
        $_SESSION['userID'] = $user['userID'];

        if($user["isAdmin"] == true || $user["isAdmin"] == 1){
          $_SESSION["isAdmin"] = true;
        }

        return true;
    }
    return ['error' => 'wrong password'];
  }

  // Logout User
  public function logout(){
    session_destroy();
    return true;
  }

  // Register new user
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

  // Get All users
  public function getAll($amount = null){
    $sql = "SELECT userID, username, createdAt, isAdmin FROM users";

    if($amount !== null && is_numeric($amount)){
      $sql .= " LIMIT " . $amount;
    }

    $getAll = $this->db->prepare($sql);
    $getAll->execute();

    return $getAll->fetchAll();
  }

  // Get Specific user by userID
  public function getOne($userID){
    $getOne = $this->db->prepare("SELECT userID, username, createdAt, isAdmin FROM users WHERE userID = :userID");
    $getOne->execute([
      ":userID" => $userID
    ]);
    return $getOne->fetch();
  }

  // Get Specific User by Username
  public function getUsername($username){
    $getOne = $this->db->prepare("SELECT userID, username, createdAt, isAdmin FROM users WHERE username = :username");
    $getOne->execute([
      ":username" => $username
    ]);
    return $getOne->fetch();
  }

}
