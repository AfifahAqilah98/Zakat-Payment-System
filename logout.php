<?php

session_start();

//echo $_GET['user'];

if ($_GET['user'] == "staff") {
	unset($_SESSION['StaffID']);
	echo "<script>alert('Thank you!');
	window.location.href='index.php';</script>";
} else {
	unset($_SESSION['UserID']);
	echo "<script>alert('Thank you!');
	window.location.href='index.php';</script>";
}

?>