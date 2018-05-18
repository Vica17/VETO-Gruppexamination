<?php

namespace App\Controllers;

class EntryController{

  private $db;

  public function __construct(\PDO $pdo)
  {
    $this->db = $pdo;
  }

  // Get latest 20 entries
  public function getAll($limit = 20){
    $getAll = $this->db->prepare('
    SELECT e.entryID, e.title, e.content, e.createdAt, u.username, u.isAdmin, u.userID
    FROM entries AS e
    INNER JOIN users AS u
    GROUP BY entryID
    ORDER BY e.createdAt
    DESC LIMIT :myLimit');

    $myLimit = (int)$limit;
    $getAll->bindParam('myLimit', $myLimit, \PDO::PARAM_INT);
    $getAll->execute();
    return $getAll->fetchAll();
  }

  // Get specific entry
  public function getOne($entryID){
    $getOne = $this->db->prepare('SELECT * FROM entries WHERE entryID = :entryID');
    $getOne->execute([':entryID' => $entryID]);
    return $getOne->fetch();
  }

  // Get specific entry
  public function getAllFromSearch($key){
    $wild = "%".$key."%";
    $getOne = $this->db->prepare('SELECT * FROM entries WHERE title LIKE :key');
    $getOne->bindParam(':key', $wild);
    $getOne->execute();
    return $getOne->fetchAll();
  }

  // Get all entries from specific user
  public function getAllUsersEntries($userID){
    $getAll = $this->db->prepare("SELECT * FROM entries WHERE createdBy = :createdBy");
    $getAll->execute([
      ':createdBy' => $userID
    ]);
    return $getAll->fetchAll();
    }

  // Create new post
  public function add($title, $content, $createdBy){

    date_default_timezone_set('Europe/Stockholm');
    $date = date('Y-m-d H:i:s');

    $addOne = $this->db->prepare(
        'INSERT INTO entries (title, content, createdBy, createdAt) VALUES (:title, :content, :createdBy, :createdAt)'
    );
    $addOne->execute([
      'title'       => $title,
      'content'     => $content,
      'createdBy'   => $createdBy,
      'createdAt'   => $date,
    ]);
  }

  // Delete
  public function remove($entryID){
    $removeOne = $this->db->prepare(
      "DELETE FROM entries WHERE entryID = :entryID;
       DELETE FROM likes WHERE entryID = :entryID;
       DELETE FROM comments WHERE entryID = :entryID"
    );
    $removeOne->execute([
      ":entryID" => $entryID
    ]);
  }

  // Edit post
  public function edit($title, $content, $entryID){

    $update = $this->db->prepare(
        'UPDATE entries SET title = :title, content = :content WHERE entryID = :entryID'
    );
    $update->execute([
      ':title'       => $title,
      ':content'     => $content,
      ':entryID'     => $entryID
    ]);
  }
}
