<?php

// get all Likes
$app->get('/likes', function ($request, $response, $args) {
  $newLike = $this->like->getAll();
  return $response->withJson(['data' => $newLike]);
});

// alla likes användare har gjort
$app->get('/likes/user/{id}', function ($request, $response, $args) {
  $newLike = $this->like->getAllLikesForUser($args['id']);
  return $response->withJson(['data' => $newLike]);
});

//get all likes connected to entry
$app->get('/entries/{entryID}/likes', function($request, $response, $args){
  $allLikes = $this->like->getAllLikesForEntry($args["entryID"]);
  return $response->withJson($allLikes);
});

//post new like
$app->post('/likes', function ($request, $response, $args) {
  $body = $request->getParsedBody();
  $newLike = $this->like->add($body['entryID'], $body['userID']);
  return $response->withJson(['data' => $newLike]);
});

//remove like
$app->delete('/likes/{likeID}', function($request, $response, $args){
  $allLikes = $this->like->remove($args["likeID"]);
  return $response->withJson($allLikes);
});
