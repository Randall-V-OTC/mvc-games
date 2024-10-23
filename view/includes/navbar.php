<?php
  $active_page = basename($_SERVER['PHP_SELF']);
?>

<nav class="navbar nav navbar-expand-lg">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Gaming</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link <?php echo (($active_page == 'index.php' || $active_page == '') ? 'active' : ''); ?>" aria-current="page" href="../mvc-games">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php echo (($active_page == 'games.php') ? 'active' : ''); ?>" aria-current="page" href="games.php">Games</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php echo (($active_page == 'addgame.php') ? 'active' : ''); ?>" aria-current="page" href="addgame.php">Add Game</a>
        </li>
      </ul>
    </div>
  </div>
</nav>