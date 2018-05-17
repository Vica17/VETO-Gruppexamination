<?php

$app->get('/comments', function($request, $response, $args) {
  $allComments = $this->comment->getAll();
  return $response->withJson($allComments);
});

$app->get('/comments/{commentID}', function($request, $response, $args){
  $allComments = $this->comment->getOne($args["commentID"]);
  return $response->withJson($allComments);
});

$app->get('/comments/user/{userID}', function($request, $response, $args){
  $allEntries = $this->comment->getAllConnectedUsers($args["userID"]);
  return $response->withJson($allEntries);
});

$app->get('/entries/{id}/comments', function($request, $response, $args){
  $allComments = $this->comment->getAll($args["commentID"]);
  return $response->withJson($allComments);
});

$app->post('/comments', function ($request, $response, $args) {
    $body = $request->getParsedBody();
    $newComment = $this->comment->add(
      $body['entryID'], $body['content'], $body['createdBy']
    );
    return $response->withJson(['data' => $newComment]);
});
$app->delete('/comments/{commentID}', function($request, $response, $args){
  $allComments = $this->comment->remove($args["commentID"]);
  return $response->withJson($allComments);
});
