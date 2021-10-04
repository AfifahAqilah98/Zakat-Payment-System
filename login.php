<?php
include "header.php";
?>

<!-- Site Navigation Link List -->
<div id="navigation">
<ul>
	<li><a href="index.php"><img src="img/home.png" id="icon"> Home </a></li>
	<li><a href="about.php"><img src="img/info.png" id="icon"> About </a></li>
	<li><a href="contact.php"><img src="img/contact.png" id="icon"> Contact </a></li>
	<li><a href="login.php" class="active"><img src="img/login.png" id="icon"> Login </a></li>
</ul>
</div>

<!-- Devide content into blocks -->
<div id="content-container">

<!-- Left block -->
<div id="main">	
<center>
<div id="border2">
	<h2>Login</h2>
	<form method="post" action="login.php">
		<p>Username* : <input type="text" name="username" placeholder="Enter your username" required="" style="text-transform: uppercase;"></p>
		<p>Password* &nbsp: <input id="pass" type="password" name="password" placeholder="Enter your password" required="" > <span id="show"  onclick="show()"><img src="img/show.png" width="25" height="20">
			<span id="showtext">show password</span></span>
			<span id="hide" onclick="hide()"><img src="img/hide.png" width="25" height="20">
			<span id="hidetext">hide password</span></span>
		</p>
		<p style="font-size: 14px;">* Please enter all required fields</p>
		<p><input type="submit" name="submit" value="Login">
		<input type="reset" name="Reset" value="Reset"></p>
		<p style="text-align: right;">New User? <a href="signup.php">Click Here</a> to sign up.</p>
	</form>
</div>
</center>
</div>
<?php

if (isset($_POST['submit'])) {
	$username = strtoupper($_POST['username']);
	$password = $_POST['password'];

	session_start();

	if (substr($username, 0, 5) === "STAFF") {
		$sql = "SELECT StaffID FROM staff WHERE username = '$username' AND password = '$password'";
		$result = mysqli_query($conn, $sql);
		$count = mysqli_num_rows($result);

		if ($count === 1) {
			$row = mysqli_fetch_assoc($result);
			$_SESSION['StaffID'] = $row["StaffID"];

			echo "<script>alert('Successfully Login!');
				window.location.href='staff.php'; </script>";
		} else {
			echo "<script>alert('Incorrect username and password!');</script>";
		}


	} else {
		$sql = "SELECT UserID FROM user WHERE username = '$username' AND password = '$password'";
		echo $sql;
		$result = mysqli_query($conn, $sql);
		$count = mysqli_num_rows($result);

		if ($count === 1) {
			$row = mysqli_fetch_assoc($result);
			$_SESSION['UserID'] = $row["UserID"];

			echo "<script>alert('Successfully Login!');
				window.location.href='user.php'; </script>";
		} else {
			echo "<script>alert('Incorrect username and password!');</script>";
		}
		
	}
}

include "footer.php";
?>