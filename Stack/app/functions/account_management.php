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

  /**
   * Create a new user. Takes:
   * $email - Email address of the new user
   * $name - Name of the new user
   * $password - New user's password
   * $admin - "TRUE" if user should be an admin, "FALSE" if user should not be
   * Returns the new user's uid (null if operation failed)
   */
  function create_new_user($email, $password, $name, $admin) {
    require $_SERVER["DOCUMENT_ROOT"] . '/functions/db.php';
    require_once $_SERVER["DOCUMENT_ROOT"] . '/functions/show_feedback.php';

    // Sanitize input
    $email = $mysqli->real_escape_string(trim($email));
    $name = $mysqli->real_escape_string(trim($name));
    $password = $mysqli->real_escape_string(trim($password));

    // Set admin to 0 or 1
    if ($admin) {
      $admin = 1;
    } else {
      $admin = 0;
    }

    // Prepare return value
    $uid = null;

    // Prepare the query
    $query = "INSERT INTO USER (
      name,
      email,
      password,
      admin
    ) VALUES (
      '" . $name . "',
      '" . $email . "',
      '" . $pass . "',
      " . $admin . "
    );";

    try {
      // Perform INSERT
      $mysqli->query($query);
      $uid = $mysqli->insert_id;
    } catch (mysqli_sql_exception $e) {
      show_error("Unable to create " . $email . ".<br>" . $mysqli->error);
    } finally {
      $mysqli->close();
      return $uid;
    }
  }

  /**
   * Takes a reminder id and deletes it if it exists
   * Returns true if it succeeds, false if it fails
   */
  function delete_reminder($id) {
    require $_SERVER["DOCUMENT_ROOT"] . '/functions/db.php';
    require_once $_SERVER["DOCUMENT_ROOT"] . '/functions/show_feedback.php';

    // Sanitize input
    $id = intval($id);

    // Construct query
    $query = "DELETE FROM REMINDER WHERE id=" . $id . ";";

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

/**
   * Create a new reminder. Takes:
   * $date - Date the reminder will be sent on
   * Returns the new reminder's id (null if operation failed)
   */
  function create_new_reminder($date) {
    require $_SERVER["DOCUMENT_ROOT"] . '/functions/db.php';
    require_once $_SERVER["DOCUMENT_ROOT"] . '/functions/show_feedback.php';

    // Sanitize input
    $date = date("Y-m-d", strtotime($date));

    // Prepare return value
    $id = null;

    // Prepare the query
    $query = "INSERT INTO REMINDERS (
      date
    ) VALUES (
      '" . $date . "'
    );";

    try {
      // Perform INSERT
      $mysqli->query($query);
      $id = $mysqli->insert_id;
    } catch (mysqli_sql_exception $e) {
      show_error("Unable to create reminder.<br>" . $mysqli->error);
    } finally {
      $mysqli->close();
      return $id;
    }
  }
?>