<?php
		require_once $_SERVER["DOCUMENT_ROOT"] . '/functions/admin_guard.php';

		// Change side bar based on if user is admin or not
		if (am_i_admin()) {
			include $_SERVER["DOCUMENT_ROOT"] . '/templates/adminbar.php';
		} else {
			include $_SERVER["DOCUMENT_ROOT"] . '/templates/navbar.php';
		}
?>