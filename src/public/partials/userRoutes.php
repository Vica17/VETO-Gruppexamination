<?php

$app->get('/users', function($request, $response, $args) {
  $allUsers = $this->user->getAll();
  return $response->withJson($allUsers);
});
$app->get('/users/{amount}', function($request, $response, $args){
  $allUsers = $this->user->getAll($args["amount"]);
  return $response->withJson($allUsers);
});
$app->get('/users/id/{userID}', function($request, $response, $args){
  $allUsers = $this->user->getOne($args["userID"]);
  return $response->withJson($allUsers);
});
// Data passed to template/ view via phpView  - just a test
$app->get('/users/username/{userName}', function($request, $response, $args){
  return $this->view->render($response, 'test.php', $args);
});
