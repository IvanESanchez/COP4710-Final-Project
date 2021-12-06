<?php

	/**
	 * Functions helpful for managing books
	 */

	/**
	 * Takes ISBN
	 * Returns the associated bid
	 */

	function pull_bid($isbn) {
		require $_SERVER["DOCUMENT_ROOT"] . '/functions/db.php';

		// Construct query
		$query = "
		SELECT B.bid
		FROM BOOK B
		WHERE B.isbn = '" . $isbn . "';";

		try {
			$result = $mysqli->query($query);

			if ($result->num_rows > 0) {
				$row = $result->fetch_assoc();
				$bid = $row['bid'];
			} else {
				return null;
			}

			$result->close();
		} catch (mysqli_sql_exception $e) {
			require_once $_SERVER["DOCUMENT_ROOT"] . '/functions/show_feedback.php';
			show_error($mysqli->error);
		} finally {
			$mysqli->close();
		}
	
		return $bid;
	}
?>