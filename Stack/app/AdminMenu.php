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
  <link rel = "stylesheet" href = "css/admin.css">
	<style>
		.btn
		{
			color: black;
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

      <div class="main-text"> Admin Panel.<br/>
				<a href="SendEmail.html">
					<button class="btn btn-primary btn-lg">
						<img src="envelope.svg" alt="invitaion-email" width="15"> Email Options
					</img></button>
				</a>
				<br/>All actions can be executed by pressing the buttons on the left.
      </div>

      <!--If the user is a worker and not a professor use this text.-->

      <!-- The pegasus will be edited in photoshop to match the background-->
      <div class="pegasus-img mt-3">
        <img src="pegasus.png" alt ="ucf-logo" width="200">
      <div>

   </div>




</body>




</html>
