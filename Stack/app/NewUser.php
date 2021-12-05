<!DOCTYPE html>
<html lang = "en">

<html>

<head>
	<meta charset = "UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="author" content= "Andy Garcia and Bootstrap contributors">

	<title>Create Account</title>

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel = "stylesheet" href = "css/new-user.css">
</head>
<body class = "text-center">

	<main class = "form-newuser">

		<form action = "<?php echo $_SERVER['PHP_SELF'];?>" method ="post">

			<h1 class = "mt-2 mb-4">Create an account</h1>

			<div class = "logo">
				<img class = "mb-3" src = "UCF.jpg" alt="" width = "300" height "57">
			</div>

			<div class = "mb-2 form-floating">
				<input type="text" class="form-control" name="newName" id="floatingInput"
				placeholder="Name">
		  	<label for="floatingInput">Name</label>
			</div>

			<div class="mb-2 form-floating">
			  <input type="email" class="form-control" name="newEmail" id="floatingInput"
				placeholder="name@example.com">
			  <label for="floatingInput">Email Address</label>
			</div>

			<div class = "mb-2 form-floating">
				<input type = "password" class="form-control" name="newPass" id="floatingInput"
				placeholder="Password">
				<label for="floatingInput">Password</label>
			</div>

			<button class = "mt-2 mb-3 w-50 btn-lg btn-primary"
			type = "submit">Create account</button>

			<div class = "Active-account">
				<p>Have an account? <a href="index.html"> Log in</a></p>
			</div>

		</form>

		<?php
			if ($_SERVER["REQUEST_METHOD"] == "POST") {
				if (!empty($_POST['newName'])
				and !empty($_POST['newEmail'])
				and !empty($_POST['newPass'])) {
					$name = filter_var(trim($_POST['newName']), FILTER_SANITIZE_STRING);
					$email = filter_var(trim($_POST['newEmail']), FILTER_SANITIZE_EMAIL);
					$pass = filter_var(trim($_POST['newPass']), FILTER_SANITIZE_STRING);

					require 'functions/db.php';

					// Perform INSERT
					$mysqli->query("INSERT INTO user (
						name,
						email,
						password,
						admin
					) VALUES (
						'$name',
						'$email',
						'$pass',
						FALSE
					);");

					$mysqli->close();

					header('Location: login.php');
					exit;
				}
			}
		?>

	<main>

</body>

</html>
