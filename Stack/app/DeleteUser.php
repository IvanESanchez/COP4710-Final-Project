<?php
  // Ensure user is an admin
  require_once $_SERVER["DOCUMENT_ROOT"] . '/functions/admin_guard.php';

  // Only proceed if admin
  if(am_i_admin()) {
    // Only go ahead if uid given
    if(isset($_GET["uid"])) {
      // Save uid
      $uid = $_GET["uid"];

      // Start target url
      $url = "ManageUsers.php?operation=delete&uid=" . $uid;

      // Delete given uid and track whether operation succeeded or not
      require_once $_SERVER["DOCUMENT_ROOT"] . '/functions/account_management.php';
      if (delete_uid($uid)) {
        $url = $url . "&result=success";
      } else {
        $url = $url . "&result=fail" ;
      }

      // Redirect user back to management with appropriate data for management UX to give feedback
      header('Location: ' . $url);
    } else {
      // Redirect to user management
      header('Location: ManageUsers.php');
    }
  } else {
    // Redirect to login.php
    header('Location: login.php');
  }
?>