<?php
  // Ensure user is an admin
  require_once $_SERVER["DOCUMENT_ROOT"] . '/functions/admin_guard.php';

  // Only proceed if admin
  if(am_i_admin()) {
    // Only go ahead if uid given
    if(isset($_GET["uid"])) {
      // Save uid
      $uid = $_GET["uid"];

      // Delete given uid
      require_once $_SERVER["DOCUMENT_ROOT"] . '/functions/account_management.php';
      if (delete_uid($uid)) {

      } else {
        
      }
    } else {
      // Redirect to user management
      header('Location: ManageUsers.php');
    }
  } else {
    // Redirect to login.php
    header('Location: login.php');
  }
?>