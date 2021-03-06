<?php
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		// Require feedback functions
		require $_SERVER["DOCUMENT_ROOT"] . '/functions/show_feedback.php';

		if (!empty($_POST['newName'])
		and !empty($_POST['newEmail'])
		and !empty($_POST['newPass'])) {
			// Save data
			$name = $_POST['newName'];
			$email = $_POST['newEmail'];
			$password = $_POST['newPass'];

			// Perform the query
			require_once $_SERVER["DOCUMENT_ROOT"] . '/functions/account_management.php';
			$uid = create_new_user($email, $password, $name, false);

			// Show result
			if ($uid == null) {
				show_error("Failed to create <code>" . $_POST['newEmail'] . "</code> account");
			} else {
				show_success("Successfully created account #<code>" . $uid . "</code> for <code>" . $_POST['newEmail'] . "</code>");

				// Redirect to login
				header('Location: login.php');
			}
		} else {
			// Handle failure
			show_error("Please fill out all fields and resubmit.");
		}
	}
?>

<!DOCTYPE html>
<html lang = "en">
<head>
	<meta charset = "UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="author" content= "Andy Garcia and Bootstrap contributors">

	<title>Create Account</title>

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel = "stylesheet" href = "css/new-user.css">

	<script src="js/new_user.js"></script>
</head>
<body class = "text-center">

	<main class = "form-newuser">

		<form action = "NewUser.php" method ="post">

			<h1 class = "mt-2 mb-4">Create an account</h1>

			<div class = "logo">
				<img class = "mb-3" src = "UCF.jpg" alt="" width = "300" height "57">
			</div>

			<div class = "mb-2 form-floating">
				<input type="text" class="form-control" name="newName" id="newname"	placeholder="Name" required>
		  	<label for="newname">Name</label>
			</div>

			<div class="mb-2 form-floating">
			  <input type="email" class="form-control" name="newEmail" id="newemail" placeholder="name@example.com" required>
			  <label for="newemail">Email Address</label>
			</div>

			<div class = "mb-2 form-floating">
				<input type = "password" class="form-control" name="newPass" id="newpass" placeholder="Password" required>
				<label for="newpass">Password</label>
			</div>

			<input type="submit" class = "mt-2 mb-3 w-50 btn-lg btn-primary" value="Create account">

			<div class = "Active-account">
				<p>Have an account? <a href="login.php"> Log in</a></p>
			</div>

		</form>
</main>

</body>

</html>
