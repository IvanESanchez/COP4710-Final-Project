<?php
	// Check if form was submitted
	if (isset($_POST['email']) and isset($_POST['name']) and isset($_POST['password'])) {
		// Set variables
		$email = $_POST['email'];
		$name = $_POST['name'];
		$password = $_POST['password'];

		// Set admin based on checkbox
		if (isset($_POST['admin'])) {
			$admin = true;
		} else {
			$admin = false;
		}

		// Create the account
		require_once $_SERVER["DOCUMENT_ROOT"] . '/functions/account_management.php';
		$uid = create_new_user($email, $password, $name, $admin);

		// Show result
		require_once $_SERVER["DOCUMENT_ROOT"] . '/functions/show_feedback.php';
		if ($uid == null) {
			show_error("Failed to create <code>" . $email . "</code> account");
		} else {
			show_success("Successfully created account #<code>" . $uid . "</code> for <code>" . $email . "</code>");
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
	<link rel = "stylesheet" href = "css/base.css">
  <link rel = "stylesheet" href = "css/navbar.css">
	<link rel = "stylesheet" href = "css/wrapper.css">

	<style>
	form{
	  width: 100%;
	  margin: auto;
	  max-width: 550px;
	  padding: 15px;
	  background: #EEEEEE;
	  border-radius: 100px;
	}

	.form-floating {
	  max-width: 330px;

	}

	.btn {
	  padding: 100px;
	}
	</style>
</head>
<body>

	<div class="wrapper">

	<?php
		include $_SERVER["DOCUMENT_ROOT"] . '/templates/adminbar.php';
	?>
		<div class="Center-section">
			<form action = "CreateAdmin.php" method ="post">

				<h1 class = " mt-3 mb-4">Create an Admin account</h1>

				<div class = "mb-2 form-floating">
					<input name="name" type="text" class="form-control" id="name"	placeholder="Name" required>
			  	<label for="name">Name</label>
				</div>

				<div class="mb-2 form-floating">
				  <input name="email" type="email" class="form-control" id="email" placeholder="name@example.com" required>
				  <label for="email">Email Address</label>
				</div>

				<div class = "mb-2 form-floating">
					<input name="password" type = "password" class="form-control" id="password"	placeholder="Password" required>
					<label for="password">Password</label>
				</div>

				<div class = "form-check">
					<input name="admin" id="admin" class="form-check-input" type = "checkbox">
					<label class="form-check-label" for="admin">Check to confirm admin status</label>
				</div>

				<input type="submit" class = "mt-3 mb-1 w-50 btn-lg btn-primary" value="Create account">

		</form>
	 </div>
	</div>
</body>

</html>
