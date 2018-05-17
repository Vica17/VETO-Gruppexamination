<?php

namespace App\Controllers;

class EntryController{

  private $db;

  public function __construct(\PDO $pdo)
  {
    $this->db = $pdo;
  }

  // Get latest 20 entries
  public function getLatest(){
    $getAll = $this->db->prepare('SELECT * FROM entries ORDER BY createdAt DESC LIMIT 20');
    $getAll->execute();
    return $getAll->fetchAll();
  }

  // Get specific entry
  public function getOne($entryID){
    $getOne = $this->db->prepare('SELECT * FROM entries WHERE entryID = :entryID');
    $getOne->execute([':entryID' => $entryID]);
    return $getOne->fetch();
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
      "DELETE FROM entries WHERE entryID = :entryID"
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
