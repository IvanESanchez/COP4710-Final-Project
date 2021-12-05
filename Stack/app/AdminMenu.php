<!DOCTYPE html>
<html lang = "en">
<html>

<head>
  <meta charset = "UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="author" content= "Andy Garcia and Bootstrap contributors">

  <title>BookStore Menu</title>

  <link rel = "stylesheet" href =
	"https://cdn.jsdelivr.net/npm/cdbootstrap@1.0.0/css/bootstrap.min.css">
  <link rel = "stylesheet" href = "css/base.css">
  <link rel = "stylesheet" href = "css/navbar.css">
  <link rel = "stylesheet" href = "css/wrapper.css">
  <!-- <link rel = "stylesheet" href = "css/admin.css"> -->
	<style>
		.btn
		{
			color: black;
		}

		.wrapper .Center-section .main-text
		{
			margin-left: 40%;
		}
	</style>
</head>
<body>

  <div class="wrapper">


	<?php
		include('templates/adminbar.php');
	?>

    <div class="Center-section">
      <div class="header h3 mt-3 mb-4">UCF BookStore Administrator</div>

      <div class="main-text">
				<div class =" h2 Panel">Admin Panel.</div>
				<a href="SendEmail.php">
					<button class="mt-3 btn btn-secondary btn-lg">
						<img src="envelope.svg" alt="invitaion-email" width="15"> Email Options
					</img></button></a><br/><br/>

					<a href="Brodcast.php">

					<button class="mt-3 btn btn-secondary btn-lg">
						<img src="envelope.svg" alt="invitaion-email" width="15"> Brodcast Email
					</img></button>
					</a>

      </div>


		</div>
   </div>

</body>




</html>
