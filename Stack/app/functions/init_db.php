<?php
  require './db.php';

  // Create USER table
  $mysqli->query("CREATE TABLE IF NOT EXISTS USER (
    uid INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(64),
    email VARCHAR(128) NOT NULL UNIQUE,
    password VARCHAR(64) NOT NULL,
    admin BOOLEAN NOT NULL DEFAULT FALSE,
    INDEX (email)
  );");

  // Create SEMESTER table
  $mysqli->query("CREATE TABLE IF NOT EXISTS SEMESTER (
    skey INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    year INT UNSIGNED NOT NULL,
    season ENUM('Spring', 'Summer', 'Fall') NOT NULL
  );");

  // Create BOOK table
  $mysqli->query("CREATE TABLE IF NOT EXISTS BOOK (
    bid INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    isbn int UNSIGNED UNIQUE NOT NULL,
    title VARCHAR(128) NOT NULL,
    author VARCHAR(128) NOT NULL,
    edition INT UNSIGNED,
    publisher VARCHAR(128),
    INDEX (isbn)
  );");

  // Create BOOK_LIST table
  $mysqli->query("CREATE TABLE IF NOT EXISTS BOOK_LIST (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    blid INT UNSIGNED NOT NULL,
    bid INT UNSIGNED NOT NULL,
    INDEX (blid),
    FOREIGN KEY (bid)
      REFERENCES BOOK(bid)
  );");

  // Create BOOK_REQS table
  $mysqli->query("CREATE TABLE IF NOT EXISTS BOOK_REQS (
    brid INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    blid INT UNSIGNED NOT NULL,
    skey INT UNSIGNED NOT NULL,
    uid INT UNSIGNED NOT NULL,
    FOREIGN KEY (blid)
      REFERENCES BOOK_LIST(blid),
    FOREIGN KEY (skey)
      REFERENCES SEMESTER(skey),
    FOREIGN KEY (uid)
      REFERENCES USER(uid)
  );");

  // Obtain super admin password from secret and escape it to ensure it doesn't compromise the database
  $super_admin_password = $mysqli->real_escape_string(file_get_contents('/run/secrets/super-admin-password'));

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
?>