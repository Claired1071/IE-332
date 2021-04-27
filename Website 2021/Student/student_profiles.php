<?php
session_start();

//user cannot go to previous page after logged out
if ($_SESSION["active"] == 0) {
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

//retrieving data from database
$sql = "SELECT * FROM Student WHERE Email='" . $_SESSION["s_email"] . "'";
if ($result = mysqli_query($data_base,$sql)) {
    while ($row=mysqli_fetch_row($result))
    {
    	$s_fname = $row[2];
		$s_lname = $row[3];
		$s_email = $row[0];
	    $s_major =  $row[6];
	    $s_GPA =  $row[7];
		$s_courses =  $row[8];
		$s_year =  $row[5];
        $s_wake_time =  $row[9];
        $s_sleep_time =  $row[10];
    }
}

mysqli_close($data_base);
?>


<!DOCTYPE html>
<html>
<!-- getting outside css file-->
<head>
	<title>Student Scheduler</title>
    <link rel="icon" type="image/ico" href="https://web.ics.purdue.edu/~g1117490/main/icon.ico"/>
    <link href="student_create_profile_css.css" rel="stylesheet" type="text/css" />
</head>
<body>
<header class="h1">
      <div class="left-side">
        <img class="banner3" src="https://web.ics.purdue.edu/~g1117490/Main/picture2.png" style= "width:100px">
        <hr class="divider">
        <div class="page-title">
          <p class="title-main">Student Scheduler</p>
          <p class="title">"Redefining Student Scheduling"</p>
        </div>
      </div>
</header>
<h1>Student Profile</h1>
	
<?php
//displaying variables retrieved from database
	printf ("<p><b>%s %s</b></p>",$s_fname,$s_lname);
	printf ("<p><b>Email:</b> %s </p>", $s_email);
	printf ("<p><b>Major:</b> %s </p>", $s_major);
	printf ("<p><b>GPA:</b> %s </p>", $s_GPA);
	printf ("<p><b>Courses:</b> %s </p>", $s_courses);
	printf ("<p><b>Year:</b> %s </p>", $s_year); 
    printf ("<p><b>Preferred General Wake Up Time:</b> %s </p>", $s_wake_time); 
    printf ("<p><b>Preferred General Sleep Time:</b> %s </p>", $s_sleep_time); 
?>

<br>

<p><a href = "student_edit_profile.php" class = "button1">Edit Profile</a></p>
<p><a href="student_main.php" class = "button1">Main Page</a></p>

</div>
</body>
</html>