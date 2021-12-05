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
    	include ('templates/navbar.php');
		?>


    <div class="Center-section">

			<div class="h3 mt-3 mb-4">Search by Semester:</div>


			<div class="container">
				<table class="mt-3 table table-striped">
					<thread>
						<tr align="center">
							<th>Year</th>
							<th>Semester</th>
							<th>Options</th>
						</tr>
					</thread>
					<tableBody>
						<tr>
						</tr>
					</tableBody>
				</table>
			</div>

    </div>

 </div>


</body>


</html>
