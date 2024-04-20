<?php
// Get the current page URL
$current_page = basename($_SERVER['PHP_SELF']);
?>

<nav class="navbar navbar-expand-md bg-dark navbar-dark d-flex justify-content-between align-items-center">
  <a class="navbar-brand" href="index.php">Racine14 Creator</a>
  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="ml-auto navbar-nav">
      <li class="nav-item <?php echo ($current_page == 'index.php') ? 'active' : ''; ?>">
        <a class="nav-link" href="index.php">Dashboard</a>
      </li>
      <li class="nav-item <?php echo ($current_page == 'data.php') ? 'active' : ''; ?>">
        <a class="nav-link" href="data.php">Data</a>
      </li>
      <li class="nav-item <?php echo ($current_page == 'settings.php') ? 'active' : ''; ?>">
        <a class="nav-link" href="settings.php">Settings</a>
      </li>
    </ul>
  </div>
</nav>

<style>
  /* Additional custom styles */
  .nav-link{
    border-radius: .4rem
  }
  .navbar-nav .nav-item.active .nav-link {
    background-color: #007bff; /* Blue color */
  }

  .navbar-nav .nav-item .nav-link:hover {
    background-color: #6c757d; /* Dark grey color */
  }
</style>