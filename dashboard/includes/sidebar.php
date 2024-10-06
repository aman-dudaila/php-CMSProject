<div class="sidenav">
  <div class="logo">
    <a href="index.php"><img height="120" src="assets/images/logo.png" title="Logo"></a>
  </div>
  <a href="index.php">Dashboard</a>
  <?php if(isAdmin()) { ?>
    <a href="users.php">Users List</a>
    <a href="pages-data.php">Pages</a>
    <a href="contact.php">Contact</a>
  <?php } ?>
  <a href="expenses.php">Expenses</a>
  <a href="index.php?action=logout">Logout</a>
</div>
<div class="main">