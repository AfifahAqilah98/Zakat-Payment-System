<?php 

include "header.php";

session_start();

if (!$_SESSION['UserID']) {
	header("location:index.php");
}

if (isset($_GET['ID'])) {
	$id = $_GET['ID'];

	$sql = "SELECT u.FullName AS User, z.ZakatType AS ZakatType, FORMAT(z.Amount,2) AS Amount, DATE_FORMAT(z.DatePay, '%d/%m/%Y') AS ZakatDate, s.FullName AS Staff, z.Status AS Status
		FROM zakatpayment z 
		JOIN user u ON z.UserID = u.UserID
		LEFT JOIN staff s ON z.StaffID = s.StaffID
		WHERE z.ZakatID = '" . $id . "'";

	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_assoc($result);


	$user = $row["User"];
	$zakatType = $row["ZakatType"];
	$amount = $row["Amount"];
	$date = $row["ZakatDate"];
	$staff = $row["Staff"];
	$status = $row["Status"];
} 
?>

<!-- Site Navigation Link List -->
<div id="navigation">
<ul>
	<li><a href="user.php"><img src="img/home.png" id="icon"> Home </a></li>
	<li><a href="user_profile.php"><img src="img/user.png" id="icon"> Profile </a></li>
	<li><a href="user_zakatlist.php" class="active"><img src="img/list.png" id="icon"> Zakat List </a></li>
	<li><a href="logout.php?user=user"><img src="img/logout.png" id="icon"> Logout </a></li>
</ul>
</div>

<!-- Devide content into blocks -->
<div id="content-container">
	<!-- Left block -->
<div id="main">	
<center>
<div id="border2">
	<h2>Zakat Payment Information</h2>
	<p>Name &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp: <?php echo $user; ?></p>
	<p>Zakat Type &nbsp&nbsp&nbsp&nbsp: <?php echo $zakatType; ?></p>
	<p>Amount &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp: RM<?php echo $amount; ?></p>
	<p>Payment Date : <?php echo $date; ?></p>
	<?php 
	if ($status != "In Process") {
		echo "<p>Staff Name &nbsp&nbsp&nbsp&nbsp&nbsp: ".$staff. "</p>";
	}
	?>
	<p>Status&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp: <?php echo $status; ?></p>
</div>
</center>
</div>

<?php
include "footer.php";
?>