<?php
if (session_status() == PHP_SESSION_NONE) {
    session_set_cookie_params(3600);
    session_start();
}

/**
 * Require the autoload script, this will automatically load our classes
 * so we don't have to require a class everytime we use a class. Evertime
 * you create a new class, remember to runt 'composer update' in the terminal
 * otherwise your classes may not be recognized.
 */
require_once '../../vendor/autoload.php';

/**
 * Here we are creating the app that will handle all the routes. We are storing
 * our database config inside of 'settings'. This config is later used inside of
 * the container inside 'App/container.php'
 */

$container = require '../App/container.php';
$app = new \Slim\App($container);
$auth = require '../App/auth.php';
$isAdmin = require '../App/isAdmin.php';
require '../App/cors.php';


/********************************
 *          ROUTES              *
 ********************************/


$app->get('/', function ($request, $response, $args) {
    return $this->view->render($response, 'index.php');
});



/**
  * Login/ Logout & Register
 */

$app->get('/login', function($request, $response, $args){
  return $this->view->render($response, 'login.php');
});
$app->post('/login', function ($request, $response, $args) {
  $body = $request->getParsedBody();
  $res = $this->user->login($body);

  if($res == true){
    return $response = $response->withRedirect('/');
  } else {
    return $response->withJson($res);
  }

});

$app->get('/logout', function ($request, $response, $args) {
  $res = $this->user->logout();
  if($res == true){
    return $response = $response->withRedirect('/');
  }
});

$app->get('/register', function($request, $response, $args){
  return $this->view->render($response, 'register.php');
});
$app->post('/register', function($request, $response, $args){
  $body = $request->getParsedBody();
  return $this->user->register($body);
});



/**
 * The group is used to group everything connected to the API under '/api'
 * This was done so that we can check if the user is authed when calling '/api'
 * but we don't have to check for auth when calling '/signin'
 */

 //for users
$app->group('/api', function () use ($app) {

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

//for entries
    //get last 20 entries
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

  //for comments
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


    // GET http://localhost:XXXX/api/todos
    $app->get('/todos', function ($request, $response, $args) {
        /**
         * $this->get('Todos') is available to us because we injected it into the container
         * in 'App/container.php'. This makes it easier for us to call the database
         * inside our routes.
         */
        $allTodos = $this->todos->getAll();
        /**
         * Wrapping the data when returning as a safety thing
         * https://www.owasp.org/index.php/AJAX_Security_Cheat_Sheet#Server_Side
         */
        return $response->withJson(['data' => $allTodos]);
    });

    // GET http://localhost:XXXX/api/todos/5
    $app->get('/todos/{id}', function ($request, $response, $args) {
        /**
         * {id} is a placeholder for whatever you write after todos. So if we write
         * /todos/4 the {id} will be 4. This gets saved in the $args array
         * $args['id'] === 4
         * The name inside of '$args' must match the placeholder in the url
         * https://www.slimframework.com/docs/v3/objects/router.html#route-placeholders
         */
        $id = $args['id'];
        $singleTodo = $this->todos->getOne($id);
        return $response->withJson(['data' => $singleTodo]);
    });

    // POST http://localhost:XXXX/api/todos
    $app->post('/todos', function ($request, $response, $args) {
        /**
         * Everything sent in 'body' when doing a POST-request can be
         * extracted with 'getParsedBody()' from the request-object
         * https://www.slimframework.com/docs/v3/objects/request.html#the-request-body
         */
        $body = $request->getParsedBody();
        $newTodo = $this->todos->add($body);
        return $response->withJson(['data' => $newTodo]);
    });
});

$app->run();
