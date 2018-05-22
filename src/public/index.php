<?php
session_start();

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

$app->get('/profile/{username}', function ($request, $response, $args) {
  return $this->view->render($response, 'profile.php');
});

$app->get('/search', function ($request, $response, $args) {
  return $this->view->render($response, 'search.php');
});

$app->get('/documentation', function ($request, $response, $args) {
  return $this->view->render($response, 'documentation.php');
});

$app->get('/post/{postID}', function ($request, $response, $args) {
  return $this->view->render($response, 'post.php');
});


// Login & Logout
$app->post('/login', function ($request, $response, $args) {
  $body = $request->getParsedBody();
  $res = $this->user->login($body);

  if($res == true){
    return $response->withJson($res);
  } else {
    return $response->withJson($res);
  }

});

$app->get('/logout', function ($request, $response, $args) {
  $res = $this->user->logout();
  return $response = $response->withRedirect('/');
});

$app->post('/register', function($request, $response, $args){
  $body = $request->getParsedBody();
  return $this->user->register($body);
});


$app->group('/api', function () use ($app) {

  require 'partials/userRoutes.php';
  require 'partials/entryRoutes.php';
  require 'partials/commentsRoutes.php';
  require 'partials/likesRoutes.php';

});

$app->run();
