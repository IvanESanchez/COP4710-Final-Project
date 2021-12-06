<!DOCTYPE html>
<html lang = "en">
<html>

<head>
  <meta charset = "UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="author" content= "Andy Garcia and Bootstrap contributors">

  <title>Delete Users</title>

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
	</style>

</head>
<body>

  <div class="wrapper">
		<?php
			include $_SERVER["DOCUMENT_ROOT"] . '/templates/adminbar.php';
		?>

    <div class="Center-section">
      <div class="header h2 mt-3 mb-4">Delete Users Form</div>
			<div class ="h3 Panel">List of all Users</div>

			<div class="container">
				<table class="mt-3 table table-striped">
					<thread>
						<tr align="center">
							<th style="width: 30%">Email</th>
							<th>Name</th>
							<th style="width: 25%">Admin Status</th>
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