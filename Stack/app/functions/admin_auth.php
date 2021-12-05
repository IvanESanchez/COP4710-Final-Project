<?php
  // Check if session involving username exists
  if (!isset($_SESSION['username'])) {
    // Redirect to login if not
    header('Location: login.php');
  } else {
    // Check if session has data on if user is admin
    if (isset($_SESSION['admin'])) {
      // Send user to normal main menu if user isn't admin
      if (!$_SESSION['admin']) {
        header('Location: mainmenu.php');
      }
    } else {
      // Not going to bother querying, just give normal menu; admin can logout/login to get session set properly
      header('Location: mainmenu.php');
    }
  }
?>