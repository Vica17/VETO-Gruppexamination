<?php
//post new like
$app->post('/likes', function ($request, $response, $args) {
$body = $request->getParsedBody();
$newLike = $this->like->add($body);
return $response->withJson(['data' => $newLike]);
});
//get all likes connected to entry
$app->get('/entries/{id}/likes', function($request, $response, $args){
$allLikes = $this->like->getOne($args["likeID"]);
return $response->withJson($allLikes);
});
//remove like
$app->delete('/likes/id/{likeID}', function($request, $response, $args){
$allLikes = $this->like->deleteOne($args["likeID"]);
return $response->withJson($allLikes);
});
