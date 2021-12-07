<?php

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		
		if (!empty($_POST['title']) and
			!empty($_POST['author']) and
			!empty($_POST['publisher']) and
			!empty($_POST['edition']) and
			!empty($_POST['isbn']) and
			!empty($_POST['brid']))
		{

			require $_SERVER["DOCUMENT_ROOT"] . '/functions/db.php';

			$title = $mysqli->real_escape_string(trim($_POST['title']));
			$author = $mysqli->real_escape_string(trim($_POST['author']));
			$publisher = $mysqli->real_escape_string(trim($_POST['publisher']));
			$edition = intval($_POST['edition']);
			$isbn = $mysqli->real_escape_string(trim($_POST['isbn']));
			$brid = intval($_POST['brid']);
			
			$url = "http://localhost:8080/FormData.php" .
			"?brid=" . $brid . 
			"&operation=" . "addition";

			require_once $_SERVER["DOCUMENT_ROOT"] . '/functions/book_request_management.php';	
			if (create_book_for_request($title, $author, $publisher, $edition, $isbn, $brid)) {
				$url = $url . "&result=success";
			} else {
				$url = $url . "&result=fail";
			}
			
			require_once $_SERVER["DOCUMENT_ROOT"] . '/functions/book_management.php';
			$url = $url . "&bid=" . pull_bid($isbn);

			header('Location: ' . $url);

		} else {
			require_once $_SERVER["DOCUMENT_ROOT"] . '/functions/show_feedback.php';
			show_error("Please fill all forms before submitting.");
		}
	}

?>