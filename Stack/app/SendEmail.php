<?php
	// Load requirements
	require_once $_SERVER["DOCUMENT_ROOT"] . '/functions/email_exists.php';
	require_once $_SERVER["DOCUMENT_ROOT"] . '/functions/mail.php';
	require_once $_SERVER["DOCUMENT_ROOT"] . '/functions/show_feedback.php';
	require_once $_SERVER["DOCUMENT_ROOT"] . '/functions/query_param_utils.php';

	/**
	 * Wrapper for send_email which performs standardized handling of email success/failure for this page
	 */
	function send_the_email($email, $email_subject, $email_text_body, $email_html_body) {
		// Send email and handle error/result
		if (send_email($email, $email_subject, $email_text_body, $email_html_body)) {
			show_success("Successfully sent email to <code>" . $email . "</code>");
		} else {
			show_error("Failed to send email to <code>" . $email . "</code>. Please verify address is entered correctly and then retry.");
		}
	}

	// Send invitation to professor
	function send_invitation($email) {
		// If email exists, send user a link to the login page with their username prefilled
		if (email_exists($email)) {
			// Set url target
			$url = username_param_url("http://localhost:8080/login.php", $email);

			// Compose email
			$email_subject = "Invitation to submit your book request for the Book Store at UCF";
			$email_text_body = $url;
			$email_html_body = '<a href="' . $url . '">Click here to login to your book request portal</a>';

			// Send email and handle error/result
			send_the_email($email, $email_subject, $email_text_body, $email_html_body);
		} else {
			// User does not exist, so send them a link to create a new account
			// Set url target
			$url = username_param_url("http://localhost:8080/newuser.php", $email);

			// Compose email
			$email_subject = "Invitation to submit your book request for the Book Store at UCF";
			$email_text_body = "Create a new account so you can create and send your book request:\n" . $url;
			$email_html_body = '<a href="' . $url . '">Create a new account</a> so you can create and send your book request.';

			// Send email and handle error/result
			send_the_email($email, $email_subject, $email_text_body, $email_html_body);
		}
	}

	// Send reminder to professor
	function send_reminder($email) {
		// Check if we received a date
		if (isset($_POST['reminder_date'])) {
			$reminder_date = date('Y-m-d', strtotime($_POST['reminder_date']));

			// If email exists, send a reminder
			if (email_exists($email)) {
				// Set url target
				$url = username_param_url("http://localhost:8080/login.php", $email);
				
				// Compose email
				$email_subject = "Reminder to submit your book request for the Book Store at UCF by " . $reminder_date;
				$email_text_body = "Submit your book list before " . $reminder_date . "\n" . $url;
				$email_html_body = '<p>Submit your book list before ' . $reminder_date . '<br><a href="' . $url . '">Click here to login to your book request portal</a>';

				// Send email and handle error/result
				send_the_email($email, $email_subject, $email_text_body, $email_html_body);
			} else {
				// User does not exist, so send them a link to create a new account
				// Set url target
				$url = username_param_url("http://localhost:8080/newuser.php", $email);

				// Compose email
				$email_subject = "Reminder to submit your book request for the Book Store at UCF by " . $reminder_date;
				$email_text_body = "Create a new account so you can create and send your book request before " . $reminder_date . ":\n" . $url;
				$email_html_body = '<p>Submit your book list before ' . $reminder_date . '<br><a href="' . $url . '">Create a new account</a> so you can create and send your book request.';
	
				// Send email and handle error/result
				send_the_email($email, $email_subject, $email_text_body, $email_html_body);
			}
		} else {
			// Handle not receiving a date
			show_error("No date supplied.");
		}
	}

	// Figure out what kind of input we got, if any
	if (isset($_POST['invite_email'])) {
		// Got invitation email submission
		send_invitation($_POST['invite_email']);
	} else if (isset($_POST['reminder_email'])) {
		// Got reminder email submission
		send_reminder($_POST['reminder_email']);
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
			include('templates/adminbar.php');
		?>

    <main class = "invite-form">

      <form action ="SendEmail.php" method="post">
				<div class="header h3 mt-3 mb-4">Send Invitation Email</div>

	      <div class="main-text">Recipient's email address</div>

          <div class="form-floating">
    			  <input name="invite_email" type="email" class="form-control" id="invite_email"
    				placeholder="name@example.com" required>
    			  <label for="invite_email">Email Address</label>
    			</div>

          <input type="submit" class = "mt-3 mb-1 w-50 btn-lg btn-primary" value="Send">
      </form>

			<form action ="SendEmail.php" method="post">
				<div class="header h3 mt-3 mb-3">Send Reminder Email</div>

				<div class="main-text">
					<label for="reminder_date" class="form-label">Book request form due date</label><br>
					<input type="date" name="reminder_date" id="reminder_date" placeholder="2022-01-07" required>
				</div>

	      <div class="main-text">Recipient's email address</div>
				<div class="form-floating">
					<input name="reminder_email" type="email" class="form-control" id="reminder_email"
					placeholder="name@example.com" required>
					<label for="reminder_email">Email Address</label>
				</div>

				<input type="submit" class = "mt-2 mb-1 w-50 btn-lg btn-primary" value="Send">
      </form>
    </main>
   </div>
</body>
</html>
