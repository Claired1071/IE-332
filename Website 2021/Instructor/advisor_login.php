<?php
session_start();

if ($_SESSION["active"] == 1) {
	header("Location: advisor_main.php");
}
$message = "";
if(count($_POST)>0) {
	$servername = "mydb.itap.purdue.edu";
	$username = "g1117490";
	$password = "$iegroup9";
	$dbname = "g1117490";	
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	$result = mysqli_query($conn,"SELECT * FROM Advisor WHERE Email='" . $_POST["a_email"] . "' AND Password = '". $_POST["a_password"]."'");
	$count  = mysqli_num_rows($result);
	if($count==0) {
		$message = "Incorrect username or password";
	} else {
		header("Location: advisor_main.php");
		
		$_SESSION["log"] = 1;

		$_SESSION["a_email"] =  $_POST["a_email"];
	}
	mysqli_close($conn);
}
?>
<!DOCTYPE html>
<html>
<!-- importing css from external file-->
	<head>
		<title>Student Scheduler</title>
		<link rel="icon" type="image/ico" href="https://web.ics.purdue.edu/~g1117490/main/ie.ico"/>
		<link href="login.css" rel="stylesheet" type="text/css">
	</head>
	<body>
		<img class="logo" src="https://image.flaticon.com/icons/png/512/123/123392.png">v
		<div class="login-container">
			<h2 class="title">Hello!</h2>
			<form action="" method = "post">
				<div class="form">
					<label for="a_email">Email:</label>
				    <input class="input" type="email" id="a_email" name="a_email" placeholder="Email address" required>
				</div>
			    <br>
			    <div class="form">
			    	<label for="s_pass">Password:</label>
				    <input class="input" type="password" id="a_pass" name="a_pass" placeholder="Password" required>
					<input type="checkbox" onclick="myFunction()">Show Password
					<script>
					<!-- java function for showing password after checking box-->
					function myFunction() {
						var x = document.getElementById("a_password");
						if (x.type === "password") {
							x.type = "text";
						} else {
							x.type = "password";
						}
					}
					</script>
			    </div>
			    <br>
				<div class="message"><?php if($message!="") { echo $message; } ?></div>
			    <br>
			    <input class="sign-in" type="submit" value="Sign in">
			</form>
			<p> New user? Create an account below!</p>
			<p><a class="new-account" href="advisor_create_profile.php" target="_self" >Create Account</a></p>
			<p><a class="new-account" href="https://web.ics.purdue.edu/~g1117490/main/advisor_main.php" target="_self" >Home Page</a></p>
		</div>
	</body>
</html>
