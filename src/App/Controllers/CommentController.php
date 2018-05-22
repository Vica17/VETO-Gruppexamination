<?php

namespace App\Controllers;

class CommentController{

  private $db;

  public function __construct(\PDO $pdo)
  {
    $this->db = $pdo;
  }

  // get latest 20 comments
  public function getAll($limit = 20){
    $getAll = $this->db->prepare("SELECT * FROM comments ORDER BY createdAt DESC LIMIT :myLimit");
    $myLimit = (int)$limit;
    $getAll->bindParam('myLimit', $myLimit, \PDO::PARAM_INT);
    $getAll->execute();
    return $getAll->fetchAll();
  }

  // get specific comment
  public function getOne($commentID){
    $getOne = $this->db->prepare("SELECT * FROM comments WHERE commentID = :commentID");
    $getOne->execute([':commentID' => $commentID]);
    return $getOne->fetch();
  }

  // add new Comment
  public function add($entryID, $content, $createdBy){

    date_default_timezone_set('Europe/Stockholm');
    $date = date('Y-m-d H:i:s');

    $addOne = $this->db->prepare(
        "INSERT INTO comments (entryID, content, createdBy, createdAt) VALUES (:entryID, :content, :createdBy, :createdAt)"
    );

    $addOne->execute([
      ':entryID'     => $entryID,
      ':content'     => $content,
      ':createdBy'   => $createdBy,
      ':createdAt'   => $date
    ]);
  }

  // remove comment
  public function remove($commentID){
    $statement = $this->db->prepare(
      "DELETE FROM comments WHERE commentID = :commentID"
    );
    $statement->execute([
      ':commentID' => $commentID
    ]);
  }

  // get all comments connected to user
  public function getAllConnectedUsers($userID){
    $getAll = $this->db->prepare("SELECT * FROM comments WHERE createdBy = :createdBy");
    $getAll->execute([
      ':createdBy' => $userID
    ]);
    return $getAll->fetchAll();
  }

  // get all comments connected to entry
  public function getAllConnectedEntryComments($entryID){
    $getAll = $this->db->prepare(
      "SELECT c.commentID, c.entryID, c.content, u.userID, u.username
       FROM comments AS c
       INNER JOIN users AS u
       WHERE entryID = :entryID && c.createdBy = u.userID
       GROUP BY commentID");
    $getAll->execute([
      ':entryID' => $entryID
    ]);
    return $getAll->fetchAll();
  }

}
