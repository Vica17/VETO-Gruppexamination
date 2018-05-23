<?php require 'components/head.php'; ?>
  <?php
    if(isLoggedIn()){?>
      <header>
        <?php if(isLoggedIn()){
          require 'components/logout_btn.php';
        } else {
          require 'components/login_btn.php';
        } ?>
      <h1>Welcome, <?php echo $_SESSION['username']?>!</h1>
      </header>

      <?php require 'components/nav.php'; ?>

      <div class="container">
        <div id="entries" class="entries">
          <h2>All entries</h2>
        </div>
      <?php }
    else { ?>
      <div class="container_login_page">
        <div class="container_login_form">
          <?php require 'components/login_form.php'; ?>
        </div>
        <div class="container_login_form">
          <?php
            require 'components/register_form.php';
          ?>
        </div>
      </div>
      <?php  }?>

  <script src="/scripts/helpers.js"></script>
  <script src="/scripts/api.js"></script>
  <script src="/scripts/buildData.js"></script>
  <script src="/scripts/functions.js"></script>
  <script src="/scripts/main.js"></script>

<?php require 'components/footer.php'; ?>
