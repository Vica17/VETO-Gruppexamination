<?php
require 'components/head.php'; ?>


<div id="profile" class="profile">
  <header id="profile-info" class="profile-info">
    <?php require 'components/logout_btn.php'; ?>
  </header>
  <?php
  require 'components/nav.php'; ?>
  <div id="profile-entries-wrapper" class="container">
    <div id="profile-entries"></div>
  </div>
  <div id="profile-comments-wrapper" class="container">
    <div id="profile-comments" class="profile-comments"></div>
  </div>
  <div id="profile-likes-wrapper" class="container">
  <div id="profile-likes" class="profile-likes"></div>
  </div>
</div>

<script src="/scripts/helpers.js"></script>
<script src="/scripts/api.js"></script>
<script src="/scripts/buildData.js"></script>
<script src="/scripts/functions.js"></script>
<script src="/scripts/profile.js"></script>



<?php require 'components/footer.php'; ?>
