<?php
namespace App\Controllers;

class LikesController{

  private $db;

  public function __construct(\PDO $pdo)
  {
      $this->db = $pdo;
  }

  //For posting a like
  public function add($entryID,$userID){
    $date = date('Y-m-d H:i:s');
    $addOne = $this->db->prepare(
        "INSERT INTO likes (entryID,userID) VALUES (:entryID,:userID)"
    );
    $addOne->execute([
      ':likeID'          => (int)$this->db->lastInsertId(),
      ':userID'     => $userID,
      ':entryID'     => $entryID
    ]);
  }

  //For removing a like
  public function remove($likeID){
    $statement=$db->prepare(
      "DELETE FROM `likes` WHERE likeID='$likeID'"
    );
    $statement->execute();
  }
//get all likes connected to entry
  public function getAllLikesForEntry($entryID){
    $getAll = $this->db->prepare("SELECT * FROM likes WHERE entryID='$entryID'");
    $getAll->execute();
    return $getAll->fetchAll();
  }

  }
