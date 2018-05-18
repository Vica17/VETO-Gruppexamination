<?php

// get lastest 20 comments with a set limit
$app->get('/comments', function($request, $response, $args) {
  $query = $request->getQueryParams();

  if(isset($query['limit'])){
    $limit = $query['limit'];
  } else {
    $limit = 20;
  }

  $allComments = $this->comment->getAll($limit);
  return $response->withJson($allComments);
});

// get a specific comment
$app->get('/comments/{commentID}', function($request, $response, $args){
  $allComments = $this->comment->getOne($args["commentID"]);
  return $response->withJson($allComments);
});

// get all comments connected tot a user
$app->get('/users/{userID}/comments', function($request, $response, $args){
  $allEntries = $this->comment->getAllConnectedUsers($args["userID"]);
  return $response->withJson($allEntries);
});

// get all comments connected to a entry
$app->get('/entries/{id}/comments', function($request, $response, $args){
  $allComments = $this->comment->getAll($args["commentID"]);
  return $response->withJson($allComments);
});

// post a new comment
$app->post('/comments', function ($request, $response, $args) {
  $body = $request->getParsedBody();
  $newComment = $this->comment->add(
    $body['entryID'], $body['content'], $body['createdBy']
  );
  return $response->withJson(['data' => $newComment]);
});

// delete a comment
$app->delete('/comments/{commentID}', function($request, $response, $args){
  $allComments = $this->comment->remove($args["commentID"]);
  return $response->withJson($allComments);
});
