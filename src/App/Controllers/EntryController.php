<?php

namespace App\Controllers;

class EntryController{

  private $db;

  public function __construct(\PDO $pdo)
  {
      $this->db = $pdo;
  }

  //get latest 20 entries
  public function getLatest(){
    $getAll = $this->db->prepare('SELECT * FROM entries ORDER BY createdAt DESC LIMIT 20');
    $getAll->execute();
    return $getAll->fetchAll();
  }

  //get specific entry
  public function getOne($entryID){
    $getOne = $this->db->prepare('SELECT * FROM entries WHERE entryID = :entryID');
    $getOne->execute([':entryID' => $entryID]);
    return $getOne->fetch();
  }

  //Create new post
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

  //Delete
  public function remove($entryID){
    $removeOne = $this->db->prepare(
      "DELETE FROM entries WHERE entryID = :entryID"
    );
    $removeOne->execute([
      ":entryID" => $entryID
    ]);
  }

  //Edit post
  public function edit($entryID){

    $update = $this->db->prepare(
        'INSERT INTO entries (title, content, createdBy) VALUES (:title, :content, :createdBy, :createdAt)'
    );
    $update->execute([':content'  => $entry['content']]);

    return [
      'title'       => $title,
      'content'     => $entry['content'],
      'createdBy'   => $createdBy,
      'createdAt'   => $date,
    ];
  }
}
