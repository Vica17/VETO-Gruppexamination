<?php require 'components/head.php'; ?>

  <h1>Hello from the Frontend!</h1>

  <?php
    if(isLoggedIn()){
      echo "<p>Logged in!</p>";

      if(isAdmin()){
        echo "<p>You ARE an admin</p>";
      } else {
        echo "<p>You are NOT an admin</p>";
      }

    } else {
      echo "<p>Is NOT logged in!</p>";
    }

    if(isloggedIn() && isAdmin()){
      echo "<p>LOGGED IN + ADMIN</p>";
    }
  ?>

  <script src="scripts/main.js"></script>
  <script src="scripts/api.js"></script>

<?php require 'components/footer.php'; ?>
