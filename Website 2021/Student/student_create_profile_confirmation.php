<!DOCTYPE html>
<html>

<!-- retrieving external css file-->

<head>
	<title>Student Scheduler</title>
    <link rel="icon" type="image/ico" href="https://web.ics.purdue.edu/~g1117490/Main/ie.ico"/>
    <link href="student_create_profile_css.css" rel="stylesheet" type="text/css" />
</head>
<body>
    <header class="h1">
      <div class="left-side">
        <img class="banner3" src="https://www.flaticon.com/svg/vstatic/svg/4185/4185688.svg?token=exp=1618277116~hmac=cbc9ee8049bc4abca2b26f462e4ad900" style= "width:100px">
        <hr class="divider">
        <div class="page-title">
          <p class="title-main">Student Scheduler</p>
          <p class="title">Redefining student scheduling</p>
        </div>
	    </div>
    </header>

	<h1>Hello! <?php echo $_POST["Fname"]; ?></h1>
	<p>Confirming email address: <?php echo $_POST["Email"]; ?></p>
	
	<?php

	if ($_POST["Email"] == "") {
		header("Location:  student_login.php");
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
	
	//retrieving variable values from student create profile 

	$s_email = $_POST['Email'];
	$s_password = $_POST['Password'];
	$s_fname = $_POST['Fname'];
	$s_lname = $_POST['Lname'];
	$s_ID = $_POST['Student_ID'];
	$s_major = $_POST['Major'];
	$s_GPA = $_POST['GPA'];
	$s_courses = $_POST['Courses'];
	$s_year = $_POST['Year'];
		
	//checking database if email address is already existent
	$check = mysqli_query($data_base, "SELECT * FROM Student WHERE Email = '$s_email'");
	if(mysqli_num_rows($check) > 0){
		echo "Account already exists with this email" . "<br>" . "<br>";
	}else{
		//Student information stored in database
		$sql = "INSERT INTO Student (Email, Password, Fname, Lname, Major, GPA, Courses, Year)
		VALUES('" . $s_email . "', '" . $s_password . "', '" . $s_fname . "', '" . $s_lname . "', '" . $s_major . "', '" . $s_GPA . "', '" . $s_courses . "', '" . $s_year . "')";
	
		//directing to Login page
		if (mysqli_query($data_base, $sql)) {
			echo "<p>Please login to access your account</p>";
			shell_exec("Rscript /home/campus/g1117490/www/Main/r/Scheduling_Algorithm.R");
		} else {
			echo "Error: " . $sql . "<br>" . mysqli_error($data_base);
		}
	}
	mysqli_close($data_base);

	?>
<p><a href = "student_login.php" class = "button1">Login</a></p>
</body>
</html> 
