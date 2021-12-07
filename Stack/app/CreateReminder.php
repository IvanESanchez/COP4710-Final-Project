<?php
	if (isset($_POST['reminder-date'])) {
		// Set variables
		$reminder_date = $_POST['reminder-date'];

		// Create the reminder
		require_once $_SERVER["DOCUMENT_ROOT"] . '/functions/account_management.php';
		$id = create_new_reminder($reminder_date);

		// Show result
		require_once $_SERVER["DOCUMENT_ROOT"] . '/functions/show_feedback.php';
		if ($id == null) {
			show_error("Failed to create new reminder");
		} else {
			show_success("Successfully created reminder #<code>" . $id . "</code>");
		}
	}
?>

<!DOCTYPE html>
<html lang = "en">

<head>
  <meta charset = "UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="author" content= "Andy Garcia and Bootstrap contributors">

  <title>BookStore Menu</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel = "stylesheet" href = "css/base.css">
  <link rel = "stylesheet" href = "css/navbar.css">
  <link rel = "stylesheet" href = "css/wrapper.css">

	<style>
		.wrapper .Center-section .main-text .btn-primary{
			margin-left: 3%;
			width: 500px;
		}

		.wrapper .Center-section .h3{
			margin-left: 39%;
		}

		form{
			width:525px;
		}

		.form-floating{
			margin-left: 5%;
		}

		.wrapper .Center-section .main-text{
			margin-left: 30%;
		}
	</style>


</head>
<body>

  <div class="wrapper">
		<?php
			include $_SERVER["DOCUMENT_ROOT"] . '/templates/adminbar.php';
		?>

    <div class="Center-section">
      <div class="header h3 mt-3 mb-4">Add Reminder</div>

      <div class="main-text">
				<form action="CreateReminder.php" method="post">

					<div class="main-text">Enter Reminder Date</div>

					<div class="form-floating">
						<input name="reminder-date" type="date" class="form-control" id="reminder-date" placeholder="Date" required>
						<label for="reminder-date">Reminder Date</label>
					</div>

					<div class="mt-2 btn">
						<input type="button" class = "mb-1 btn-lg btn-primary" value ="Submit Reminder">
					</div>
				</form>
      </div>
		</div>
   </div>
</body>
</html>
