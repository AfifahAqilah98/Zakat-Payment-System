<?php 

include "header.php";

session_start();

if (!$_SESSION['StaffID']) {
	header("location:index.php");
}

if (isset($_POST['view'])) {
	$id = $_GET["ID"];
	header("Location: staff_view.php?ID=".$id);
}

if (isset($_POST['submit'])) {
	$id = $_POST['id'];
	$status = $_POST['status'];
	$staff = $_SESSION['StaffID'];

	$sql = "UPDATE ZakatPayment SET StaffID = '" .$staff. "', status = '" .$status. "' WHERE ZakatID = '" .$id. "'"; 

	if (mysqli_query($conn, $sql)) {
		echo "<script> alert('Successfully Update Status!')</script>";
	} else {
		echo "<script> alert('Error. Cannot Update Status!')</script>";
	}
}


$sql = "SELECT z.ZakatID AS ID, u.FullName AS Name, z.ZakatType AS ZakatType, FORMAT(z.Amount,2) AS Amount, DATE_FORMAT(z.DatePay, '%d/%m/%Y') AS ZakatDate, z.Status AS Status
	FROM zakatpayment z
	JOIN user u ON z.UserID = u.UserID
	ORDER BY z.DatePay DESC";

$result = mysqli_query($conn, $sql);

?>

<!-- Site Navigation Link List -->
<div id="navigation">
<ul>
	<li><a href="staff.php"><img src="img/home.png" id="icon"> Home </a></li>
	<li><a href="staff_profile.php"><img src="img/user.png" id="icon"> Profile </a></li>
	<li><a href="staff_zakatlist.php" class="active"><img src="img/list.png" id="icon"> Zakat List </a></li>
	<li><a href="logout.php?user=staff"><img src="img/logout.png" id="icon"> Logout </a></li>
</ul>
</div>

<!-- Devide content into blocks -->
<div id="content-container">
	<!-- Left block -->
<div id="main">	
<center>
<h2>List of Zakat Payment</h2><br><br>

<table border="1" style="width: 80%">
	<tr>
		<th>No.</th>
		<th>Name</th>
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
		<form method='post' action='staff_zakatlist.php?ID=".$row["ID"]."'>
			<td>". $count++ ."</td>
			<td>". $row["Name"] ."</td>
			<td>". $row["ZakatType"] ."</td>
			<td style='text-align: center'>". $row["Amount"] ."</td>
			<td>". $row["ZakatDate"] ."</td>
			<td>". $row["Status"] ."</td>
			<td style='text-align: center'><input type='submit' name='view' value='View'></form>";

			if ($row["Status"] === "In Process") {
				echo " <input type='submit' name='edit' value='Approval' 
				onclick='openSpan(".$row["ID"].")' style='width: 45%;'>";
			}

			
		echo "</td></tr>";
	}
	?>
</table>
<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <h2>Zakat Payment Approval</h2>
    <form method="post" action="staff_zakatlist.php">
    	<input type="text" name="id" id="idZakat" style="display: none;">
	    <p>Approval: <select name="status">
	    	<option value="Approve">Approve</option>
	    	<option value="Disapprove">Disapprove</option>
	    </select></p>
	    <p><input type="submit" name="submit" value="Confirm">
	    	<input type="submit" name="cancel" value="Cancel" style="background-color: #2471A3;"> </p>
    </form>
  </div>

</div>
</center>
</div>

<?php
include "footer.php";
?>