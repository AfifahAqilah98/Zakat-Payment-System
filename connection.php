<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "zakat_db";

/*
$servername = "localhost";
$username = "b031910267";
$password = "980306146472";
$dbname = "student_b031910267";
*/

$conn = new mysqli($servername, $username, $password,$dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
} 

?>