<?php
  /**
   * Collection of functions which query database and report information
   */

  /**
   * Queries database to retrieve emails of all users who are not admins
   * Returns an array of emails 
   */
  function get_professors_emails() {
    require $_SERVER["DOCUMENT_ROOT"] . '/functions/db.php';

    $ret_arr = [];

    // Construct query
    $query = "SELECT email FROM USER WHERE admin=FALSE;";

    try {
      // Retrieve results
      $result = $mysqli->query($query);

      // Handle if no results returned
      if ($result->num_rows > 0) {
        // Fetch returned data into return array
        while ($row = $result->fetch_array(MYSQLI_NUM)) {
          $ret_arr[] = $row[0];
        }
      }

      // Close iterator
      $result->close();
    } catch (mysqli_sql_exception $e) {
      // Output error message
      require_once $_SERVER["DOCUMENT_ROOT"] . '/functions/show_feedback.php';
      show_error($mysqli->error);
    } finally {
      // Close connection
      $mysqli->close();
    }

    return $ret_arr;
  }

  /**
   * Takes a uid and returns the name associated with it
   * Returns null if $uid does not exist or name field not populated
   */
  function get_name($uid) {
    require $_SERVER["DOCUMENT_ROOT"] . '/functions/db.php';

    // Sanitize uid
    $uid = intval($uid);

    // Construct query
    $query = "SELECT name FROM USER WHERE uid=" . $uid . ";";

    try {
      // Retrieve results
      $result = $mysqli->query($query);

      // Handle if no results returned
      if ($result->num_rows > 0) {
        // Fetch the row
        $row = $result->fetch_assoc();

        // Return the name
        return $row["name"];
      } else {
        return null;
      }

      // Close iterator
      $result->close();
    } catch (mysqli_sql_exception $e) {
      // Output error message
      require_once $_SERVER["DOCUMENT_ROOT"] . '/functions/show_feedback.php';
      show_error($mysqli->error);
    } finally {
      // Close connection
      $mysqli->close();
    }
  }

  /**
   * Takes a uid and returns the password associated with it
   * Returns null if $uid does not exist or password field not populated
   */
  function get_password($uid) {
    require $_SERVER["DOCUMENT_ROOT"] . '/functions/db.php';

    // Sanitize uid
    $uid = intval($uid);

    // Construct query
    $query = "SELECT password FROM USER WHERE uid=" . $uid . ";";

    try {
      // Retrieve results
      $result = $mysqli->query($query);

      // Handle if no results returned
      if ($result->num_rows > 0) {
        // Fetch the row
        $row = $result->fetch_assoc();

        // Return the name
        return $row["password"];
      } else {
        return null;
      }

      // Close iterator
      $result->close();
    } catch (mysqli_sql_exception $e) {
      // Output error message
      require_once $_SERVER["DOCUMENT_ROOT"] . '/functions/show_feedback.php';
      show_error($mysqli->error);
    } finally {
      // Close connection
      $mysqli->close();
    }
  }

  /**
   * Takes a uid and returns the email associated with it
   * Returns null if $uid does not exist or email field not populated
   */
  function get_email($uid) {
    require $_SERVER["DOCUMENT_ROOT"] . '/functions/db.php';

    // Sanitize uid
    $uid = intval($uid);

    // Construct query
    $query = "SELECT email FROM USER WHERE uid=" . $uid . ";";

    try {
      // Retrieve results
      $result = $mysqli->query($query);

      // Handle if no results returned
      if ($result->num_rows > 0) {
        // Fetch the row
        $row = $result->fetch_assoc();

        // Return the name
        return $row["email"];
      } else {
        return null;
      }

      // Close iterator
      $result->close();
    } catch (mysqli_sql_exception $e) {
      // Output error message
      require_once $_SERVER["DOCUMENT_ROOT"] . '/functions/show_feedback.php';
      show_error($mysqli->error);
    } finally {
      // Close connection
      $mysqli->close();
    }
  }

  /**
   * Get all, non-password information for all users in USER
   * Returns an associative array of arrays
   * Ex- ret_arr['email'] contains an array of emails
   */
  function get_all_users() {
    require $_SERVER["DOCUMENT_ROOT"] . '/functions/db.php';

    // Prepare query
    $query = "SELECT uid, email, name, admin FROM USER;";

    // Prepare return array
    $ret_arr['uid'] = [];
    $ret_arr['email'] = [];
    $ret_arr['name'] = [];
    $ret_arr['admin'] = [];

    try {
      // Retrieve results
      $result = $mysqli->query($query);

      // Handle if no results returned
      if ($result->num_rows > 0) {
        // Fetch returned data into return array
        while ($row = $result->fetch_assoc()) {
          array_push($ret_arr['uid'], $row['uid']);
          array_push($ret_arr['email'], $row['email']);
          array_push($ret_arr['name'], $row['name']);
          array_push($ret_arr['admin'], $row['admin']);
        }
      }

      // Close iterator
      $result->close();
    } catch (mysqli_sql_exception $e) {
      // Output error message
      require_once $_SERVER["DOCUMENT_ROOT"] . '/functions/show_feedback.php';
      show_error($mysqli->error);
    } finally {
      // Close connection
      $mysqli->close();
    }

    return $ret_arr;
  }
?>