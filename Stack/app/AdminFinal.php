<!DOCTYPE html>
<html lang = "en">

<head>
  <meta charset = "UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="author" content= "Andy Garcia and Bootstrap contributors">

  <title>Generate Final Book Requests</title>

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
	}

	form {
	  margin-left: 30%;
	}

	select{
		width: 450px;
		height: 50px;
		text-align: center;
		font-size: 35px;
	}

	.btn-primary{
		width: 450px;
	}


</style>

</head>
<body>

	<!-- The following code is used for the side bar menu options -->
  <div class="wrapper">
		<?php
			require $_SERVER["DOCUMENT_ROOT"] . '/templates/adminbar.php';
		?>

    <div class="Center-section">

      <form action ="FinalReport.php" method="post">
				<div class="h3 mt-3 mb-4">View Book Forms</div>

				<div> Insert data to search for a form: </div>

				<div class="mt-3 mb-1 form-dropdown">
					<select name="season" id="season" data-live-search="true">
						<option selected>Select a semester</option>
						<option>Spring</option>
						<option>Summer</option>
						<option>Fall</option>
					</select>
				</div>

				<div class = "mb-1 form-floating">
					<input name="year" type="number" class="form-control" id="year" placeholder="Semester year">
					<label for="year">Semester year</label>
				</div>

				<input type="submit" class = "mt-1 mb-1 btn-lg btn-primary" value="Generate">
			</form>

    </div>

  </div>

</body>


</html>
