<?php
	// Check if input provided
	if (!empty($_POST['email'])) {
		// Load requirements
		require $_SERVER["DOCUMENT_ROOT"] . '/functions/mail.php';
		require $_SERVER["DOCUMENT_ROOT"] . '/functions/db.php';
		require $_SERVER["DOCUMENT_ROOT"] . '/functions/show_feedback.php';

		// Generate temporary password to use
		$temporary_password = $mysqli->real_escape_string('123abcCH@NGEMENOW');

		// Sanitize input
		$receiver = $mysqli->real_escape_string(trim($_POST['email']));

		// Check if account exists
		$query = "SELECT uid FROM USER WHERE email = '" . $receiver . "';";

		try {
			// Run query
			$result = $mysqli->query($query);

			// Check if any results found
			if ($result->num_rows > 0) {
				// Get uid of first result
				$row = $result->fetch_assoc();
				$uid = $row["uid"];

				// Update password for uid
				$query = "UPDATE USER SET password = '" . $temporary_password . "' WHERE uid = " . $uid . ";";
				$mysqli->query($query);

				// Email new password
				$email_subject = "Password reset for Book Store at UCF";
				$email_text_body = "Your new password is: " . $temporary_password;
				$email_html_body = "Your new password is: <code>" . $temporary_password . "</code>";
				if (send_email($receiver, $email_subject, $email_text_body, $email_html_body)) {
					// If email sends successfully, redirect to login page
					header('Location: login.php');
				} else {
					// If email doesn't send successfully show error
					show_error("Failed to send email to <code>" . $receiver . "</code>");
				}
			} else {
				// Redirect silently; do not want to let an attacker know the account doesn't exist
				header('Location: login.php');
			}
		} catch (mysqli_sql_exception $e) {
			show_error($mysqli->error);
		} finally {
			$mysqli->close();
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

	<title>Self Reset</title>

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel = "stylesheet" href = "css/create-admin.css">
</head>
<body class = "text-center">

	<main class = "form-newuser">

		<form action = "ForgotPassword.php" method = "post">

			<h1 class = "mb-3">Password Reset</h1>
			<h2 class = "h4 mb-4 fw-normal">Enter Account Email</h1>

			<div class="form-floating">
			  <input name="email" type="email" class="form-control" id="floatingInput"
				placeholder="name@example.com">
			  <label for="floatingInput">Email Address</label>
			</div>
			
			<input type = "submit" class = "mt-3 mb-1 w-50 btn-lg btn-primary" value="Reset Password">

			<div class = "mt-1 redirect">
				<p>Need to Create a new account?
					 <a href= "NewUser.php">click here</a>
					 <br/>Sign in<a href="login.php"> here</a>
				</p>
			</div>

		</form>

	</main>

</body>

</html>
