<nav>

  <div class="nav-left">
    <a href="/">Home</a>
    <?php if(isLoggedIn()): ?>
      <a href="/profile/<?php echo $_SESSION['username']; ?>">Profile</a>
    <?php endif; ?>
    <a href="/new">Create New Post</a>
    <a href="/documentation">Documentation</a>
  </div>

  <div class="nav-right">
    <form class="" action="/search" method="GET">
      <input type="search" name="key" placeholder="search">
      <button type="submit">Submit</button>
    </form>
  </div>

</nav>
