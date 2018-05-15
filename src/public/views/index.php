<?php
  namespace App\Controllers;
  require_once '../../vendor/autoload.php';
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
  <h1>Hello from the Frontend!</h1>

  <?php
    $user = new UserController();

    if($user->isLoggedIn()){
      echo "<p>Logged in!</p>";

      if($user->isAdmin()){
        echo "<p>You ARE an admin</p>";
      } else {
        echo "<p>You are NOT an admin</p>";
      }

    } else {
      echo "<p>Is NOT logged in!</p>";
    }

    if($user->isloggedIn() && $user->isAdmin()){
      echo "<p>LOGGED IN + ADMIN</p>";
    }
  ?>

  <script src="scripts/main.js"></script>
  <script src="scripts/api.js"></script>
</body>

</html>
