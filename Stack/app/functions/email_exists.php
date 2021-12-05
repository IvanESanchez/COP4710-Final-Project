<?php
  // Require capability to show error
  require_once $_SERVER["DOCUMENT_ROOT"] . '/functions/show_feedback.php';

  /**
   * Check if given email exists in USER table of database
   * Return true if email exists
   * Return false if email does not exist OR if error occurs during query
   */
  function email_exists($email) {
    // Open database connection
    require $_SERVER["DOCUMENT_ROOT"] . '/functions/db.php';

    // Sanitize input
    $email = $mysqli->real_escape_string(trim($email));

    // Check if account exists
		$query = "SELECT uid FROM USER WHERE email = '" . $email . "';";

    try {
			// Run query
			$result = $mysqli->query($query);

			// Check if any results found
			if ($result->num_rows > 0) {
        // Yes
        $mysqli->close();
        return true;
      } else {
        // No
        $mysqli->close();
        return false;
      }
    } catch (mysqli_sql_exception $e) {
      // Show error and return false
      show_error($mysqli->error);
      $mysqli->close();
      return false;
    }
  }
?>