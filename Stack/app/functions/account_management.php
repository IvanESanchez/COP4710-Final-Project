<?php
  /**
   * Functions helpful for managing accounts
   */

  /**
   * Takes uid and a new name.
   * UPDATEs account's name to value of $new_name
   */
  function change_name($uid, $new_name) {
    require $_SERVER["DOCUMENT_ROOT"] . '/functions/db.php';
    require_once $_SERVER["DOCUMENT_ROOT"] . '/functions/show_feedback.php';

    // Construct query
    $query = "UPDATE USER SET name = '" . $new_name . "' WHERE uid=" . $uid . ";";

    try {
      // Attempt the query, catch if it fails
      if ($mysqli->query($query)) {
        return true;
      } else {
        // Output error message
        show_error($mysqli->error);
        return false;
      }
    } catch (mysqli_sql_exception $e) {
      // Output error message
      show_error($mysqli->error);
      return false;
    } finally {
      // Close connection
      $mysqli->close();
    }
  }
?>