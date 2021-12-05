<?php
  function show_error ($message) {
    include $_SERVER["DOCUMENT_ROOT"] . '/templates/error.php';
  }

  function show_success ($message) {
    include $_SERVER["DOCUMENT_ROOT"] . '/templates/success.php';
  }
?>