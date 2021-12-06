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
				<form action="CreateReminder.php" method="get">
					<div class="mt-2 btn">
							<button class = "mb-1 btn-lg btn-primary"
							type = "submit"> Create New Reminder
						  </button>
					</div>
				</form>
      </div>

			<table class="mt-4 table">
				<thead class="table-dark">
					<tr align="center">
						<th>Id</th>
						<th>Date</th>
						<th>Delete</th>
					</tr>
				</thead>
				<tbody>
					<tr>
					</tr>
				</tbody>
			</table>

		</div>

   </div>

</body>




</html>