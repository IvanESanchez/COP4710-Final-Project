<?php

	if (isset($_GET['brid'])) {
		// save brid
		$brid = $_GET['brid'];

		// start target url
		$url = "Semestersearch.php?operation=delete&brid=" . $brid;

		// delete given brid from book_reqs and book_list and track success/failure
		require_once $_SERVER["DOCUMENT_ROOT"] . '/functions/book_request_management.php';
		if (delete_request($brid)) {
			$url = $url . "&result=success";
		} else {
			$url = $url . "&result=fail";
		}

		// Redirect user back to semestersearch with appropriate data for management UX to give feedback
		header('Location: ' . $url);
	} else {
		header('Location: semestersearch.php');
	}

?>