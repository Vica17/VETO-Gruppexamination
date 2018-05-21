<?= $username ?>

<?php require 'components/head.php'; ?>

<div id="profile">
  <div id="profile-info"></div>
  <div id="profile-menu" class="profile-menu"></div>
  <div id="profile-entries"></div>
  <div id="profile-comments"></div>
  <div id="profile-likes"></div>
</div>

<script src="/scripts/api.js"></script>
<script src="/scripts/buildData.js"></script>
<script src="/scripts/profile.js"></script>



<?php require 'components/footer.php'; ?>