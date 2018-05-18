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

  <div class="getItcomments">
    <h2>Get comments</h2>
    <p>Update,comment or delete</p>
    <div class="addLimit">
      <p>Add Limit</p>
      <input type="number" id="limitInput"/>
    </div>
  </div>

  <div class="button-wrapper">
    <button onclick="getAllComments()" id="getComments">Get All Comments</button>
    <button onclick="getAllLikes()" id="getLikes">Get All Likes</button>
  </div>
  


  <script src="scripts/api.js"></script>
  <script src="scripts/main.js"></script>

<?php require 'components/footer.php'; ?>
