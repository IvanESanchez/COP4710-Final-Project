<?php

	/**
	 * Functions helpful for managing semesters
	 */

	/**
	 * Takes Semester and Year
	 * If row exists in the table
	 *   returns the skey
	 * If row does not exist
	 *   inserts new row using Semester and Year
	 *   returns the skey for that row
	 */

	function pull_skey($season, $year) {
		require $_SERVER["DOCUMENT_ROOT"] . '/functions/db.php';

		// Construct query
		$query = "
		SELECT S.skey
		FROM SEMESTER S
		WHERE S.season = '" . $season . "'
			AND S.year = '" . $year . "';";

		try {
			$result = $mysqli->query($query);

			if ($result->num_rows == 0) {
				$mysqli->query("
				INSERT INTO SEMESTER (
					year,
					season
				) VALUES (
					'" . $year . "',
					'" . $season . "'
				);");

				$result = $mysqli->query($query);
			}

			$row = $result->fetch_assoc();
			
			$skey = $row['skey'];

			$result->close();
		} catch (mysqli_sql_exception $e) {
			require_once $_SERVER["DOCUMENT_ROOT"] . '/functions/show_feedback.php';
			show_error($mysqli->error);
		} finally {
			$mysqli->close();
		}

		return $skey;
	}

?>