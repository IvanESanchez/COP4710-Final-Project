<?php

	if (isset($_GET['brid'])) {
		require $_SERVER["DOCUMENT_ROOT"] . '/functions/db.php';

		$brid = intval($_GET['brid']);

		echo $brid;

		$query = "
		SELECT S.year, S.season
		FROM BOOK_REQS B, SEMESTER S
		WHERE B.skey = S.skey;";

		try {
			$result = $mysqli->query($query);

			$row = $result->fetch_assoc();

			$season = $row['season'];
			$year = $row['year'];
		} catch (mysqli_sql_exception $e) {
			require_once $_SERVER["DOCUMENT_ROOT"] . '/functions/show_feedback.php';
			show_error($mysqli->error);
		} finally {
			$mysqli->close();
		}
	}

	if (isset($_GET['operation']) and isset($_GET['bid'])) {
		require_once $_SERVER["DOCUMENT_ROOT"] . '/functions/show_feedback.php';

		// Check if operation was successful and output result
		require_once $_SERVER["DOCUMENT_ROOT"] . '/functions/book_management.php';
		if ($_GET['result'] == 'success') {
			show_success("Successful " . $_GET['operation'] . " of Book " . get_book_title($_GET['bid']) . '.');
		} else {
			show_error("Failed to " . $_GET['operation'] . " Book " . get_book_title($_GET['bid']));
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
	<!-- <link rel = "stylesheet" href = "css/wrapper.css"> -->
	<!-- <link rel = "stylesheet" href = "css/book-form.css"> -->

	<style>
		.wrapper {
		  display: flex;
		  position: relative;
		}

		.wrapper .Center-section {
		  width: 100%;
		  margin-left: 200px;
		}
		.wrapper .Center-section .main-text {
			margin-left: 38%;
			padding-top: 20px;
			font-size: 20px;
		}

		.wrapper .Center-section .main-text {
			padding-top: 45px;
			max-width: 550px;
			padding-bottom: 100px;
		}

		.wrapper .Center-section .table{
			margin-left: 15%;
			width: 75%;
		}

		.btn{

		}

		.btn {
		  width: 350px;
			margin-left: 15%;
		}


		td{
			text-align: center;
			vertical-align: middle;
		}

		.wrapper .Center-section .main-text .form-dropdown{
			margin-left: 5%;
			width: 500px;
		}

		select{
			width: 450px;
			height: 50px;
			text-align: center;
			font-size: 35px;
		}
		.words{
			margin-left: 28%;
			font-size: 35px;
		}

		.header{
			margin-left: 45%;
		}

		.wrapper .Center-section .submit-book{
			margin-left: 42%;
		}



	</style>

</head>
<body>


  <div class="wrapper">
		<?php
			include $_SERVER["DOCUMENT_ROOT"] . '/templates/nav.php';
		?>

    <div class="Center-section">

		<!-- Hey Andy, could you place this button above the table? Thanks! -->


		<div class="header h3 mt-3 mb-4">Book Form for <?php echo $season . " " . $year; ?></div>

		<div class="submit-book;">
			<?php
				require $_SERVER["DOCUMENT_ROOT"] . '/functions/query_param_utils.php';
				echo '
				<a href="' . brid_param_url("http://localhost:8080/AddBook.php", $brid) . '">
				<button type="button" class="btn btn-primary mx-auto">Add Book</button>
				</a>'
			?>
		</div>

			<table class="mt-3 table">
				<thead class="table-dark">
					<tr align="center">
						<th>Book Title</th>
						<th>Author Name(s)</th>
						<th>Publisher</th>
						<th>Edition</th>
						<th>ISBN</th>
						<th>Delete</th>
					</tr>
				</thead>
				<tbody class="align-middle">
					<?php

						/**
						 * Need to retrieve list of books for user/semester and provide options
						 */
						require $_SERVER["DOCUMENT_ROOT"] . '/functions/get_utils.php';
						require $_SERVER["DOCUMENT_ROOT"] . '/functions/query_param_utils.php';

						$books = get_booklist_from_request($brid);

						foreach($books as $book) {

							$delete_url = book_in_request_url("http://localhost:8080/RemoveBook.php", $book['bid'], $brid);

							// Output table content
							echo '<tr><td>' .
							$book['title'] .
							'</td><td>' .
							$book['author'] .
							'</td><td>' .
							$book['publisher'] .
							'</td><td>' .
							$book['edition'] .
							'</td><td>' .
							$book['isbn'] .
							'</td><td>
							<a href="' . $delete_url . '">
							<button style="height:40px;width:200px" type="button" class="btn btn-danger mx-auto">Delete</button>
							</a></td>';
						}
					?>
				</tbody>
			</table>
		</div>
	</div>

</body>

</html>
