<?php

	/**
	 * Functions helpful for managing semesters
	 */

	/**
	 * Takes Semester and Year
	 * Returns a SemesterID
	 */

	function pull_brid($skey, $uid) {
		require $_SERVER["DOCUMENT_ROOT"] . '/functions/db.php';

		// Construct query
		$query = "
		SELECT DISTINCT BR.brid
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

	function delete_request($brid) {
		require $_SERVER["DOCUMENT_ROOT"] . '/functions/db.php';

		// Construct queries
		$del_from_list = "
		DELETE FROM BOOK_LIST
		WHERE brid = " . $brid . ";";

		$del_from_reqs = "
		DELETE FROM BOOK_REQS
		WHERE brid = " . $brid . ";";

		try {
			// attempt queries, catch if fails
			if (!$mysqli->query($del_from_list) or !$mysqli->affected_rows > 0) {
				show_error($mysqli->error);
				return false;
			}

			if (!$mysqli->query($del_from_reqs) or !$mysqli->affected_rows > 0) {
				show_error($mysqli->error);
				return false;
			}

			return true;

		} catch (mysqli_sql_exception $e) {
			show_error($mysqli->error);
			return false;
		} finally {
			$mysqli->close();
		}
	}

	function remove_book_from_request($bid, $brid) {
		require $_SERVER["DOCUMENT_ROOT"] . '/functions/db.php';

		$query = "
		DELETE FROM BOOK_LIST
		WHERE brid = " . $brid . "
		AND bid = " . $bid . ";";

		try {
			if (!$mysqli->query($query)) {
				require_once $_SERVER["DOCUMENT_ROOT"] . '/functions/show_feedback.php';
				show_error($mysqli->error);
				return false;
			}

			return true;

		} catch (mysqli_sql_exception $e) {
			require_once $_SERVER["DOCUMENT_ROOT"] . '/functions/show_feedback.php';
			show_error($mysqli-error);
		} finally {
			$mysqli->close();
		}
	}

	function add_book_to_request($bid, $brid) {
		require $_SERVER["DOCUMENT_ROOT"] . '/functions/db.php';

		$query = "
		INSERT INTO BOOK_LIST (
			bid,
			brid
		) VALUES (
			" . $bid . ",
			" . $brid . "
		);";
	}
?>