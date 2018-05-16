<?php

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
