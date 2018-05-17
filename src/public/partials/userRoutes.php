<?php

// get all users
$app->get('/users', function($request, $response, $args) {
  $allUsers = $this->user->getAll();
  return $response->withJson($allUsers);
});

// get specific user
$app->get('/users/{userID}', function($request, $response, $args){
  $allUsers = $this->user->getOne($args["userID"]);
  return $response->withJson($allUsers);
});

// Data passed to template/ view via phpView  - just a test
$app->get('/users/username/{userName}', function($request, $response, $args){
  $allUsers = $this->user->getUsername($args["userName"]);
  return $response->withJson($allUsers);
});
