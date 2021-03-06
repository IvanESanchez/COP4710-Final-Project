<!DOCTYPE html>
<html lang = "en">
<html>

<head>
  <meta charset = "UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="author" content= "Andy Garcia and Bootstrap contributors">

  <title>BookStore Home</title>

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <link rel = "stylesheet" href = "css/navbar.css">
  <link rel = "stylesheet" href = "css/base.css">
  <link rel = "stylesheet" href = "css/main-menu.css">
</head>
<body>

	<!-- The following code is used for the side bar menu options -->
  <div class="wrapper">
	<?php
		require_once $_SERVER["DOCUMENT_ROOT"] . '/functions/admin_guard.php';
		if (am_i_admin()) {
			include $_SERVER["DOCUMENT_ROOT"] . '/templates/adminbar.php';
		} else {
			include $_SERVER["DOCUMENT_ROOT"] . '/templates/navbar.php';
		}
	?>

    <div class="Center-section">
      <div class="header h3 mt-3 mb-4">Welcome to the UCF BookStore</div>

			<!-- Center text that shows the person logining in what they must do -->
      <div class="main-text"> The following actions should be performed by a professor.
        <br/><a href="BookForm.php" ><button type="button"  class="btn btn-secondary">Submit a new book request form</button></a>
        <a href="ViewForm.php" ><button type="button"  class="btn btn-secondary">View/Edit book list request forms</button></a>
        <br/>All actions can be executed by pressing the buttons on the left as well.
      </div>

      <!--If the user is a worker and not a professor use this text.-->

      <!-- The pegasus will be edited in photoshop to match the background-->
      <div class="pegasus-img mt-3">
        <img src="pegasus.png" alt ="ucf-logo" width="200">
      <div>

   </div>


</body>


</html>
