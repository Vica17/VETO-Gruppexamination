<?php

$app->get('/comments', function($request, $response, $args) {
  $allComments = $this->comment->getAll();
  return $response->withJson($allComments);
});

$app->get('/comments/id/{commentID}', function($request, $response, $args){
  $allComments = $this->comment->getOne($args["commentID"]);
  return $response->withJson($allComments);
});
$app->get('/entries/{id}/comments', function($request, $response, $args){
  $allComments = $this->comment->getOne($args["commentID"]);
  return $response->withJson($allComments);
});

$app->post('/comments', function ($request, $response, $args) {
    $body = $request->getParsedBody();
    $newComment = $this->comment->add($body);
    return $response->withJson(['data' => $newComment]);
});
$app->delete('/comments/id/{commentID}', function($request, $response, $args){
  $allComments = $this->comment->deleteOne($args["commentID"]);
  return $response->withJson($allComments);
});
