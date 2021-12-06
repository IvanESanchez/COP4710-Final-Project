<?php

	/**
	 * Functions helpful for managing semesters
	 */

	/**
	 * Takes Semester and Year
	 * Returns a SemesterID
	 */

	function pull_sid($season, $year) {
		require $_SERVER["DOCUMENT_ROOT"] . 'db.php';

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

			while ($row = $result->fetch_array(MYSQLI_NUM)) {
				$sid = $row[0];
			}

			$result->close();
		} catch (mysqli_sql_exception $e) {
			require_once $_SERVER["DOCUMENT_ROOT"] . '/functions/show_feedback.php';
			show_error($mysqli->error);
		} finally {
			$mysqli->close();
		}

		return $sid;
	}

?>