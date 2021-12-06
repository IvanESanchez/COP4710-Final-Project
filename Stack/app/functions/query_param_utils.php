<?php
  /**
	* Takes a target URL and an email. Returns a string which combines both and properly encodes the email
	*/
	function username_param_url($target, $username) {
		return $target . "?username=" . urlencode($username);
	}
?>