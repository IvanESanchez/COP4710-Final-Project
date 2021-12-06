<?php

	require $_SERVER["DOCUMENT_ROOT"] . '/functions/no_cookies.php';
	
	if ($_SERVER["REQUEST_METHOD"] == "POST") {

		require $_SERVER["DOCUMENT_ROOT"] . '/functions/show_feedback.php';

		if (!empty($_POST['season']) and
			!empty($_POST['year']) and
			!empty($_POST['title']) and
			!empty($_POST['author']) and
			!empty($_POST['edition']) and
			!empty($_POST['publisher']) and
			!empty($_POST['isbn'])) 
		{

			require $_SERVER["DOCUMENT_ROOT"] . '/functions/db.php';

			$season = $mysqli->real_escape_string(trim($_POST['season']));
			$year = $mysqli->real_escape_string(trim($_POST['year']));
			$title = $mysqli->real_escape_string(trim($_POST['title']));
			$author = $mysqli->real_escape_string(trim($_POST['author']));
			$edition = $mysqli->real_escape_string(trim($_POST['edition']));
			$publisher = $mysqli->real_escape_string(trim($_POST['publisher']));
			$isbn = $mysqli->real_escape_string(trim($_POST['isbn']));

			$bookInsert = '
			INSERT INTO BOOK (
				isbn,
				title,
				author,
				edition,
				publisher
			) VALUES (
				"' . $isbn . '",
				"' . $title . '",
				"' . $author . '",
				"' . $edition . '",
				"' . $publisher . '"
			);';

			$semesterInsert = '
			INSERT INTO SEMESTER (
				year,
				season
			) VALUES (
				"' . $year . '",
				"' . $season . '"
			);';

			$requestInsert = '
			INSERT INTO BOOK_REQS (
				skey,
				uid
			) VALUES (
				"' . $ting . '",';

			try {
				// Perform INSERT INTO book
				$mysqli->query($bookInsert);
				show_success("Book Request for " . $title . "created successfully.");

				// Redirect to MainMenu.php
			} catch (mysqli_sql_exception $e) {
				show_error("Unable to create " . $title . ".<br>" . $mysqli->error);
			} finally {
				$mysqli->close();
			}
		} else {
			show_error("Please fill out all fields and resubmit.");
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
    	include ('templates/navbar.php');
		?>

    <div class="Center-section">
      <div class="header h3 mt-3 mb-4">Book request form</div>

      <div class="main-text"> Insert Data:

				<form action="BookForm.php" method="post">

					<div class="mt-3 mb-1 form-dropdown">
						<select data-live-search="true" name="season">
							<option>Select a semester</option>
							<option>Fall</option>
							<option>Spring</option>
							<option>Summer</option>
						</select>
					</div>

					<div class = "mb-1 form-floating">
						<input type="number" class="form-control" name="year" id="floatingInput"
						placeholder="Semester year">
						<label for="floatingInput">Semester year</label>
					</div>

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
						<input type="number" class="form-control" name="edition" id="floatingInput"
						placeholder="Edition">
						<label for="floatingInput">Edition</label>
					</div>

					<div class = "mb-1 form-floating">
						<input type="text" class="form-control" name="publisher" id="floatingInput"
						placeholder="Publisher">
						<label for="floatingInput">Publisher</label>
					</div>

					<div class = "mb-1 form-floating">
						<input type="text" class="form-control" name="isbn" id="floatingInput"
						placeholder="ISBN">
						<label for="floatingInput">ISBN</label>
					</div>

					<div class="mt-3 btn">
							<button class = "mt-2 mb-1 w-100 btn-lg btn-primary"
							type = "submit">Submit
						  </button>
					</div>

				</form>

      </div>

   </div>

</body>

</html>
