<nav>

  <div class="nav-left">
    <a href="/">Home</a>
    <a href="/documentation">Documentation</a>
    <?php if(isLoggedIn()): ?>
      <a href="/profile/<?php echo $_SESSION['username']; ?>">Profile</a>
    <?php endif; ?>
  </div>

  <div class="nav-right">
    <form class="" action="/search" method="GET">
      <input type="search" name="key" placeholder="search">
      <button type="submit">Submit</button>
    </form>
  </div>

</nav>
