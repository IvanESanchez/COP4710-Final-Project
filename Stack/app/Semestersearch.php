<?php

	require 'functions/no_cookies.php';

	if (!isset($_SESSION['uid'])) {
		header('Location: login.php');
	} else {
		$uid = intval($_SESSION['uid']);
	}

?>

<?php

	if (isset($_GET['operation']) and isset($_GET['brid'])) {
		require_once $_SERVER["DOCUMENT_ROOT"] . '/functions/show_feedback.php';

		// Check if operation was successful and output result
		if ($_GET['result'] == 'success') {
			show_success("Successful " . $_GET['operation'] . " of Book Request ID " . $_GET['brid'] . ".");
		} else {
			show_error("Failed to " . $_GET['operation'] . " Book Request ID " . $_GET['brid'] . ".");
		}
	}

?>

<!DOCTYPE html>
<html lang = "en">
<html>

<head>
  <meta charset = "UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="author" content= "Andy Garcia and Bootstrap contributors">

  <title>View Book Form</title>

  <link rel = "stylesheet" href = "css/navbar.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>
	<link rel = "stylesheet" href = "css/wrapper.css">
	<link rel = "stylesheet" href = "css/base.css">

	<style>

		.form-floating {
		  max-width: 450px;
		}

		.h3{
			padding-top: 2%;
			margin-left: 30%;
		}


	 #container{
		 margin-top: 3%;
	   overflow-y: auto;
	 }

	 .table-striped{
		 margin-left: 18%;
		 width:50%;
	 }

	 table, th{
	  border:1px solid black;
	  border-collapse: collapse;
	}

		.container .thead .th{
			position: sticky;
			top: 0;
		}

	</style>


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

			<div class="h3 mt-3 mb-4">Search by Semester:</div>

			<div class="container">
				<table class="mt-3 table table-striped">
					<thead class="table-dark">
						<tr align="center">
							<th>Year</th>
							<th>Semester</th>
							<th>View</th>
							<th>Edit</th>
							<th>Delete</th>
						</tr>
					</thead>
					<tbody>
						<?php
							// Retrieve list of requests and add options for each request
							require $_SERVER["DOCUMENT_ROOT"] . '/functions/db.php';
							require_once $_SERVER["DOCUMENT_ROOT"] . '/functions/get_utils.php';
							require_once $_SERVER["DOCUMENT_ROOT"] . '/functions/query_param_utils.php';
	
							// Get all requests
							$reqs = get_user_reqs($uid);

							// Output request data to table
							foreach($reqs as $request) {
								// Get URLs for buttons
								$viewedit_url = brid_param_url("http://localhost:8080/ViewRequests.php", $request['brid']);
								$delete_url = brid_param_url("http://localhost:8080/DeleteRequest.php", $request['brid']);

								$semester = $mysqli->query("
									SELECT year, season 
									FROM SEMESTER 
									WHERE skey = " . $request['skey'] . ";
								");

								$semester = $semester->fetch_assoc();

								echo '<tr><td class="text-center">' . 
								$semester['year'] .
								'</td><td class="text-center">' .
								$semester['season'] .
								'</td><td class="text-center"> 
								<a href="' . $viewedit_url . '">
								<button type="button" class="btn btn-primary mx-auto">View</button>
								</a></td>
								<td class = "text-center"><a href="' . $viewedit_url . '">
								<button type="button" class="btn btn-warning mx-auto">Edit</button>
								</a></td>
								<td class="text-center"><a href="' . $delete_url . '">
								<button type="button" class="btn btn-danger mx-auto">Delete</button>
								</a></td>';
							}

							$mysqli->close();
						?>
					</tbody>
				</table>
			</div>
    	</div>
	</div>
</body>
</html>
