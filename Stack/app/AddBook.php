<?php

	if (isset($_GET['brid'])) {
		$brid = intval($_GET['brid']);
	}

?>

<!DOCTYPE html>
<html lang = "en">
<html>

<head>
  <meta charset = "UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="author" content= "Andy Garcia and Bootstrap contributors">

  <title>Book Form</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel = "stylesheet" href = "css/base.css">
	<link rel = "stylesheet" href = "css/navbar.css">
	<link rel = "stylesheet" href = "css/wrapper.css">
	<link rel = "stylesheet" href = "css/book-form.css">
</head>
<body>


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
      	<div class="header h3 mt-3 mb-4">Book request form</div>
		    <div class="main-text"> Insert Data:
				<form action="AddBookToRequest.php" method="POST">

					<div class = "mb-1 form-floating">
						<input type="text" class="form-control" name="title" id="floatingInput"
						placeholder="Book Title">
						<label for="floatingInput">Book Title</label>
					</div>

					<div class = "mb-1 form-floating">
						<input type="text" class="form-control" name="author" id="floatingInput"
						placeholder="Author names">
						<label for="floatingInput">Author Name(s)</label>
					</div>

					<div class = "mb-1 form-floating">
						<input type="text" class="form-control" name="publisher" id="floatingInput"
						placeholder="Publisher">
						<label for="floatingInput">Publisher</label>
					</div>

					<div class = "mb-1 form-floating">
						<input type="number" class="form-control" name="edition" id="floatingInput"
						placeholder="Edition">
						<label for="floatingInput">Edition</label>
					</div>

					<div class = "mb-1 form-floating">
						<input type="text" class="form-control" name="isbn" id="floatingInput"
						placeholder="ISBN">
						<label for="floatingInput">ISBN</label>
					</div>

					<div>
						<input type="hidden" class="form-control" name="brid" id="floatingInput" 
						placeholder="Brid" value="<?php echo $brid; ?>">
					</div>

					<div class="mt-3 btn">
						<button class = "mt-2 mb-1 w-100 btn-lg btn-primary"
						type = "submit">Submit
						</button>
					</div>

				</form>
			</div>
		</div>
   	</div>
</body>
</html>