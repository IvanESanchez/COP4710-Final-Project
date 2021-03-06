<?php
  // Instantiate session
  require "functions/no_cookies.php";

  // Check if session involving username exists
  if (!isset($_SESSION['username'])) {
    // Redirect to login if not
    header('Location: login.php');
  } else {
    // Check if session has data on if user is admin
    if (isset($_SESSION['admin'])) {
      // Admin menu if yes
      if ($_SESSION['admin']) {
        header('Location: adminmenu.php');
      } else {
        // Main menu if not
        header('Location: mainmenu.php');
      }
    } else {
      // Not going to bother querying, just give normal menu; admin can logout/login to get session set properly
      header('Location: mainmenu.php');
    }
  }
?>