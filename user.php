<?php
include "header.php";

session_start();

if ($_SESSION['UserID']) {
	$sql = "SELECT FullName FROM user WHERE UserID = '" . $_SESSION['UserID'] . "'";
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_assoc($result);
	$name = $row["FullName"];
} else {
	header("location:index.php");
}
?>

<div id="navigation">
<ul>
	<li><a href="user.php" class="active"><img src="img/home.png" id="icon"> Home </a></li>
	<li><a href="user_profile.php"><img src="img/user.png" id="icon"> Profile </a></li>
	<li><a href="user_zakatlist.php"><img src="img/list.png" id="icon"> Zakat List </a></li>
	<li><a href="logout.php?user=user"><img src="img/logout.png" id="icon"> Logout </a></li>
</ul>
</div>

<!-- Devide content into blocks -->
<div id="content-container">
	<!-- Left block -->
<div id="main">	

<center>
	<h1>Hello, <?php echo $name ?> </h1>
	<h3>Welcome To Zakat Payment System.</h3>
	<h3>You Are Login As User.</h3>
</center>
</div>

<?php
include "footer.php";
?>