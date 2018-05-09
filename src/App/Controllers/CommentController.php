<?php

namespace App\Controllers;

class CommentController{

  private $db;

  public function __construct(\PDO $pdo)
  {
      $this->db = $pdo;
  }
//get latest 20 comments
  public function getLatest(){
    $getAll = $this->db->prepare("SELECT * FROM comments ORDER BY createdAt DESC LIMIT 20");
    $getAll->execute();
    return $getAll->fetchAll();
  }

//post new comment
//`comments`(`commentID`, `entryID`, `content`, `createdBy`, `createdAt`)

  public function add($comment,$entryID,$createdBy){
    $date = date('Y-m-d H:i:s');
    $addOne = $this->db->prepare(
        "INSERT INTO comments (commentID, content, entryID, createdBy, createdAt) VALUES (:commentID,:content,:entryID,:createdBy,:createdAt)"
    );
    $addOne->execute([
      ':commentID'          => (int)$this->db->lastInsertId(),
      ':entryID'     => $entryID,
      ':content'    => $content,
      ':createdBy'     => $createdBy,
      ':createdAt' => $date
    ]);
  }
  //get specific comment
  public function getOne($commentID){
    $getOne = $this->db->prepare("SELECT * FROM comments WHERE commentID = :id");
    $getOne->execute([':commentID' => $commentID]);
    return $getOne->fetch();
  }

  //remove comment
  public function remove($commentID){
    $statement=$db->prepare(
      "DELETE FROM `comments` WHERE commentID='$commentID'"
    );
    $statement->execute();
  }
  //get all comments connected to entry
  public function getAllConnectedEntires($entryID){
    $getAll = $this->db->prepare("SELECT * FROM comments WHERE entryID=$entryID'");
    $getAll->execute();
    return $getAll->fetchAll();
  }

}
