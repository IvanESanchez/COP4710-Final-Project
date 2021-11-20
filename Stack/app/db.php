<?php
  // Fetch environment-specific connection data
  $mariadb_username = getenv('MARIADB_USER');
  $mariadb_password = file_get_contents('/run/secrets/mariadb-password');
  $mariadb_database = getenv('MARIADB_DATABASE');

  // You should enable error reporting for mysqli before attempting to make a connection
  mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

  // Initiate connection
  $mysqli = new mysqli('db', $mariadb_username, $mariadb_password, $mariadb_database, 3306);

  // Set the desired charset after establishing a connection
  $mysqli->set_charset('utf8mb4');
?>