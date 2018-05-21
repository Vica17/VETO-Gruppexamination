<?php

// get all Likes
$app->get('/likes', function ($request, $response, $args) {
  $query = $request->getQueryParams();

  if(isset($query['limit'])){
    $limit = $query['limit'];
  } else {
    $limit = 20;
  }

  $newLike = $this->like->getAll($limit);
  return $response->withJson($newLike);
});

// get specific like
$app->get('/likes/{likeID}', function ($request, $response, $args) {
  $newLike = $this->like->getOne($args["likeID"]);
  return $response->withJson($newLike);
});

// alla likes användare har gjort
$app->get('/users/{userID}/likes', function ($request, $response, $args) {
  $newLike = $this->like->getAllLikesForUser($args['userID']);
  return $response->withJson($newLike);
});

//get all likes connected to entry
$app->get('/entries/{entryID}/likes', function($request, $response, $args){
  $allLikes = $this->like->getAllLikesForEntry($args["entryID"]);
  return $response->withJson($allLikes);
});

//post new like
$app->post('/likes', function ($request, $response, $args) {
  $body = $request->getParsedBody();
  $newLike = $this->like->add($body['entryID'], $_SESSION['userID']);
  return $response->withJson($newLike);
});

//remove like
$app->delete('/likes/{likeID}', function($request, $response, $args){
  $allLikes = $this->like->remove($args["likeID"]);
  return $response->withJson($allLikes);
});
