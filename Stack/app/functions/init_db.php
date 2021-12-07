<?php
  require $_SERVER["DOCUMENT_ROOT"] . '/functions/db.php';

  // Create USER table
  $mysqli->query("CREATE TABLE IF NOT EXISTS USER (
    uid INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(64) NOT NULL,
    email VARCHAR(128) NOT NULL UNIQUE,
    password VARCHAR(64) NOT NULL,
    admin BOOLEAN NOT NULL DEFAULT FALSE,
    INDEX (email)
  );");

  // Create SEMESTER table
  $mysqli->query("CREATE TABLE IF NOT EXISTS SEMESTER (
    skey INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    year INT UNSIGNED NOT NULL,
    season ENUM('Spring', 'Summer', 'Fall') NOT NULL,
    UNIQUE KEY (year, season)
  );");

  // Create BOOK table
  $mysqli->query("CREATE TABLE IF NOT EXISTS BOOK (
    bid INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    isbn VARCHAR(128) UNIQUE NOT NULL,
    title VARCHAR(128) NOT NULL,
    author VARCHAR(128) NOT NULL,
    edition INT UNSIGNED,
    publisher VARCHAR(128),
    INDEX (isbn)
  );");

  // Create BOOK_REQS table
  $mysqli->query("CREATE TABLE IF NOT EXISTS BOOK_REQS (
    brid INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    skey INT UNSIGNED NOT NULL,
    uid INT UNSIGNED NOT NULL,
    FOREIGN KEY (skey)
      REFERENCES SEMESTER(skey),
    FOREIGN KEY (uid)
      REFERENCES USER(uid),
    UNIQUE KEY (uid, skey)
  );");

  // Create BOOK_LIST table
  $mysqli->query("CREATE TABLE IF NOT EXISTS BOOK_LIST (
    blid INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    brid INT UNSIGNED NOT NULL,
    bid INT UNSIGNED NOT NULL,
    FOREIGN KEY (brid)
      REFERENCES BOOK_REQS(brid),
    FOREIGN KEY (bid)
      REFERENCES BOOK(bid)
  );");

  // Create REMINDERS table
  $mysqli->query("CREATE TABLE IF NOT EXISTS REMINDERS (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    date DATE NOT NULL,
  );");

  // Obtain super admin password from secret and escape it to ensure it doesn't compromise the database
  $super_admin_password = $mysqli->real_escape_string(trim(file_get_contents('/run/secrets/super-admin-password')));

  $mysqli->query("INSERT INTO USER (
      name,
      email,
      password,
      admin
    ) VALUES (
    'Super Admin',
    'super_admin@team13.cop4710.ucf.edu',
    '" . $super_admin_password . "',
    TRUE
  );");

  // Close MariaDB connection
  $mysqli->close();
?>