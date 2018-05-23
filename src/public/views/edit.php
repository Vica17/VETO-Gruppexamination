<?php require 'components/head.php'; ?>
<?php require 'components/nav.php'; ?>



<div class="container">
  <div id="entry-editform">
    <form id="edit-entry-form" class="edit-post" action="/api/entries" method="post">
      <h3>Edit this post</h3>
      <label for="title">Title</label><br>
      <input type="text" name="title" id="title" value="<?= $title ?>" placholder="title">
      <br><br>
      <label for="content">Content</label><br>
      <textarea name="content" rows="8" id="content" cols="80"><?= $content ?></textarea>
      <br>
      <input type="hidden" name="userID" value="<?= $_SESSION["userID"] ?>">
      <input type="hidden" name="entryID" value="<?= $entryID ?>">

      <input type="submit" name="submit" value="Submit" class="submit-btn">
    </form>
  </div>
</div>



<script src="/scripts/helpers.js"></script>
<script src="/scripts/api.js"></script>
<script src="/scripts/buildData.js"></script>
<script src="/scripts/functions.js"></script>

<?php require 'components/footer.php'; ?>
