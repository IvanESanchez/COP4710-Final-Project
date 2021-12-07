<?php

	if (isset($_GET['bid']) and isset($_GET['brid'])) {
		$bid = intval($_GET['bid']);
		$brid = intval($_GET['brid']);

		// Target url
		require_once $_SERVER["DOCUMENT_ROOT"] . '/functions/book_management.php';
		$url = "formdata.php?brid=" . $brid . "&operation=delete&bookName=" . get_book_title($bid);

		// remove book (bid) from request (brid) and track success/failure
		require_once $_SERVER["DOCUMENT_ROOT"] . '/functions/book_request_management.php';
		if (remove_book_from_request($bid, $brid)) {
			$url = $url . "&result=success";
		} else {
			$url = $url . "&result=fail";
		}

		// Redirect user back to FormData with appropriate data for management UX to give feedback
		header('Location: ' . $url);
	} else {
		header('Location: formdata.php');
	}

?>