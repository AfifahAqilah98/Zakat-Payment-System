<?php 

include "header.php";

session_start();

if (!$_SESSION['UserID']) {
	header("location:index.php");
}


if (isset($_POST['view'])) {
	$id = $_GET["ID"];
	header("Location: user_view.php?ID=".$id);
}

if (isset($_POST['delete'])) {
	$id = $_GET["ID"];
	
	$sql = "DELETE FROM ZakatPayment WHERE ZakatID = '" .$id. "'";

	if (mysqli_query($conn, $sql)) {
		echo "<script> alert('Successfully Delete!')</script>";
	} else {
		echo "<script> alert('Error. Cannot Delete!')</script>";
	}
}


$sql = "SELECT z.ZakatID AS ID, z.ZakatType AS ZakatType, FORMAT(z.Amount,2) AS Amount, DATE_FORMAT(z.DatePay, '%d/%m/%Y') AS ZakatDate, z.Status AS Status
	FROM zakatpayment z
	JOIN user u ON z.UserID = u.UserID
	WHERE u.UserID = '". $_SESSION['UserID']. "'
	ORDER BY z.DatePay DESC";

$result = mysqli_query($conn, $sql);

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
<h2>List of Zakat Payment</h2><br>

<p style="text-align: right;"><input type="submit" name="add" value="New Zakat Payment" onclick="add()"></p>
<table border="1">
	<tr>
		<th>No.</th>
		<th>Zakat Type</th>
		<th>Amount (RM)</th>
		<th>Payment Date</th>
		<th>Status</th>
		<th>Option</th>
	</tr>

	<?php 
	$count = 1;

	while ($row = mysqli_fetch_assoc($result)) {
		echo "<tr>
		<form method='post' action='user_zakatlist.php?ID=".$row["ID"]."'>
			<td>". $count++ ."</td>
			<td>". $row["ZakatType"] ."</td>
			<td style='text-align: center'>". $row["Amount"] ."</td>
			<td>". $row["ZakatDate"] ."</td>
			<td>". $row["Status"] ."</td>
			<td style='text-align: center'><input type='submit' name='view' value='View'>";

			if ($row["Status"] === "In Process") {
				echo " <input type='submit' name='delete' value='Delete'>";
			}

		echo "</td></form></tr>";
	}
	?>
</table>

</center>
</div>

<?php
include "footer.php";
?>