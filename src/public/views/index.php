<?php require 'components/head.php'; ?>

  <h1>Hello from the Frontend!</h1>

  <?php
    if(isLoggedIn()){
      echo "YOU ARE LOGGED IN";
      require 'components/logout_btn.php';
    }
    else {
      require 'components/login_form.php';
      require 'components/register_form.php';
    }
  ?>



  <form class="" action="/api/entries" method="POST">
    <input type="text" name="title" value="THIS IS THE TIRLE">
    <input type="text" name="content" value="CONTENT">
    <input type="text" name="createdBy" value="1">
    <input type="submit" value="submit">
  </form>



  <div id="entries">

  </div>



  <script src="scripts/main.js"></script>
  <script src="scripts/api.js"></script>

<?php require 'components/footer.php'; ?>
