<?php
include "header.php";

session_start();

if ($_SESSION['StaffID']) {
	$sql = "SELECT FullName FROM staff WHERE StaffID = '" . $_SESSION['StaffID'] . "'";
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_assoc($result);
	$name = $row["FullName"];
} else {
	header("location:index.php");
}
?>

<!-- Site Navigation Link List -->
<div id="navigation">
<ul>
	<li><a href="staff.php" class="active"><img src="img/home.png" id="icon"> Home </a></li>
	<li><a href="staff_profile.php"><img src="img/user.png" id="icon"> Profile </a></li>
	<li><a href="staff_zakatlist.php"><img src="img/list.png" id="icon"> Zakat List </a></li>
	<li><a href="logout.php?user=staff"><img src="img/logout.png" id="icon"> Logout </a></li>
</ul>
</div>

<!-- Devide content into blocks -->
<div id="content-container">
	<!-- Left block -->
<div id="main">	

<center>
	<h1>Hello, <?php echo $name ?> </h1>
	<h3>Welcome To Zakat Payment System.</h3>
	<h3>You Are Login As Staff.</h3>
</center>

<!--
<div id="sidebar">
<ul>
	<li id="user">Hello, <br> <?php //echo $name ?></li>
	<li><a href="#">Profile</a></li>
	<li><a href="#">Zakat List</a></li>
	<li><a href="logout.php?user=staff">Logout</a></li>
</ul>
</div>

<div id="block-content">
	<h3 style="padding-top: 5%;">WELCOME TO ZAKAT PAYMENT SYSTEM.</h3>
	<h3 style="padding-bottom: 15%;">YOU ARE LOGIN AS STAFF.</h3>
</div>
-->
</div>

<?php
include "footer.php";
?>