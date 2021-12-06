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

    // Sanitize input
    $uid = intval($uid);
    $new_name = $mysqli->real_escape_string(trim($new_name));

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

  /**
   * Takes uid and a new password.
   * UPDATEs account's password to value of $new_name
   */
  function change_password($uid, $new_password) {
    require $_SERVER["DOCUMENT_ROOT"] . '/functions/db.php';
    require_once $_SERVER["DOCUMENT_ROOT"] . '/functions/show_feedback.php';

    // Sanitize input
    $uid = intval($uid);
    $new_password = $mysqli->real_escape_string(trim($new_password));

    // Construct query
    $query = "UPDATE USER SET password = '" . $new_password . "' WHERE uid=" . $uid . ";";

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
      // Suppress error message as it would reveal password
      //show_error($mysqli->error);
      return false;
    } finally {
      // Close connection
      $mysqli->close();
    }
  }

  /**
   * Takes uid and a new email.
   * UPDATEs account's email to value of $new_name
   */
  function change_email($uid, $new_email) {
    require $_SERVER["DOCUMENT_ROOT"] . '/functions/db.php';
    require_once $_SERVER["DOCUMENT_ROOT"] . '/functions/show_feedback.php';

    // Sanitize input
    $uid = intval($uid);
    $new_password = $mysqli->real_escape_string(trim($new_email));

    // Construct query
    $query = "UPDATE USER SET email = '" . $new_email . "' WHERE uid=" . $uid . ";";

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

  /**
   * Takes a uid and deletes it if it exists
   * Returns true if it succeeds, false if it fails
   */
  function delete_uid($uid) {
    require $_SERVER["DOCUMENT_ROOT"] . '/functions/db.php';
    require_once $_SERVER["DOCUMENT_ROOT"] . '/functions/show_feedback.php';

    // Sanitize input
    $uid = intval($uid);

    // Construct query
    $query = "DELETE FROM USER WHERE uid=" . $uid . ";";

    try {
      // Attempt the query, catch if it fails
      if ($mysqli->query($query) and $mysqli->affected_rows > 0) {
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