<!DOCTYPE html>
<html>

<!-- importing external css file-->

<head>
	<title>Student Scheduler</title>
    <link rel="icon" type="image/ico" href="https://web.ics.purdue.edu/~g1117490/main/ie.ico"/>
    <link href="advisor_create_profile_css.css" rel="stylesheet" type="text/css" />
</head>
<body>
    <header class="h1">
      <div class="left-side">
        <img class="banner3" src="https://www.flaticon.com/svg/vstatic/svg/4185/4185688.svg?token=exp=1618089495~hmac=84e1937dad55bad2ee74e52fe392a686" style= "width:250px">
        <hr class="divider">
        <div class="page-title">
          <p class="title-main">Student Scheduler</p>
          <p class="title">Redefining student scheduling</p>
        </div>
      </div>
      <img class="banner1" src="https://www.flaticon.com/svg/vstatic/svg/4185/4185823.svg?token=exp=1618088399~hmac=85714128e97e4f96030e0e83ec09bc99" style= "width:100px">
    </header>

	<h1>Hello! <?php echo $_POST["Fname"]; ?></h1>
	<p>Confirming email address provided: <?php echo $_POST["Email"]; ?></p>
	
	<?php

	if ($_POST["Email"] == "") {
		header("Location:  advisor_login.php");
	}

	//Connecting to database
	$servername = "mydb.itap.purdue.edu";
	$username = "g1117490";
	$password = "iegroup9";
	$dbname = "g1117490";

	$data_base = mysqli_connect($servername, $username, $password, $dbname);

	if (mysqli_connect_errno()) {
	    printf("Connection failed: %s\n", mysqli_connect_error());
	    exit();
	}
	
	//pulling variable values from student form

	$s_email = $_POST['Email'];
	$s_password = $_POST['Password'];
	$s_fname = $_POST['Fname'];
	$s_lname = $_POST['Lname'];
	$s_number = $_POST['Pnumber'];
	$s_major = $_POST['Major'];
	$s_GPA = $_POST['GPA'];
	$s_courses = $_POST['Courses'];
	$s_year = $_POST['Year'];
		
	//checking the database to see if an email address already exists
	$check = mysqli_query($data_base, "SELECT * FROM Advisor WHERE Email = '$a_email'");
	if(mysqli_num_rows($check) > 0){
		echo "An account already exists with this email" . "<br>" . "<br>";
	}else{
		//Advisor information stored within database
		$sql = "INSERT INTO Advisor (Email, Password, Fname, Lname, Pnumber)
		VALUES('" . $a_email . "', '" . $a_password . "', '" . $a_fname . "', '" . $a_lname . "', '" . $a_number . "'WHERE Email = '" . $_SESSION["a_email"] . "'";
		//Redirecting to Login page
		if (mysqli_query($data_base, $sql)) {
			echo "<p>Please login to access your account</p>";
			shell_exec("Rscript /home/campus/g1117490/www/main/Project_R/matchingInputs.R");
		} else {
			echo "Error: " . $sql . "<br>" . mysqli_error($data_base);
		}
	}
	mysqli_close($data_base);

	?>
<p><a href = "advisor_login.php" class = "button1">Login Page</a></p>
</body>
</html>
