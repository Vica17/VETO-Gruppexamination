<?php require 'components/head.php'; ?>
  <?php
    if(isLoggedIn()){?>
      <header>
      <?php require 'components/logout_btn.php';?>
      <h1>Welcome, <?php echo $_SESSION['username']?>!</h1>
      </header>

      <div class="container">
      <div id="entries" onload="getAllEntries()" class="entries"></div>
      <?php }
    else {
      require 'components/login_form.php';
      require 'components/register_form.php';
    }?>


  <script src="/scripts/buildData.js"></script>
  <script src="/scripts/functions.js"></script>
  <script src="/scripts/api.js"></script>
  <script src="/scripts/main.js"></script>

<?php require 'components/footer.php'; ?>
