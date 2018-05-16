<?php
  // require '../partials/session_start.php';
  // require '../partials/_helpers.php';

  if (session_status() == PHP_SESSION_NONE) {
    session_set_cookie_params(3600);
    session_start();
  }

  function isLoggedIn(){
    if(isset($_SESSION["loggedIn"]) && $_SESSION["loggedIn"] == true ){
      return true;
    } else {
      return false;
    }
  }

  function isAdmin(){
    if(isset($_SESSION["isAdmin"]) && $_SESSION["isAdmin"] == true ){
      return true;
    } else {
      return false;
    }
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="css/style.css">
  <title>Frontend</title>
</head>
<body>
