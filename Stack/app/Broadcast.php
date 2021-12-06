<?php
  // Check if date submitted
  if (isset($_POST['date'])) {
    // Save the date
    $date = $_POST['date'];

    // Get util lib
    require_once $_SERVER["DOCUMENT_ROOT"] . '/functions/get_utils.php';

    /**
     * Helper function to send an email to a particular professor with a particular reminder date
     */
    function send_prof_email($professor, $date) {
      // Get function to help create url
      require_once $_SERVER["DOCUMENT_ROOT"] . '/functions/query_param_utils.php';

      // Combine professor email with login.php to get URL
      $url = username_param_url("http://localhost:8080/login.php", $professor);

      // Compose email
      $email_subject = "Reminder to submit your book request for the Book Store at UCF by " . $date;
      $email_text_body = "Submit your book list before " . $date . "\n" . $url;
      $email_html_body = '<p>Submit your book list before ' . $date . '<br><a href="' . $url . '">Click here to login to your book request portal</a>';

      // Required to show feedback
      require_once $_SERVER["DOCUMENT_ROOT"] . '/functions/show_feedback.php';

      // Required for email
      require_once $_SERVER["DOCUMENT_ROOT"] . '/functions/mail.php';

      // Send the email
      if (send_mail($professor, $email_subject, $email_text_body, $email_html_body)) {
        show_success("Successfully sent email to <code>" . $professor . "</code>");
      } else {
        show_error("Failed to send email to <code>" . $professor . "</code>. Please verify the professor's stored email address exists and then retry.");
      }
    }

    // Get array of professor emails
    $professors = get_professors_emails();

    // Loop through professor emails
    foreach($professors as $professor) {
      send_prof_email($professor, $date);
    }
  }
?>

<!DOCTYPE html>
<html lang = "en">
<html>

<head>
  <meta charset = "UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="author" content= "Andy Garcia and Bootstrap contributors">

  <title>BookStore Menu</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel = "stylesheet" href = "css/base.css">
	<link rel = "stylesheet" href = "css/navbar.css">
  <link rel = "stylesheet" href = "css/send-email.css">

</head>
<body>

  <div class="wrapper">

		<?php
			include $_SERVER["DOCUMENT_ROOT"] . '/templates/adminbar.php';
		?>

    <main class = "invite-form">

      <form action ="Broadcast.php" method="post">
				<div class="header h3 mt-3 mb-4">Send Reminder Brodcast</div>

	      <div class="main-text">Enter Deadline Date</div>

          <div class="form-floating">
    			  <input name="date" type="date" class="form-control" id="date"
    				placeholder="Date">
    			  <label for="date">Date</label>
    			</div>

          <input type="submit" class = "mt-3 mb-1 w-50 btn-lg btn-primary" value="Send">


    </main>

      <!--If the user is a worker and not a professor use this text.-->



   </div>




</body>
