<?php

// get all entries
$app->get('/entries', function($request, $response, $args) {
  $query = $request->getQueryParams();

  if(isset($query['limit'])){
    $limit = $query['limit'];
  } else {
    $limit = 20;
  }

  $allEntries = $this->entry->getAll($limit);
  return $response->withJson($allEntries);
});

// get specific entry
$app->get('/entries/{entryID}', function($request, $response, $args){
  $allEntries = $this->entry->getOne($args["entryID"]);
  return $response->withJson($allEntries);
});

// get all entries by a certain user
$app->get('/entries/user/{userID}', function($request, $response, $args){
  $allEntries = $this->entry->getAllUsersEntries($args["userID"]);
  return $response->withJson($allEntries);
});
$app->get('/users/{userID}/entries', function($request, $response, $args){
  $allEntries = $this->entry->getAllUsersEntries($args["userID"]);
  return $response->withJson($allEntries);
});

$app->get('/entries/search/{key}', function($request, $response, $args){
  $allEntries = $this->entry->getAllFromSearch($args["key"]);
  return $response->withJson($allEntries);
});

// post new entry
$app->post('/entries', function($request, $response, $args){
  $vars = $request->getParsedBody();
  $allEntries = $this->entry->add(
    $vars["title"],
    $vars['content'],
    $vars['createdBy']
  );
  return $response->withJson($allEntries);
});

// delete entry
$app->delete('/entries/{entryID}', function($request, $response, $args){
  $allEntries = $this->entry->remove($args["entryID"]);
  return $response->withJson($allEntries);
});

// edit post
$app->patch('/entries/{entryID}', function($request, $response, $args){
  $vars = $request->getParsedBody();
  $allEntries = $this->entry->edit(
    $vars["title"],
    $vars["content"],
    $vars["entryID"]
  );
  return $response->withJson($allEntries);
});
