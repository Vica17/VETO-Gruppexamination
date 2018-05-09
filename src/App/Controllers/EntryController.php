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
  public function getOne($id){
    $getOne = $this->db->prepare('SELECT * FROM entries WHERE id = :id');
    $getOne->execute([':id' => $id]);
    return $getOne->fetch();
  }

  //Create new post
  public function add($title, $entry, $createdBy){
    $date = date('Y-m-d H:i:s');
    $addOne = $this->db->prepare(
        'INSERT INTO entries (title, content, createdBy) VALUES (:title, :content, :createdBy, :createdAt)'
    );
    $addOne->execute([':content'  => $entry['content']]);


    return [
      'id'          => (int)$this->db->lastInsertId(),
      'title'       => $title,
      'content'     => $entry['content'],
      'createdBy'   => $createdBy,
      'createdAt'   => $date,
      'completed'   => false
    ];
  }

  //Delete
  public function remove($entryID){
    $getOne = $this->db->prepare(
      "DELETE * FROM entries WHERE entryID = '$entryID'"
    );
    $statement->execute();
  }

  //Edit post
  public function edit($entryID){
    $addOne = $this->db->prepare(
        'INSERT INTO entries (title, content, createdBy) VALUES (:title, :content, :createdBy, :createdAt)'
    );
    $addOne->execute([':content'  => $entry['content']]);

    return [
      'id'          => (int)$this->db->lastInsertId(),
      'title'       => $title,
      'content'     => $entry['content'],
      'createdBy'   => $createdBy,
      'createdAt'   => $date,
      'completed'   => false
    ];
  }
}
