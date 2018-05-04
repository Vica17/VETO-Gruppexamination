<?php

namespace App\Controllers;

class CommentController{

  private $db;

  public function __construct(\PDO $pdo)
  {
      $this->db = $pdo;
  }

  public function getLatest(){
    $getAll = $this->db->prepare('SELECT * FROM comments');
    $getAll->execute();
    return $getAll->fetchAll();
  }

  public function add($comment){
    $addOne = $this->db->prepare(
        'INSERT INTO comments (content) VALUES (:content)'
    );
    $addOne->execute([':content'  => $comment['content']]);
    return [
      'id'          => (int)$this->db->lastInsertId(),
      'content'     => $comment['content'],
      'completed'   => false
    ];
  }
  public function getOne($id){
    $getOne = $this->db->prepare('SELECT * FROM comments WHERE id = :id');
    $getOne->execute([':id' => $id]);
    return $getOne->fetch();

  }
  public function remove(){

  }
  public function getAllConnectedEntires(){

  }

}
