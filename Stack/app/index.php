<?php
  require "functions/no_cookies.php";

  if (!isset($_SESSION['username'])) {
    header('Location: login.php');
  } else {
    if (isset($_SESSION['admin'])) {
      if ($_SESSION['admin']) {
        header('Location: admin.php');
      } else {
        header('Location: mainmenu.php');
      }
    } else {
      header('Location: mainmenu.php');
    }
  }
?>