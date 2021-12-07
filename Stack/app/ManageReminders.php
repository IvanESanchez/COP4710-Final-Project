<?php
	if(isset($_GET['operation']) and isset($_GET['id'])) {
		require_once $_SERVER["DOCUMENT_ROOT"] . '/functions/show_feedback.php';

		// Check if operation succeeded or not and output result
		if ($_GET['result'] == 'success') {
			show_success("Successful " . $_GET['operation'] . " of reminder ID " . $_GET['id']);
		} else {
			show_error("Failed to " . $_GET['operation'] . " reminder ID " . $_GET['id']);
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

		.wrapper .Center-section .main-text{
			padding-bottom: 100px;
		}

		.wrapper .Center-section .table{
			margin-left: 22%;
			width:50%;
		}


	</style>


</head>
<body>

  <div class="wrapper">
		<?php
			include $_SERVER["DOCUMENT_ROOT"] . '/templates/adminbar.php';
		?>

    <div class="Center-section">
      <div class="header h3 mt-3 mb-4">Manage Reminders</div>

      <div class="main-text">
					<div class="mt-2 btn">
							<a href="CreateReminder.php"><button class = "mb-1 btn-lg btn-primary"
							type = "submit"> Create New Reminder
						  </button></a>
					</div>
      </div>

			<table class="mt-4 table table-striped">
				<thead class="table-dark">
					<tr align="center">
						<th>ID</th>
						<th>Date</th>
						<th>Delete</th>
					</tr>
				</thead>
				<tbody class="align-middle">
					<?php
						/**
						 * Need to retrieve existing reminders
						 */
						require_once $_SERVER["DOCUMENT_ROOT"] . '/functions/get_utils.php';
						require_once $_SERVER["DOCUMENT_ROOT"] . '/functions/query_param_utils.php';

						// Get all reminders
						$reminders = get_all_reminders();

						// Output reminders to table
						foreach($reminders as $reminder) {
							// Get URLs for buttons
							$delete_url = uid_param_url("http://localhost:8080/DeleteReminder.php", $reminder["id"]);

							// Output table content
							echo '<tr><td>' . $reminder['id'] .
							'</td><td>' . $reminder['date'] . 
							'</td><td class="text-center"><a href="' . $delete_url . '">
							<button type="button" class="btn btn-danger mx-auto">Delete</button>
							</a></td>';
						}
					?>
				</tbody>
			</table>

		</div>

   </div>

</body>




</html>
