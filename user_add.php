<?php 

include "header.php";

session_start();

if (!$_SESSION['UserID']) {
	header("location:index.php");
}

if (isset($_POST["submit"])) {
	$zakatType = $_POST["zakat"];
	$amount = $_POST["amount"];

	$sql = "INSERT INTO ZakatPayment (UserID, ZakatType, Amount, DatePay, Status) VALUES 
			('" . $_SESSION["UserID"] . "', '" . $zakatType . "', '" . $amount . "', 
			CURDATE(), 'In Process')";

	if (mysqli_query($conn, $sql)) {
	 	echo "<script> alert('Successfully Add New Zakat Application!');
		window.location.href='user_zakatlist.php'; </script>";
	 } else {
	 	echo $sql;
	 }
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
	<h2><h2>New Zakat Payment</h2></h2>
	<form method="post" action="user_add.php">
		<p>Zakat Type* &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp: <select name="zakat" onchange="zakatChose()" id="zakatType" required="">
			<option value="">Choose Zakat Type</option>
			<option value="Zakat Pendapatan">Zakat Pendapatan</option>
			<option value="Zakat Fitrah">Zakat Fitrah</option>
		</select></p>
		<span id="zakatPndptn">
			<p>Monthly Income (RM)* : <input type="number" name="income" placeholder="Enter Monthly Income" id="income" onchange="calcRate(this.value)"></p>
			<p>Pay for a year (RM) &nbsp&nbsp&nbsp&nbsp: <input type="text" name="payYear" readonly="" id="payYear"></p>
			<p style="font-size: 12px; font-style: italic;">(monthly income x 12) x 2.5%</p>
			<p>Pay for a month (RM) &nbsp: <input type="text" name="payMonth" readonly="" id="payMonth"></p>
			<p style="font-size: 12px; font-style: italic;">monthly income x 2.5%</p>
			<p>Pay for* &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp: <select name="pay" onchange="payType()" id="pay">
				<option value="">Choose option</option>
				<option value="Month">Month</option>
				<option value="Year">Year</option>
			</select></p>
		</span>
		<span id="zakatFitrah">
			<p>No. of Pax (RM)* &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp: <input type="number" name="pax" id="pax" onchange="calAmount(this.value)"></p>
		</span>
		<p>Amount of Zakat (RM) : <input type="text" name="amount" id="zakatAmount" placeholder="0.00" readonly="" required=""></p>
		<p style="font-size: 14px;">* Please enter all required fields</p>
		<p><input type="submit" name="submit" value="Confirm">
			<input type="reset" name="reset" value="Reset"></p>
	</form>
</div>

</center>
</div>

<?php
include "footer.php";
?>