<?php 
    ini_set( 'display_errors', 1 );
    error_reporting( E_ALL );
    $email_password = file_get_contents('/run/secrets/email-password');
    $from = "rschwyzer@knights.ucf.edu";
    $to = "rschwyzer@knights.ucf.edu";
    $subject = "COP 4710 Team 13 Final Project";
    $message = "If sendmail works, then Rob will receive this. If not, well...\n\n-Team 13";
    $headers = "From:" . $from;
    mail($to,$subject,$message, $headers);
    echo "Test email sent";
?>