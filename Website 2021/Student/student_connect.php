<?php

//Establishing connection to MySQL database
$servername = "mydb.itap.purdue.edu";
$username = "g1117490";
$password = "iegroup9";
$dbname = "g1117490";

$data_base = mysqli_connect($servername, $username, $password, $dbname);

if(!$data_base){
die("Connection failed: " . mysqli_connect_error());
}
// echo "Connection established";

?>
