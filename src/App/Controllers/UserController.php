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

  public function logout($response){
    session_destroy();
    return $response->withJson('Success');
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
    die(var_dump($statement));
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
  public function getOne(){

  }
}
