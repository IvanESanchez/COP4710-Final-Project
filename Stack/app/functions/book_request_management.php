<?php

	/**
	 * Functions helpful for managing semesters
	 */

	/**
	 * Takes Semester and Year
	 * Returns a SemesterID
	 */

	function pull_brid($skey, $uid) {
		require $_SERVER["DOCUMENT_ROOT"] . 'db.php';

		// Construct query
		$query = "
		SELECT BR.brid
		FROM BOOK_REQS BR
		WHERE BR.skey = " . $skey . "
		AND BR.uid = " . $uid . ";";

		try {
			$result = $mysqli->query($query);

			if ($result->num_rows > 0) {
				$row = $result->fetch_assoc();

				$brid = $row['brid'];
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

		return $brid;
	}

?>