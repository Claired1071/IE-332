<?php
session_start();

if ($_SESSION["active"] == 1) {
	header("Location: student_main.php");
}
$message = "";
if(count($_POST)>0) {
	$servername = "mydb.itap.purdue.edu";
	$username = "g1117490";
	$password = "iegroup9";
	$dbname = "g1117490";	
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	$result = mysqli_query($conn,"SELECT * FROM Student WHERE Email='" . $_POST["s_email"] . "' AND Password = '". $_POST["s_password"]."'");
	$count  = mysqli_num_rows($result);
	if($count==0) {
		$message = "Incorrect username or password";
	} else {
		header("Location: student_main.php");
		
		$_SESSION["log"] = 1;

		$_SESSION["s_email"] =  $_POST["s_email"];
	}
	mysqli_close($conn);
}
?>
<!DOCTYPE html>
<html>
<!-- importing css from external file-->
	<head>
		<title>Student Scheduler</title>
		<link rel="icon" type="image/ico" href="https://web.ics.purdue.edu/~g1116905/main/ie.ico"/>
		<link href="student_login_css.css" rel="stylesheet" type="text/css">
	</head>
	<body>
		<img class="logo" src="https://image.flaticon.com/icons/png/512/123/123392.png">
		<div class="login-container">
			<h2 class="title">Hello!</h2>
			<form action="" method = "post">
				<div class="form">
					<label for="s_email">Email:</label>
				    <input class="input" type="email" id="s_email" name="s_email" placeholder="Email address" required>
				</div>
			    <br>
			    <div class="form">
			    	<label for="s_pass">Password:</label>
				    <input class="input" type="password" id="s_pass" name="s_pass" placeholder="Password" required>
					<input type="checkbox" onclick="myFunction()">Show Password
					<script>
					<!--When box checked password is shown-->
					function myFunction() {
						var x = document.getElementById("s_password");
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
			<p><a class="new-account" href="student_create_profile.php" target="_self" >Create Account</a></p>
			<p><a class="new-account" href="https://web.ics.purdue.edu/~g1117490/Main/Main_Page.php" target="_self" >Home Page</a></p>
		</div>
	</body>
</html>
