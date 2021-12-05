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
  <link rel = "stylesheet" href = "css/send-email.css">

</head>
<body>

  <div class="wrapper">

		<?php
			include('templates/adminbar.php');
		?>

    <main class = "invite-form">

      <form action ="Brodcast.php" method="post">
				<div class="header h3 mt-3 mb-4">Send Reminder Brodcast</div>

	      <div class="main-text">Enter Deadline Date</div>

          <div class="form-floating">
    			  <input type="date" class="form-control" id="floatingInput"
    				placeholder="Date">
    			  <label for="floatingInput">Date</label>
    			</div>

          <button class = "mt-3 mb-1 w-50 btn-lg btn-primary"
    			type = "submit">Send</button>


    </main>

      <!--If the user is a worker and not a professor use this text.-->



   </div>




</body>
