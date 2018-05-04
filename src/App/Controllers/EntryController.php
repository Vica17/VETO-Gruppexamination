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
    $getAll = $this->db->prepare('SELECT * FROM entries');
    $getAll->execute();
    return $getAll->fetchAll();
  }

  //get specific entry
  public function getOne($id){
    $getOne = $this->db->prepare('SELECT * FROM entries WHERE id = :id');
    $getOne->execute([':id' => $id]);
    return $getOne->fetch();
  }

  //post
  public function add($title, $entry, $createdBy){

    $addOne = $this->db->prepare(
        'INSERT INTO entries (content) VALUES (:content)'
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

  //delete
  public function remove(){
    $getOne = $this->db->prepare('DELETE * FROM entries WHERE id = :id');
    $getOne->execute([':id' => $id]);
    return $getOne->fetch();
  }

  //update
  public function edit(){

  }
}
