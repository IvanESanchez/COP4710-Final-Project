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

      <form action ="SendEmail.html" method="get">
				<div class="header h3 mt-3 mb-4">Send Invitation Email</div>

	      <div class="main-text">Recipient's email address</div>

          <div class="form-floating">
    			  <input type="email" class="form-control" id="floatingInput"
    				placeholder="name@example.com">
    			  <label for="floatingInput">Email Address</label>
    			</div>

          <button class = "mt-3 mb-1 w-50 btn-lg btn-primary"
    			type = "submit">Send</button>
      </form>

			<form action ="SendEmail.html" method="get">
				<div class="header h3 mt-3 mb-3">Send Reminder Email</div>

	      <div class="main-text">Recipient's email address</div>

          <div class="form-floating">
    			  <input type="email" class="form-control" id="floatingInput"
    				placeholder="name@example.com">
    			  <label for="floatingInput">Email Address</label>
    			</div>

          <button class = "mt-2 mb-1 w-50 btn-lg btn-primary"
    			type = "submit">Send</button>
      </form>

    </main>

      <!--If the user is a worker and not a professor use this text.-->



   </div>




</body>




</html>
