<?php
	session_start();
	$_SESSION['email'] = 'ashensilverwolf@gmail.com';
	$_SESSION['password'] = 'password';
	header('Location: profile.php');
?>