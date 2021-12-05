<!DOCTYPE html>
<html lang = "en">
<html>

<head>
  <meta charset = "UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="author" content= "Andy Garcia and Bootstrap contributors">

  <title>Edit Book Forms</title>

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

 #container{
	 margin-top: 3%;
	 width:100%;
   overflow:auto;
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

      <form action ="EditBook.php" method="post">
				<div class="h3 mt-3 mb-4">Search Book Form to Edit</div>

				<div class="container">
					<table class="mt-3 table table-striped">
						<thread>
							<tr align="center">
								<th>Book Title</th>
								<th>Author Name(s)</th>
								<th>Edition</th>
								<th>Publish</th>
								<th>ISBN</th>
							</tr>
						</thread>
						<tableBody>
							<tr>
							</tr>
						</tableBody>
					</table>
				</div>

			</form>

		</div>

	</div>


</body>


</html>
