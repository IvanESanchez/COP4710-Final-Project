<?php
  require $_SERVER["DOCUMENT_ROOT"] . '/functions/mail.php';

  $receiver = 'weposi1177@nefacility.com';
  $email_subject = 'COP 4710 Team 13 Final Project';
  $email_text_body = "If sendmail works, then Rob will receive this. If not, well...\n\n-Team 13";
  $email_html_body = "If sendmail works, then Rob will receive this. If not, well...<br><br>-Team 13";

  send_email($receiver, $email_subject, $email_text_body, $email_html_body);
?>