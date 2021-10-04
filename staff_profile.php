<?php
include "header.php";

session_start();

if (isset($_POST['submit'])) {
	$fullname = $_POST["fullname"];
	$password = $_POST["password"];
	$ic_no = $_POST["ic_no"];
	$gender = $_POST["gender"];
	$address = $_POST["address"];
	$city = $_POST["city"];
	$zip = $_POST["zip"];
	$state = $_POST["state"];
	$country = $_POST["country"];
	$phone_no = $_POST["phone_no"];

	$sql = "UPDATE staff SET FullName = '".$fullname."', Password = '".$password.
		"', IcNumber = '".$ic_no."', Gender = '".$gender."', Address = '".$address.
		"', City = '".$city."', Zip = '".$zip."', State = '".$state."', PhoneNo = '".$phone_no.
		"' WHERE StaffID = '".$_SESSION['StaffID']."'";

	if (mysqli_query($conn, $sql)) {
		echo "<script> alert('Successfully Update Profile!')</script>";
	} else {
		echo "<script> alert('Error. Cannot Update Profile!')</script>";
	}
}

if ($_SESSION['StaffID']) {
	$sql = "SELECT * FROM staff WHERE StaffID = '" . $_SESSION['StaffID'] . "'";
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_assoc($result);


	$fullname = $row["FullName"];
	$username = $row["Username"];
	$password = $row["Password"];
	$ic_no = $row["IcNumber"];
	$gender = $row["Gender"];
	$address = $row["Address"];
	$city = $row["City"];
	$zip = $row["Zip"];
	$state = $row["State"];
	$country = $row["Country"];
	$phone_no = $row["PhoneNo"];
} else {
	header("location:index.php");
}
?>

<!-- Site Navigation Link List -->
<div id="navigation">
<ul>
	<li><a href="staff.php"><img src="img/home.png" id="icon"> Home </a></li>
	<li><a href="staff_profile.php"  class="active"><img src="img/user.png" id="icon"> Profile </a></li>
	<li><a href="staff_zakatlist.php"><img src="img/list.png" id="icon"> Zakat List </a></li>
	<li><a href="logout.php?user=staff"><img src="img/logout.png" id="icon"> Logout </a></li>
</ul>
</div>

<!-- Devide content into blocks -->
<div id="content-container">
	<!-- Left block -->
<div id="main">	
<center>
<div id="border2">
	<h2>Staff Profile</h2>
	<form method="post" action="">
		<form method="post" action="staff_profile.php">
		<p>Full Name* &nbsp&nbsp: <input type="text" name="fullname" value="<?php echo  $fullname?>" required=""></p>
		<p>Username* &nbsp&nbsp: <input type="text" name="username" value="<?php echo  $username?>" readonly="" style="text-transform: uppercase;" minlength="6"></p>
		<p>Password* &nbsp&nbsp&nbsp: <input id="pass" type="password" name="password" value="<?php echo  $password?>" required="" > <span id="show"  onclick="show()"><img src="img/show.png" width="25" height="20">
			<span id="showtext">show password</span></span>
			<span id="hide" onclick="hide()"><img src="img/hide.png" width="25" height="20">
			<span id="hidetext">hide password</span></span></p>
		<p>MyCard No.* : <input type="text" name="ic_no" value="<?php echo  $ic_no?>" maxlength="12" required=""></p>
		<p>Gender* &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp: 
		<input type="radio" name="gender" value="Male" <?php if ($gender === 'Male') { echo "checked";} ?> required>Male 
		<input type="radio" name="gender" value="Female" <?php if ($gender === 'Female') { echo "checked";} ?> required>Female</p>
		<p>Address* &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp: <textarea name="address"><?php echo  $address?></textarea></p>
		<p>City* &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp: <input type="text" name="city" value="<?php echo  $city?>" required=""></p>
		<p>Postcode* &nbsp&nbsp&nbsp&nbsp: <input type="number" name="zip" value="<?php echo  $zip?>" required=""></p>
		<p>State* &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp: <select name="state">
			<option value="Johor" <?php if ($state === 'Johor') { echo "selected";} ?>>Johor</option>
			<option value="Kedah" <?php if ($state === 'Kedah') { echo "selected";} ?>>Kedah</option>
			<option value="Kelantan" <?php if ($state === 'Kelantan') { echo "selected";} ?>>Kelantan</option>
			<option value="Kuala Lumpur" <?php if ($state === 'Kuala Lumpur') { echo "selected";} ?>>Kuala Lumpur</option>
			<option value="Labuan" <?php if ($state === 'Labuan') { echo "selected";} ?>>Labuan</option>
			<option value="Melaka" <?php if ($state === 'Melaka') { echo "selected";} ?>>Melaka</option>
			<option value="Negeri Sembilan" <?php if ($state === 'Negeri Sembilan') { echo "selected";} ?>>Negeri Sembilan</option>
			<option value="Pahang" <?php if ($state === 'Pahang') { echo "selected";} ?>>Pahang</option>
			<option value="Perak" <?php if ($state === 'Perak') { echo "selected";} ?>>Perak</option>
			<option value="Perlis" <?php if ($state === 'Perlis') { echo "selected";} ?>>Perlis</option>
			<option value="Pulau Pinang" <?php if ($state === 'Pulau Pinang') { echo "selected";} ?>>Pulau Pinang</option>
			<option value="Putrajaya" <?php if ($state === 'Putrajaya') { echo "selected";} ?>>Putrajaya</option>
			<option value="Sabah" <?php if ($state === 'Sabah') { echo "selected";} ?>>Sabah</option>
			<option value="Sarawak" <?php if ($state === 'Sarawak') { echo "selected";} ?>>Sarawak</option>
			<option value="Selangor" <?php if ($state === 'Selangor') { echo "selected";} ?>>Selangor</option>
			<option value="Terengganu" <?php if ($state === 'Terengganu') { echo "selected";} ?>>Terengganu</option>
		</select></p>
		<p>Country* &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp: <input type="text" name="country" value="<?php echo  $country?>" readonly=""></p>
		<p>Phone No.* &nbsp&nbsp: <input type="text" name="phone_no" value="<?php echo  $phone_no?>" required=""></p>
		<p style="font-size: 14px;">* Please enter all required fields</p>
		<p><input type="submit" name="submit" value="Update"></p>
	</form>
	</form>
</div>
</center>
</div>

<?php
include "footer.php";
?>