<?php
  /**
	* Takes a target URL and an email. Returns a string which combines both and properly encodes the email
	*/
	function username_param_url($target, $username) {
		return $target . "?username=" . urlencode($username);
	}

	/**
	 * Takes a target URL and a uid. Returns a string which combines both and properly encodes the uid
	 */
	function uid_param_url($target, $uid) {
		return $target . "?uid=" . urlencode($uid);
	}

	/**
	 * Takes a target URL and an id. Returns a string which combines both and properly encodes the id
	 */
	function id_param_url($target, $id) {
		return $target . "?id=" . urlencode($id);
	}

	/**
	 * Takes a target URL and a brid. Returns a string which combines both and properly encodes the brid
	 */
	function brid_param_url($target, $brid) {
		return $target . "?brid=" . urlencode($brid);
	}

	function bid_param_url($target, $bid) {
		return $target . "?bid=" . urlencode($bid);
	}

	function book_in_request_url($target, $bid, $brid) {
		return $target . "?bid=" . urlencode($bid) . "&brid=" . urlencode($brid);
	}
?>