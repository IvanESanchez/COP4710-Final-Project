<?php
	// Require functions to give feedback
	require 'functions/show_feedback.php';

	// Check if input has been given; process if it has
  if (!empty($_POST['username']) and !empty($_POST['password'])) {
    // Need to check database
		require 'functions/db.php';

		// Sanitize input
		$username = $mysqli->real_escape_string(trim($_POST['username']));
    $password = $mysqli->real_escape_string(trim($_POST['password']));

		// Perform Query and store in $result
		$result = $mysqli->query("SELECT U.email, U.password, U.admin
														  FROM USER U
															WHERE U.email = '" . $username . "';");

		// Any matches?
		if ($result->num_rows > 0) {
			$row = $result->fetch_assoc();

			if ($password == $row["password"]) {
				// Successful login
				require "functions/no_cookies.php";
				$_SESSION['username'] = $username;
				$_SESSION['password'] = $password;
				$_SESSION['admin'] = $row["admin"];
				print_r($_SESSION['admin']);
				session_write_close();
				header('Location: index.php');
			} else {
				// Incorrect password
				show_error("Password given for " . $username . " is incorrect.");
			}
		} else {
			// Handle user not found
			show_error("User " . $username . " not found.");
		}
		$mysqli->close();
  }
?>

<!DOCTYPE html>
<html lang = "en">
<head>

	<meta charset = "UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="author" content= "Andy Garcia and Bootstrap contributors">

	<title>Book Store</title>

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

	<!-- Style sheet to make the ux simple -->
	<link rel = "stylesheet" href = "css/login.css">

</head>
<body class = "text-center">

	<main class = "form-signin">
		<!-- This is the sign in form that contain user information -->
		<form action = "login.php" method="post">

			<h1 class = "mb-2">Book Store At</h1>

			<div class = "logo">
				<img class = "mb-3" src = "UCF.jpg" alt="" width = "300">
			</div>

			<h1 class = "h3 mb-3 fw-normal">User Login</h1>

			<div class="form-floating mb-3">
		  	<input name="username" type="text" class="form-control" id="floatingInput"
				placeholder="Username">
		  	<label for="floatingInput">Email</label>
			</div>

			<div class="form-floating mb-3">
		  	<input name="password" type="password" class="form-control" id="floatingPassword"
				 placeholder="Password">
		  	<label for="floatingPassword">Password</label>
			</div>

			<div>
					<input type="submit" value="Sign In" class="mt-2 mb-2 w-50 btn-lg btn-primary">
			</div>

			<div class = "new-user">
				<a href = "NewUser.html">Create Account</a>
			</div>

			<dic class = "forgot-password">
				<a href = "ForgotPassword.html">Forgot Password?</a>
			</div>

		</form>

		<?php
			/*$name = filter_var(trim($_POST['loginName']), FILTER_SANITIZE_STRING);
			$password = filter_var(trim($_POST['loginPass']), FILTER_SANITIZE_STRING);*/
		?>

	</main>

</body>

</html>
