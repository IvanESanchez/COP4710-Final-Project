<?php session_start(); ?>

<?php if (isset($_SESSION['email'])) : ?>
	<p>Your email is <?= $_SESSION['email'] ?></p>
<?php endif; ?>

<?php if (isset($_SESSION['password'])) : ?>
	<p>Your password is <?= $_SESSION['password'] ?></p>
<?php endif; ?>

<?php
	$db_name = 'Super User';
	$db_email = 'filler_email@gov.give';
	$db_pass = 'password123!';
?>

<html>
	<body>
		<p>Welcome <?= $db_name ?></p>
		<p>Your email is <?= $db_email ?></p>
		<p>Your password is <?= $db_pass ?></p>
	</body>
</html>