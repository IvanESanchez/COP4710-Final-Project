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
    $ret_arr = [];

    try {
      // Retrieve results
      $result = $mysqli->query($query);

      // Handle if no results returned
      if ($result->num_rows > 0) {
        // Fetch returned data into return array
        while ($row = $result->fetch_assoc()) {
          $ret_arr[] = array("uid"=>$row['uid'], "email"=>$row['email'], "name"=>$row['name'], "admin"=>$row['admin']);
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
   * Get all, non-password information for a given $uid
   * Returns an associative array
   */
  function get_user_no_pw($uid) {
    require $_SERVER["DOCUMENT_ROOT"] . '/functions/db.php';

    // Sanitize uid
    $uid = intval($uid);

    // Prepare query
    $query = "SELECT email, name, admin FROM USER WHERE uid=" . $uid . ";";

    // Prepare return array
    $ret_arr = [];

    try {
      // Retrieve results
      $result = $mysqli->query($query);

      // Handle if no results returned
      if ($result->num_rows > 0) {
        // Fetch the row
        $row = $result->fetch_assoc();

        // Get content from row
        $ret_arr['email'] = $row['email'];
        $ret_arr['name'] = $row['name'];
        $ret_arr['admin'] = $row['admin'];
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
   * Takes a $uid and returns an array of associative arrays with semester keys and brids
   */
  function get_user_reqs($uid) {
    require $_SERVER["DOCUMENT_ROOT"] . '/functions/db.php';

    // Prepare query
    $query = "SELECT skey, brid FROM BOOK_REQS WHERE uid = " . $uid . ";";
    
    // Prepare return array
    $ret_arr = [];
    
    try {
      // Retrieve results
      $result = $mysqli->query($query);
    
      // Handle if no results returned
      if ($result->num_rows > 0) {
        // Fetch returned data into return array
        while ($row = $result->fetch_assoc()) {
          $ret_arr[] = array("skey"=>$row['skey'], "brid"=>$row['brid']);
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
   * Gets id and date as an array of associative arrays for all entries in REMINDERS
   */
  function get_all_reminders() {
    require $_SERVER["DOCUMENT_ROOT"] . '/functions/db.php';

    // Prepare query
    $query = "SELECT id, date FROM REMINDERS;";

    // Prepare return array
    $ret_arr = [];

    try {
      // Retrieve results
      $result = $mysqli->query($query);

      // Handle if no results returned
      if ($result->num_rows > 0) {
        // Fetch returned data into return array
        while ($row = $result->fetch_assoc()) {
          $ret_arr[] = array("id"=>$row['id'], "date"=>$row['date']);
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
   * Returns an array of $uid values found in BOOk_REQS
   */
  function get_all_professors_with_requests() {
    require $_SERVER["DOCUMENT_ROOT"] . '/functions/db.php';

    // Prepare query
    $query = "SELECT DISTINCT uid FROM BOOK_REQS;";

    // Prepare return array
    $ret_arr = [];

    try {
      // Retrieve results
      $result = $mysqli->query($query);

      // Handle if no results returned
      if ($result->num_rows > 0) {
        // Fetch returned data into return array
        while ($row = $result->fetch_assoc()) {
          $ret_arr[] = $row['uid'];
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
   * Takes a $uid, returns skey values associated with that $uid in BOOK_REQS
   */
  function get_reqs_semesters_for_uid($uid) {
    require $_SERVER["DOCUMENT_ROOT"] . '/functions/db.php';

    // Sanitize uid
    $uid = intval($uid);

    // Prepare query
    $query = "SELECT DISTINCT skey FROM BOOK_REQS WHERE uid=" . $uid . ";";

    // Prepare return array
    $ret_arr = [];

    try {
      // Retrieve results
      $result = $mysqli->query($query);

      // Handle if no results returned
      if ($result->num_rows > 0) {
        // Fetch returned data into return array
        while ($row = $result->fetch_assoc()) {
          $ret_arr[] = $row['skey'];
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
   * Takes an array of semester keys
   * Returns an associative array of the skey, season, and year values those keys map to, sorted ascending
   */
  function get_semesters_sorted_asc($skeys) {
    require $_SERVER["DOCUMENT_ROOT"] . '/functions/db.php';

    // Initialize IN string
    $in = '';

    // Generate IN string
    foreach($skeys as $skey) {
      // Sanitize skey
      $skey = intval($skey);

      // Check base case of $in being empty
      if($in == '') {
        $in = $skey;
      } else {
        // If $in is not empty, prepend a comma
        $in .= ', ' . $skey;
      }
    }

    // Prepare query
    $query = "SELECT skey, season, year FROM SEMESTER WHERE skey IN (" . $in . ") ORDER BY year ASC, season ASC;";

    // Prepare return array
    $ret_arr = [];

    try {
      // Retrieve results
      $result = $mysqli->query($query);

      // Handle if no results returned
      if ($result->num_rows > 0) {
        // Fetch returned data into return array
        while ($row = $result->fetch_assoc()) {
          $ret_arr[] = array("skey"=>$row['skey'], "season"=>$row['season'], "year"=>$row['year']);
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
   * Takes a book request ID ($brid) and returns an array of book IDs ($bid) which match
   */
  function get_book_list($brid) {
    require $_SERVER["DOCUMENT_ROOT"] . '/functions/db.php';

    // Sanitize uid
    $uid = intval($brid);

    // Prepare query
    $query = "SELECT DISTINCT bid FROM BOOK_LIST WHERE brid=" . $brid . ";";

    // Prepare return array
    $ret_arr = [];

    try {
      // Retrieve results
      $result = $mysqli->query($query);

      // Handle if no results returned
      if ($result->num_rows > 0) {
        // Fetch returned data into return array
        while ($row = $result->fetch_assoc()) {
          $ret_arr[] = $row['bid'];
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

