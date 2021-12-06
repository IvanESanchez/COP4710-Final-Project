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

			<form action ="ManageAccount.html" method="post">
				<div class="mb-2 h3"> Update Name (optional)</div>
				<div class = "mb-2 form-floating">
					<input type="text" class="form-control" id="floatingInput"
					placeholder="Old Username">
			  	<label for="floatingInput">Old Name</label>
				</div>

				<div class = "mb-2 form-floating">
					<input type="text" class="form-control" id="floatingInput"
					placeholder="New username">
			  	<label for="floatingInput">New Name</label>

				</div>
				<button class = "mt-3 mb-3 w-50 btn-lg btn-primary"
				type = "submit">Submit New Name</button>
			</form>

			<form action="ManageAccount.html" method="post">
				<div class="mt-3 h3"> Update Password (optional)</div>
				<div class = "mb-2 form-floating">
					<input type = "password" class="form-control" id="floatingInput"
					placeholder="Old Password">
					<label for="floatingInput">Old Password</label>
				</div>

				<div class = "mb-2 form-floating">
					<input type = "password" class="form-control" id="floatingInput"
					placeholder="New Password">
					<label for="floatingInput">New Password</label>
				</div>

				<div class = "mb-2 form-floating">
					<input type = "password" class="form-control" id="floatingInput"
					placeholder="Confirmation Password">
					<label for="floatingInput">Confirm New Password</label>
				</div>

				<button class = "mt-3 mb-3 w-50 btn-lg btn-primary"
				type = "submit">Submit New Password</button>
			</form>

			<form action="ManageAccount.html" method="post">
				<div class="mt-2 mb-2 h3"> Update Email (optional)</div>
				<div class = "mb-2 form-floating">
					<input type="text" class="form-control" id="floatingInput"
					placeholder="Old Username">
			  	<label for="floatingInput">Old Email</label>
				</div>


				<div class = "mb-2 form-floating">
					<input type="text" class="form-control" id="floatingInput"
					placeholder="Old Username">
			  	<label for="floatingInput">New Email</label>
				</div>

				<button class = "mt-3 mb-3 w-50 btn-lg btn-primary"
				type = "submit">Submit New Email</button>
			</form>


   </div>

</body>


</html>
