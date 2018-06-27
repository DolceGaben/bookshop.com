<?php
	session_start();
	unset($_SESSION['username']);
	session_destroy();
	header("location:home_test.php");

	?>