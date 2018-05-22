<?php require 'components/head.php'; ?>
<?php require 'components/nav.php'; ?>



<div class="container">
  <div id="entry-editform">
    <form id="edit-entry-form" class="edit-post" action="/api/entries" method="post">
      <label for="title">Title</label>
      <input type="text" name="title" id="title" placholder="title">

      <label for="content">Content</label>
      <textarea name="content" rows="8" id="content" cols="80"></textarea>
      <input type="hidden" name="userID" value="<?= $_SESSION["userID"] ?>">
      <input type="hidden" name="entryID" value="<?= $entryID ?>">

      <input type="submit" name="submit" value="Submit">
    </form>
  </div>
</div>




<!--
  // VAD SKA HÄNDA
  // när man tycker på edit knappen
    // skicka med entryID till /edit route
    // hämta posten
    // printa posten

    // NÄR MAN TRYCKER PÅ SUBMIT
      // JavaScript funktion som submittar
      // tillbaka till första sidan
-->

<script src="/scripts/helpers.js"></script>
<script src="/scripts/api.js"></script>
<script src="/scripts/buildData.js"></script>
<script src="/scripts/functions.js"></script>

<?php require 'components/footer.php'; ?>
