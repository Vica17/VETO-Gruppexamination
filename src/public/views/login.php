

<?php
  require_once '../../vendor/autoload.php';
  require_once '../App/Controllers/UserController.php';
  // require_once '../App/ConfigHandler.php';
  // $db = ConfigHandler::getDefaultConfig();
  // $user = new UserController();
  // die(var_dump($user));

  // if($user->isLoggedIn()){
  //   echo "USER is logged in!";
  // } else {
  //   echo "ISER is not logged in!";
  // }

?>



<div class="form">
  <div class=header>
  <h2>Login</h2>
  </div>
 <form action="/login" method="POST">
    <label for="formGroupExampleInput">Username</label>
    <input type="text" class="form-control" name="username">


    <label for="formGroupExampleInput2">Password</label>
    <input type="text" class="form-control" name="password">

    <button type="submit" class="btn btn-default">Submit</button>
 </form>
</div>
