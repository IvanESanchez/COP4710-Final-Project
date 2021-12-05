<!DOCTYPE html>
<html lang = "en">
<head>

	<meta charset = "UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="author" content= "Andy Garcia and Bootstrap contributors">

	<title>Book Store</title>

	<link rel = "stylesheet" href =
	"https://cdn.jsdelivr.net/npm/cdbootstrap@1.0.0/css/bootstrap.min.css">

	<!-- Style sheet to make the ux simple -->
	<link rel = "stylesheet" href = "css/login.css">

</head>
<body class = "text-center">

	<main class = "form-signin">
		<!-- This is the sign in form that contain user information -->
		<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">

			<h1 class = "mb-2">Book Store At</h1>

			<div class = "logo">
				<img class = "mb-3" src = "UCF.jpg" alt="" width = "300">
			</div>

			<h1 class = "h3 mb-3 fw-normal">User Login</h1>

			<div class="form-floating mb-3">
		  	<input type="text" class="form-control" name="loginName" id="floatingInput"
				placeholder="Name">
		  	<label for="floatingInput">Name</label>
			</div>

			<div class="form-floating mb-3">
		  	<input type="password" class="form-control" name="loginPass" id="floatingInput"
				placeholder="Password">
		  	<label for="floatingInput">Password</label>
			</div>

			<div>
				<button class = "mt-2 mb-2 w-50 btn-lg btn-primary"
				type = "submit">Sign in
				</button>
			</div>

			<div class = "new-user">
				<a href = "NewUser.html">Create Account.</a>
			</div>

			<dic class = "forgot-password">
				<a href = "ForgotPassword.html">Forgot Password?</a>
			</div>

		</form>

		<?php

			if (!empty($_POST['loginName']) and !empty($_POST['loginPass'])) {

		    	$name = filter_var(trim($_POST['loginName']), FILTER_SANITIZE_STRING);
		    	$password = filter_var(trim($_POST['loginPass']), FILTER_SANITIZE_STRING);

			    // Need to check database
				require 'functions/db.php';

				// Perform Query and store in $result
				$result = $mysqli->query('SELECT * FROM user U;');

				// Loop through results
				$valid_user = False;

				while ($row = $result->fetch_row()) {
					if ($row[1] == $name and $row[3] == $password) {
						$valid_user = True;
						$admin = $row[4];
						break;
					}
				}

				if ($valid_user == True) {
			    	// Assuming that comes back okay...
			    	require "functions/no_cookies.php";
			    	$_SESSION['name'] = $name;
			    	$_SESSION['admin'] = $admin;
			    	session_write_close();
			    	header('Location: index.php');
					exit;
				}
			}

		?>

	</main>

</body>

</html>
