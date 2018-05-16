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

  <div id="entries">

  </div>

  <script src="scripts/main.js"></script>
  <script src="scripts/api.js"></script>

<?php require 'components/footer.php'; ?>
