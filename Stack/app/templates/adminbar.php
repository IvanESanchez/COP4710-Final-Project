<?php
  require $_SERVER["DOCUMENT_ROOT"] . '/functions/admin_auth.php';
?>
<!-- The following code is used for the side bar menu options -->
<div class="wrapper">
  <div class="side-bar">
    <h2>Menu<ul>Options</h2>
    <ul>
      <li><a href="AdminMenu.php"><img src="house-fill.svg" alt="Home" width="15"> Admin Menu</a></li>
      <li><a href="AdminForm.php"><img src="book.svg" alt="book-order" width="15"> Book Request Form</a></li>
      <li><a href="AdminView.php"><img src="list.svg" alt="book-request" width="15"> View Book Forms</a></li>
      <li><a href="ManageAccount.php"><img src ="person-circle.svg" alt="account" width="15"> Manage Account</a></li>
      <li><a href="logout.php">Log Out</a></li>
    </ul>
  </div>
</div>
