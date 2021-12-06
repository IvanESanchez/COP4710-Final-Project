<!DOCTYPE html>
<html lang = "en">

<html>

<head>
	<meta charset = "UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="author" content= "Andy Garcia and Bootstrap contributors">

	<title>Create Account</title>

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel = "stylesheet" href = "css/create-admin.css">
	<link rel = "stylesheet" href = "css/base.css">
  <link rel = "stylesheet" href = "css/navbar.css">
	<link rel = "stylesheet" href = "css/wrapper.css">
</head>
<body class = "text-center">

	<div class="wrapper">

	<?php
		include $_SERVER["DOCUMENT_ROOT"] . '/templates/adminbar.php';
	?>


	<main class = "form-newuser">


		<form action = "index.html" method ="get">

			<h1 class = "mb-4">Create an Admin account</h1>

			<div class = "logo">
				<img class = "mb-3" src = "UCF.jpg" alt="" width = "300" height "57">
			</div>

			<div class = "mb-2 form-floating">
				<input type="text" class="form-control" id="floatingInput"
				placeholder="Name">
		  	<label for="floatingInput">Name</label>
			</div>

			<div class="mb-2 form-floating">
			  <input type="email" class="form-control" id="floatingInput"
				placeholder="name@example.com">
			  <label for="floatingInput">Email Address</label>
			</div>

			<div class = "mb-2 form-floating">
				<input type = "password" class="form-control" id="floatingInput"
				placeholder="Password">
				<label for="floatingInput">Password</label>
			</div>

			<div class = "mb-2 form-floating">
				<input type = "checkbox"> Check to confirm admin status<br/>
			</div>

			<button class = "mt-3 mb-1 w-50 btn-lg btn-primary"
			type = "submit">Create account</button>

			<div class = "Active-account">
				<p>Have an account? <a href="index.html"> Log in</a></p>
			</div>

		</form>

	<main>
	</div>
</body>

</html>
