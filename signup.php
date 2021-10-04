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
	<h2>Sign Up</h2>
	<form method="post" action="signup.php">
		<p>Full Name* &nbsp&nbsp: <input type="text" name="fullname" placeholder="Enter your full name" required=""></p>
		<p>Username* &nbsp&nbsp: <input type="text" name="username" placeholder="For staff, enter your staff no." required="" style="text-transform: uppercase;" minlength="6"></p>
		<p>Password* &nbsp&nbsp&nbsp: <input id="pass" type="password" name="password" placeholder="Enter your password" required="" > <span id="show"  onclick="show()"><img src="img/show.png" width="25" height="20">
			<span id="showtext">show password</span></span>
			<span id="hide" onclick="hide()"><img src="img/hide.png" width="25" height="20">
			<span id="hidetext">hide password</span></span></p>
		<p>MyCard No.* : <input type="text" name="ic_no" placeholder="Enter your MyCard No." maxlength="12" required=""></p>
		<p>Gender* &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp: 
		<input type="radio" name="gender" value="Male" required="">Male 
		<input type="radio" name="gender" value="Female" required="">Female</p>
		<p>Address* &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp: <textarea name="address" placeholder="Enter your address" required=""></textarea></p>
		<p>City* &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp: <input type="text" name="city" placeholder="Enter your address city" required=""></p>
		<p>Postcode* &nbsp&nbsp&nbsp&nbsp: <input type="number" name="zip" placeholder="Enter your address postcode" required=""></p>
		<p>State* &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp: <select name="state">
			<option value="Johor">Johor</option>
			<option value="Kedah">Kedah</option>
			<option value="Kelantan">Kelantan</option>
			<option value="Kuala Lumpur">Kuala Lumpur</option>
			<option value="Labuan">Labuan</option>
			<option value="Melaka">Melaka</option>
			<option value="Negeri Sembilan">Negeri Sembilan</option>
			<option value="Pahang">Pahang</option>
			<option value="Perak">Perak</option>
			<option value="Perlis">Perlis</option>
			<option value="Pulau Pinang">Pulau Pinang</option>
			<option value="Putrajaya">Putrajaya</option>
			<option value="Sabah">Sabah</option>
			<option value="Sarawak">Sarawak</option>
			<option value="Selangor">Selangor</option>
			<option value="Terengganu">Terengganu</option>
		</select></p>
		<p>Country* &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp: <input type="text" name="country" value="Malaysia" readonly=""></p>
		<p>Phone No.* &nbsp&nbsp: <input type="text" name="phone_no" placeholder="Enter your phone no." required=""></p>
		<p style="font-size: 14px;">* Please enter all required fields</p>
		<p><input type="submit" name="submit" value="Sign up">
		<input type="reset" name="Reset" value="Reset"></p>
	</form>
</div>
</center>
</div>


<?php

if (isset($_POST["submit"])) {
	$fullname = $_POST["fullname"];
	$username = strtoupper($_POST["username"]);
	$password = $_POST["password"];
	$ic_no = $_POST["ic_no"];
	$gender = $_POST["gender"];
	$address = $_POST["address"];
	$city = $_POST["city"];
	$zip = $_POST["zip"];
	$state = $_POST["state"];
	$country = $_POST["country"];
	$phone_no = $_POST["phone_no"];

	if (substr($username, 0, 5) === "STAFF") {
		
		$sql = "SELECT StaffID FROM Staff WHERE Username = '" .$username. "'";
		$result = mysqli_query($conn, $sql);
		$row = mysqli_fetch_assoc($result);
		$count = mysqli_num_rows($result);

		if ($count == 1) {
			echo "<script> alert('Username Already Exist. Use Another Username.'); window.location.href='signup.php';</script>";
		} else {
			$sql = "INSERT INTO staff (FullName, Username, Password, IcNumber, Gender, Address, City, Zip, State, Country, PhoneNo) VALUES ('$fullname', '$username', '$password', '$ic_no', '$gender', '$address', '$city', '$zip', '$state', '$country', '$phone_no')";
		}
		
		
	} else {
		$sql = "SELECT UserID FROM User WHERE Username = '" .$username. "'";
		$result = mysqli_query($conn, $sql);
		$row = mysqli_fetch_assoc($result);
		$count = mysqli_num_rows($result);

		if ($count == 1) {
			echo "<script> alert('Username Already Exist. Use Another Username.'); window.location.href='signup.php';</script>";
		} else {
			$sql = "INSERT INTO user (FullName, Username, Password, IcNumber, Gender, Address, City, Zip, State, Country, PhoneNo) VALUES ('$fullname', '$username', '$password', '$ic_no', '$gender', '$address', '$city', '$zip', '$state', '$country', '$phone_no')";
		}
	}

	if (mysqli_query($conn, $sql)) {
		echo "<script> alert('Successfully Signup!');
		window.location.href='login.php'; </script>";
	} else {
		echo "<script> alert('Error in Signup. Try again!'); </script>";
	}

}

include "footer.php";
?>