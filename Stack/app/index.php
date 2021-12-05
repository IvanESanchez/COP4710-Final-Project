<?php
  require "functions/no_cookies.php";

  if (!isset($_SESSION['name'])) {
    header('Location: login.php');
  } else {
    if (isset($_SESSION['admin'])) {
      if ($_SESSION['admin']) {
        header('Location: adminmenu.html');
      } else {
        header('Location: mainmenu.php');
      }
    } else {
      header('Location: mainmenu.php');
    }
  }
?>