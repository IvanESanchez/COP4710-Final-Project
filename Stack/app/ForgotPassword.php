<?php
	// Check if input provided
	if (!empty($_POST['email'])) {
		// Load requirements
		require $_SERVER["DOCUMENT_ROOT"] . '/functions/mail.php';
		require $_SERVER["DOCUMENT_ROOT"] . '/functions/db.php';

		// Generate temporary password to use
		$temporary_password = $mysqli->real_escape_string('123abcCH@NGEMENOW');

		// Sanitize input
		$receiver = $mysqli->real_escape_string(trim($_POST['email']));

		// Check if account exists
		$query = "SELECT uid FROM USER WHERE email = " . $receiver . ";";

		try {
			$result = $mysqli->query($query);


		}
		
		$email_subject = 'Password reset for Book Store at UCF';
		$email_text_body = "If sendmail works, then Rob will receive this. If not, well...\n\n-Team 13";
		$email_html_body = "If sendmail works, then Rob will receive this. If not, well...<br><br>-Team 13";
	
		send_email($receiver, $email_subject, $email_text_body, $email_html_body);
	}
?>

<!DOCTYPE html>
<html lang = "en">

<html>

<head>
	<meta charset = "UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="author" content= "Andy Garcia and Bootstrap contributors">

	<title>Self Reset</title>

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel = "stylesheet" href = "css/create-admin.css">
</head>
<body class = "text-center">

	<main class = "form-newuser">

		<form action = "index.html" method = "get">

			<h1 class = "mb-3">Password Reset</h1>
			<h2 class = "h4 mb-4 fw-normal">Enter Account Email</h1>

			<div class="form-floating">
			  <input name="email" type="email" class="form-control" id="floatingInput"
				placeholder="name@example.com">
			  <label for="floatingInput">Email Address</label>
			</div>

			<button class = "mt-3 mb-1 w-50 btn-lg btn-primary"
			type = "submit">Reset Password</button>

			<div class = "mt-1 redirect">
				<p>Need to Create a new account?
					 <a href= "NewUser.php">click here</a>
					 <br/>Sign in<a href="index.php"> here</a>
				</p>
			</div>

		</form>

	</main>

</body>

</html>
