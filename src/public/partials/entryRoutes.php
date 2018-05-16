<?php

$app->get('/entries', function($request, $response, $args) {
  $allEntries = $this->entry->getLatest();
  return $response->withJson($allEntries);
});
//get specific entry
$app->get('/entries/id/{entryID}', function($request, $response, $args){
  $allUsers = $this->entry->getOne($args["entryID"]);
  return $response->withJson($allUsers);
});
//post entry
$app->post('/entries', function($request, $response, $args){
  $allUsers = $this->entry->add($args["entryID"]);
  return $response->withJson($allUsers);
});
//delete entry
$app->delete('/entries/id/{entryID}', function($request, $response, $args){
  $allUsers = $this->entry->remove($args["entryID"]);
  return $response->withJson($allUsers);
});
//edit post
$app->patch('/entries/id/{entryID}', function($request, $response, $args){
  $allUsers = $this->entry->edit($args["entryID"]);
  return $response->withJson($allUsers);
});
