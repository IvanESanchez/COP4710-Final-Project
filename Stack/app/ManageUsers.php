<?php
	if(isset($_GET['operation']) and isset($_GET['uid'])) {
		require_once $_SERVER["DOCUMENT_ROOT"] . '/functions/show_feedback.php';

		// Check if operation succeeded or not and output result
		if ($_GET['result'] == 'success') {
			show_success("Successful " . $_GET['operation'] . " of user ID " . $_GET['uid']);
		} else {
			show_error("Failed to " . $_GET['operation'] . " user ID " . $_GET['uid']);
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

  <title>Manage Users</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel = "stylesheet" href = "css/base.css">
  <link rel = "stylesheet" href = "css/navbar.css">
  <link rel = "stylesheet" href = "css/wrapper.css">
  <!-- <link rel = "stylesheet" href = "css/admin.css"> -->
	<style>
		.h3{
			margin-left: 39%;
		}

		.h2{
			margin-left: 38%;
		}

		#container{
	 	 margin-top: 3%;
	 	 width:100%;
	   overflow:auto;
	  }

		.table-striped{
	  	margin-left: 18%;
	  	width:60%;
	  }

		table, th{
	   border:1px solid black;
	   border-collapse: collapse;
	  }

		.container .thead .th{
	 	 position: sticky;
	 	 top: 0;
	  }
		.header{
			margin-left: 2%;
		}
	</style>

</head>
<body>

  <div class="wrapper">
		<?php
			include $_SERVER["DOCUMENT_ROOT"] . '/templates/adminbar.php';
		?>

    <div class="Center-section">
      <div class="header h2 mt-3 mb-4">Manage Users</div>
			<div class ="h3 Panel">List of all Users</div>

			<div class="container">
				<table class="mt-3 table table-striped">
					<thead class="table-dark">
						<tr align="center">
							<th style="width: 30%">Email</th>
							<th>Name</th>
							<th style="width: 25%">Admin Status</th>
							<th>Edit</th>
							<th>Delete</th>
						</tr>
					</thead>
					<tbody>
						<?php
							/**
							 * Need to retrieve list of users and provide options for managing each user
							 */
							require_once $_SERVER["DOCUMENT_ROOT"] . '/functions/get_utils.php';
							require_once $_SERVER["DOCUMENT_ROOT"] . '/functions/query_param_utils.php';

							// Get all users
							$users = get_all_users();

							// Prepare admin variable
							$admin = "No";

							// Output user data to table
							foreach($users as $user) {
								// Make admin value a string
								if ($user["admin"]) {
									$admin = "Yes";
								} else {
									$admin = "No";
								}

								// Get URLs for buttons
								$delete_url = uid_param_url("http://localhost:8080/DeleteUser.php", $user["uid"]);
								$edit_url = uid_param_url("http://localhost:8080/EditAccount.php", $user["uid"]);

								// Output table content
								echo "<tr><td>" .
								$user["email"] .
								"</td><td>" .
								$user["name"] .
								'</td><td class="text-center">' .
								$admin .
								'</td><td class="text-center">' .
								'<a href="' . $edit_url . '">
								<button type="button" class="btn btn-warning mx-auto">Edit</button>
								</a></td><td class="text-center"><a href="' . $delete_url . '">
								<button type="button" class="btn btn-danger mx-auto">Delete</button>
								</a></td>';
							}
						?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</body>




</html>
