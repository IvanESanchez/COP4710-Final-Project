<?php

?>

<!DOCTYPE html>
<html lang = "en">
<html>

<head>
  <meta charset = "UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="author" content= "Andy Garcia and Bootstrap contributors">

  <title>BookStore Menu</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel = "stylesheet" href = "css/base.css">
	<link rel = "stylesheet" href = "css/navbar.css">
  <link rel = "stylesheet" href = "css/send-email.css">

</head>
<body>

  <div class="wrapper">

		<?php
			include('templates/adminbar.php');
		?>

    <main class = "invite-form">

      <form action ="Broadcast.php" method="post">
				<div class="header h3 mt-3 mb-4">Send Reminder Brodcast</div>

	      <div class="main-text">Enter Deadline Date</div>

          <div class="form-floating">
    			  <input name="date" type="date" class="form-control" id="date"
    				placeholder="Date">
    			  <label for="date">Date</label>
    			</div>

          <input type="submit" class = "mt-3 mb-1 w-50 btn-lg btn-primary" value="Send">


    </main>

      <!--If the user is a worker and not a professor use this text.-->



   </div>




</body>
