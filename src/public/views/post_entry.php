<?php require 'components/head.php'; ?>

<?php require 'components/nav.php'; ?>

<div class="container">
  <div id="createNewEntry">
    <form action="/api/entries" method="POST" name="postEntry">
      <h3>Make a post</h3>

      <label for="title">Title</label>
      <input type="text"
             placeholder="Title"
             name="title"
             id="title"
             class="row">

      <label for="subject">Content</label>
      <textarea name="content"
                placeholder="Write something"
                id="subject"
                class="row"></textarea>
      <input type="hidden"
               name="createdBy"
               value="<?php echo $_SESSION['userID']; ?>">
      <input type="submit"
             value="Submit"
             class="btn">
    </form>
  </div>
</div>

<script src="/scripts/helpers.js"></script>
<script src="/scripts/api.js"></script>
<script src="/scripts/buildData.js"></script>
<script src="/scripts/functions.js"></script>

<?php require 'components/footer.php'; ?>
