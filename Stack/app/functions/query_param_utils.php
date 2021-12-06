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
?>