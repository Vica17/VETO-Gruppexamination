<div class="nav">
  <div class="nav-left">
    <li> <a href="/">Home</a> </li>
    <li> <a href="/documentation">Documentation</a> </li>
    <?php if(isLoggedIn()): ?>
      <li> <a href="/profile/<?php echo $_SESSION['username']; ?>">Profile</a> </li>
    <?php endif; ?>
  </div>
  <div class="nav-right">
    <form class="" action="/search" method="GET">
      <input type="search" name="key" placeholder="search">
      <button type="submit">Submit</button>
    </form>
  </div>
</div>
