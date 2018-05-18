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

  <div id="entries" onload="getAllEntries()" class="entries">

  </div>

  <div class="button-wrapper">
    <button onclick="getAllComments()" id="getComments">Get All Comments</button>
    <button onclick="getAllLikes()" id="getLikes">Get All Likes</button>
  </div>
  


  <script src="scripts/api.js"></script>
  <script src="scripts/main.js"></script>

<?php require 'components/footer.php'; ?>
