<?php
  if (!session_start()) {
    $title = "No Cookies";
    include $_SERVER["DOCUMENT_ROOT"] . '/templates/head.php';
    $page_body = '<div class="alert alert-danger" role="alert">
      Unable to start session, your browser is not accepting cookies! Please enable cookies to interact with this site.
    </div>';
    include $_SERVER["DOCUMENT_ROOT"] . '/templates/body.php';
  }
?>