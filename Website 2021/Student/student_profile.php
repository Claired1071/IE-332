<?php
session_start();

//does not allow student to use back arrow after logging out
if ($_SESSION["log"] == 0) {
	header("Location:  student_login.php");
}

//Connecting to database
$servername = "mydb.itap.purdue.edu";
$username = "g1117490";
$password = "iegroup9";
$dbname = "g1117490";

$data_base = mysqli_connect($servername, $username, $password, $dbname);

if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

//Pulling info from sql
$sql = "SELECT * FROM Student WHERE Email='" . $_SESSION["s_email"] . "'";
if ($result = mysqli_query($data_base,$sql)) {
    /* free result set */
    while ($row=mysqli_fetch_row($result))
    {
    	$s_fname = $row[2];
		$s_lname = $row[3];
		$s_email = $row[0];
	    $s_major =  $row[5];
	    $s_GPA =  $row[7];
		$s_courses =  $row[9];
		$s_year =  $row[10];
    }
	  // Free result set
	  //mysqli_free_result($result);
}

$filename = "studentPlot".rand(1,50);

shell_exec("Rscript /home/campus/g1117490/www/main/Project_R/matchPlotStudents.R $s_email $filename");

mysqli_close($data_base);
?>


<!DOCTYPE html>
<html>
<!-- importing css from external file-->
<head>
	<title>Student Scheduler</title>
    <link rel="icon" type="image/ico" href="https://web.ics.purdue.edu/~g1117490/main/ie.ico"/>
    <link href="studentForm.css" rel="stylesheet" type="text/css" />
</head>
<body>
<header class="h1">
      <div class="left-side">
        <img class="banner3" src="https://image.flaticon.com/icons/png/512/123/123392.png" style= "width:250px">
        <hr class="divider">
        <div class="page-title">
          <p class="title-main">Student Scheduler</p>
          <p class="title">Redefining Student Scheduling</p>
        </div>
      </div>
      <img class="banner1" src="https://image.flaticon.com/icons/png/512/60/60785.png" style= "width:100px">
</header>
<h1>Student Profile</h1>
	
<?php
//printing each variable gotten from database
	printf ("<p><b>%s %s</b></p>",$s_fname,$s_lname);
	printf ("<p><b>Email:</b> %s </p>", $s_email);
	printf ("<p><b>Major:</b> %s </p>", $s_major);
	printf ("<p><b>GPA:</b> %s </p>", $s_GPA);
	printf ("<p><b>Courses:</b> %s </p>", $s_courses);
	printf ("<p><b>Year in School:</b> %s </p>", $s_year); 
?>

<br>
<p>
	<b>Statistics:<br><br></b>
	<img src="https://web.ics.purdue.edu/~g1116905/main/Project_R/plots/<?php echo $filename;?>.png" />
</p>

<p><a href = "student_edit_profile.php" class = "button1">Update Profile</a></p>
<p><a href="student_main.php" class = "button1">Main Page</a></p>

</div>
</body>
</html>
