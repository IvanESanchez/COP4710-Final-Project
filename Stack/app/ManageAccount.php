<?php
	// Load session
	require $_SERVER["DOCUMENT_ROOT"] . '/functions/no_cookies.php';

	// Check if uid available from session; if not, have user login again
	if (!isset($_SESSION["uid"])) {
		header('Location: login.php');
	}

	// Save current uid
	$uid = $_SESSION["uid"];

	// Load requirements
	require_once $_SERVER["DOCUMENT_ROOT"] . '/functions/get_utils.php';
	require_once $_SERVER["DOCUMENT_ROOT"] . '/functions/account_management.php';
	require_once $_SERVER["DOCUMENT_ROOT"] . '/functions/show_feedback.php';

	/**
	 * Try to change user's name
	 * Have to pass $uid because of variable scoping issues
	 */
	function new_name($uid) {
		// Save data from POST
		$old_name = $_POST['old-name'];
		$new_name = $_POST['new-name'];

		// Query database for current name of user
		$real_name = get_name($uid);

		// Check if old name matches what we had stored
		if ($old_name != $real_name) {
			// Weird UX setup here, but we'll roll with it that if the entered old name doesn't match what's in the database, we throw an error
			show_error("<code>" . $old_name . "</code> does not match <code>" . $real_name . "</code>");
		} else {
			// Change to new name and catch failure
			if (change_name($uid, $new_name)) {
				show_success("Changed name from <code>" . $real_name . "</code> to <code>" . $new_name . "</code>");
			} else {
				show_error("Failed to change name to <code>" . $new_name . "</code>");
			}
		}
	}

	/**
	 * Try to change user's password
	 * Have to pass $uid because of variable scoping issues
	 */
	function new_password($uid) {
		// Save data from POST
		$old_password = $_POST['old-password'];
		$new_password = $_POST['new-password'];
		$c_password = $_POST['confirm-password'];

		// Query database for current password of user
		$real_password = get_password($uid);

		// Check if old password matches what we had stored
		if ($old_password != $real_password) {
			// Let user know
			show_error('Old password provided does not match. Please use <a href="http://localhost:8080/ForgotPassword.php">Forgot Password</a> if you need a temporary password to reset your password with.');
		} else {
			// Check if new passwords match
			if ($new_password != $c_password) {
				// Error
				show_error("New passwords do not match. Please re-type or paste them carefully.");
			} else {
				// Change to new password and catch failure
				if (change_password($uid, $new_password)) {
					show_success("Password changed.");
				} else {
					show_error("Password change attempt failed. Please retry.");
				}
			}
		}
	}

	/**
	 * Try to change user's email
	 * Have to pass $uid because of variable scoping issues
	 */
	function new_email($uid) {
		// Save data from POST
		$old_email = $_POST['old-email'];
		$new_email = $_POST['new-email'];

		// Query database for current email of user
		$real_email = get_email($uid);

		// Check if old email matches what we had stored
		if ($old_email != $real_email) {
			// Weird UX setup here, but we'll roll with it that if the entered old email doesn't match what's in the database, we throw an error
			show_error("<code>" . $old_email . "</code> does not match <code>" . $real_email . "</code>");
		} else {
			// Change to new email and catch failure
			if (change_email($uid, $new_email)) {
				// Need to update SESSION as well
				$_SESSION['username'] = $new_email;
				session_write_close();
				show_success("Changed email from <code>" . $real_email . "</code> to <code>" . $new_email . "</code>");
			} else {
				show_error("Failed to change email to <code>" . $new_email . "</code>");
			}
		}
	}

	// Figure out which form was submitted
	if (isset($_POST['new-name'])) {
		new_name($uid);
	} else if (isset($_POST['new-password'])) {
		new_password($uid);
	} else if (isset($_POST['new-email'])) {
		new_email($uid);
	}
?>

<!DOCTYPE html>
<html lang = "en">

<html>

<head>
	<meta charset = "UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="author" content= "Andy Garcia and Bootstrap contributors">

	<title>Account Manager</title>

	<!-- Links to the style sheets we need to make items appealing -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel = "stylesheet" href = "css/navbar.css">
	<link rel = "stylesheet" href = "css/base.css">
	<link rel = "stylesheet" href = "css/wrapper.css">
	<link rel = "stylesheet" href = "css/manage-account.css">

<style>
	.Center-section .header {
		margin-left: 38%;
		padding-top: 35px;
		font-size: 30px;
}
</style>

</head>
<body>

	<?php
		// Dynamic side bar
		require $_SERVER["DOCUMENT_ROOT"] . '/templates/nav.php';
	?>

    <div class="Center-section">
      <div class="header h3 mt-3 mb-4">Account Manager</div>

			<!-- Center text allows users to change Username/Password -->

			<form action ="ManageAccount.php" method="post">
				<div class="mb-2 h3"> Update Name (optional)</div>
				<div class = "mb-2 form-floating">
					<input name="old-name" type="text" class="form-control" id="old-name"
					placeholder="Old Username" required>
			  	<label for="old-name">Old Name</label>
				</div>

				<div class = "mb-2 form-floating">
					<input name="new-name" type="text" class="form-control" id="new-name"
					placeholder="New username" required>
			  	<label for="new-name">New Name</label>
				</div>
				<input type="submit" class = "mt-3 mb-3 w-50 btn-lg btn-primary" value="Submit New Name">
			</form>

			<form action="ManageAccount.php" method="post">
				<div class="mt-3 h3"> Update Password (optional)</div>
				<div class = "mb-2 form-floating">
					<input name="old-password" type = "password" class="form-control" id="old-password"
					placeholder="Old Password" required>
					<label for="old-password">Old Password</label>
				</div>

				<div class = "mb-2 form-floating">
					<input name="new-password" type = "password" class="form-control" id="new-password"
					placeholder="New Password" required>
					<label for="new-password">New Password</label>
				</div>

				<div class = "mb-2 form-floating">
					<input name="confirm-password" type = "password" class="form-control" id="confirm-password"
					placeholder="Confirmation Password" required>
					<label for="confirm-password">Confirm New Password</label>
				</div>

				<input type="submit" class = "mt-3 mb-3 w-50 btn-lg btn-primary" value="Submit New Password">
			</form>

			<form action="ManageAccount.php" method="post">
				<div class="mt-2 mb-2 h3"> Update Email (optional)</div>
				<div class = "mb-2 form-floating">
					<input name="old-email" type="text" class="form-control" id="old-email"
					placeholder="Old Username" required>
			  	<label for="old-email">Old Email</label>
				</div>


				<div class = "mb-2 form-floating">
					<input name="new-email" type="text" class="form-control" id="new-email"
					placeholder="Old Username" required>
			  	<label for="new-email">New Email</label>
				</div>

				<input type="submit" class = "mt-3 mb-3 w-50 btn-lg btn-primary" value="Submit New Email">
			</form>


   </div>

</body>


</html>
