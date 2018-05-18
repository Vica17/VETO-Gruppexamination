<?php require 'components/head.php'; ?>

  <?php
    if(isLoggedIn()){
      echo "<h1>Welcome, " . $_SESSION['username'] . "!</h1>";
      require 'components/logout_btn.php';
    }
    else {
      require 'components/login_form.php';
      require 'components/register_form.php';
    }
  ?>



  <div id="entries" class="entries">
    
  </div>



  <script src="scripts/main.js"></script>
  <script src="scripts/api.js"></script>

<?php require 'components/footer.php'; ?>
