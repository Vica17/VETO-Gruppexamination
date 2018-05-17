<?php
namespace App\Controllers;

class LikesController{

  private $db;

  public function __construct(\PDO $pdo)
  {
      $this->db = $pdo;
  }

  public function getAll(){
    $getAll = $this->db->prepare("SELECT * FROM likes");
    $getAll->execute();
    return $getAll->fetchAll();
  }

  //For posting a like
  public function add($entryID, $userID){

    $addOne = $this->db->prepare(
      "INSERT INTO likes (entryID, userID) VALUES (:entryID, :userID)"
    );

    $addOne->execute([
      ':entryID'    => $entryID,
      ':userID'     => $userID
    ]);

  }

  //For removing a like
  public function remove($likeID){
    $statement = $this->db->prepare(
      "DELETE FROM likes WHERE likeID = :likeID"
    );
    $statement->execute([
      ':likeID' => $likeID
    ]);
  }

  //get all likes connected to entry
  public function getAllLikesForEntry($entryID){
    $getAll = $this->db->prepare("SELECT * FROM likes WHERE entryID = :entryID");
    $getAll->execute([
      ':entryID' => $entryID
    ]);
    return $getAll->fetchAll();
  }

  // get all entries connected to user
  public function getAllLikesForUser($userID){
    $getAll = $this->db->prepare("SELECT * FROM likes WHERE userID = :userID");
    $getAll->execute([
      ':userID' => $userID
    ]);
    return $getAll->fetchAll();
  }

}
