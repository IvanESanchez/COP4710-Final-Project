<?php
	// Load session
	require $_SERVER["DOCUMENT_ROOT"] . '/functions/no_cookies.php';

	function new_name() {

	}

	function new_password() {

	}

	function new_email() {
		
	}

	// Figure out which form was submitted
	if (isset($_POST['new-name'])) {

	} else if (isset($_POST['new-password'])) {

	} else if (isset($_POST['new-email'])) {

	}
?>

<!DOCTYPE html>
<html lang = "en">

<html>

<head>
	<meta charset = "UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="author" content= "Andy Garcia and Bootstrap contributors">

	<title>Account Manager</title>

	<!-- Links to the style sheets we need to make items appealing -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel = "stylesheet" href = "css/navbar.css">
	<link rel = "stylesheet" href = "css/base.css">
	<link rel = "stylesheet" href = "css/wrapper.css">
	<link rel = "stylesheet" href = "css/manage-account.css">

<style>
	.Center-section .header {
		margin-left: 38%;
		padding-top: 35px;
		font-size: 30px;
}
</style>

</head>
<body>

	<?php
		include $_SERVER["DOCUMENT_ROOT"] . '/templates/adminbar.php';
	?>

    <div class="Center-section">
      <div class="header h3 mt-3 mb-4">Account Manager</div>

			<!-- Center text allows users to change Username/Password -->

			<form action ="AdminManage.php" method="post">
				<div class="mb-2 h3"> Update Name (optional)</div>
				<div class = "mb-2 form-floating">
					<input name="old-name" type="text" class="form-control" id="old-name"
					placeholder="Old Username" required>
			  	<label for="old-name">Old Name</label>
				</div>

				<div class = "mb-2 form-floating">
					<input name="new-name" type="text" class="form-control" id="new-name"
					placeholder="New username" required>
			  	<label for="new-name">New Name</label>
				</div>
				<input type="submit" class = "mt-3 mb-3 w-50 btn-lg btn-primary" value="Submit New Name">
			</form>

			<form action="AdminManage.php" method="post">
				<div class="mt-3 h3"> Update Password (optional)</div>
				<div class = "mb-2 form-floating">
					<input name="old-password" type = "password" class="form-control" id="old-password"
					placeholder="Old Password" required>
					<label for="old-password">Old Password</label>
				</div>

				<div class = "mb-2 form-floating">
					<input name="new-password" type = "password" class="form-control" id="new-password"
					placeholder="New Password" required>
					<label for="new-password">New Password</label>
				</div>

				<div class = "mb-2 form-floating">
					<input name="confirm-password" type = "password" class="form-control" id="confirm-password"
					placeholder="Confirmation Password" required>
					<label for="confirm-password">Confirm New Password</label>
				</div>

				<input type="submit" class = "mt-3 mb-3 w-50 btn-lg btn-primary" value="Submit New Password">
			</form>

			<form action="AdminManage.php" method="post">
				<div class="mt-2 mb-2 h3"> Update Email (optional)</div>
				<div class = "mb-2 form-floating">
					<input name="old-email" type="text" class="form-control" id="old-email"
					placeholder="Old Username" required>
			  	<label for="old-email">Old Email</label>
				</div>


				<div class = "mb-2 form-floating">
					<input name="new-email" type="text" class="form-control" id="new-email"
					placeholder="Old Username" required>
			  	<label for="new-email">New Email</label>
				</div>

				<input type="submit" class = "mt-3 mb-3 w-50 btn-lg btn-primary" value="Submit New Email">
			</form>


   </div>

</body>


</html>
