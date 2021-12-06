<?php
  /**
   * Functions to guard against users doing admin things
   */

  /**
   * Returns true if user is admin, false if not
   */
  function am_i_admin() {
    // Load/create session
    require $_SERVER["DOCUMENT_ROOT"] . '/functions/no_cookies.php';

    // Check if session has data on if user is admin
    if (isset($_SESSION['admin'])) {
      // Return true if user is admin
      if ($_SESSION['admin']) {
        return true
      } else {
        return false;
      }
    } else {
      // Not going to bother querying, just mark as false; admin can logout/login to get session set properly
      return false;
    }
  }
?>