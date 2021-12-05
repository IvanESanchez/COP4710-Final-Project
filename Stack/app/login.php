<?php
  if (!empty($_POST['username']) and !empty($_POST['password'])) {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    // Need to check database


    // Assuming that comes back okay...
    require "functions/no_cookies.php";
    $_SESSION['username'] = $username;
    $_SESSION['password'] = $password;
    session_write_close();
    header('Location: index.php');
  }
?>

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
		<form action = "MainMenu.html" method="post">

			<h1 class = "mb-2">Book Store At</h1>

			<div class = "logo">
				<img class = "mb-3" src = "UCF.jpg" alt="" width = "300">
			</div>

			<h1 class = "h3 mb-3 fw-normal">User Login</h1>

			<div class="form-floating mb-3">
		  	<input type="text" class="form-control" id="floatingInput"
				placeholder="Username">
		  	<label for="floatingInput">Name</label>
			</div>

			<div class="form-floating mb-3">
		  	<input type="password" class="form-control" id="floatingPassword"
				 placeholder="Password">
		  	<label for="floatingPassword">Password</label>
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

	</main>

</body>

</html>
