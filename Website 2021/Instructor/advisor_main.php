<?php
session_start();
//does not allow advisor to use back arrow after logging out
if ($_SESSION["log"] == 0) {
	header("Location: advisor_login.php");
}

?>

<!DOCTYPE html>
<html>
<!-- importing css from external file-->
<head>
	<title>Student Scheduler</title>
    <link rel="icon" type="image/ico" href="https://web.ics.purdue.edu/~g1117490/main/ie.ico"/>
    <link href="advisor_create_profile_css.css" rel="stylesheet" type="text/css" />
</head>
<body>
    <header class="h1">
      <div class="left-side">
        <img class="banner3" src="https://image.flaticon.com/icons/png/512/123/123392.png" style= "width:250px">
        <hr class="divider">
        <div class="page-title">
          <p class="title-main">Student Scheduler</p>
          <p class="title">Redefining student scheduling</p>
        </div>
      </div>
      <img class="banner1" src="https://image.flaticon.com/icons/png/512/60/60785.png" style= "width:100px">
    </header>
	
	<!-- buttons to navigate advisor pages-->
	<h1>Main Page</h1>
    <div id = "sideR">
	<p><a href = "advisor_profile.php" class = "button1">Profile Page</a></p>
	<p><a href = "advisor_exam.php" class = "button1">Create Exam</a></p>
	<p><a href = "advisor_assignment.php" class = "button1">Create Assignment</a></p>
	<p><a href = "advisor_logout.php" class = "button1">Logout</a></p>
	<br>
</body>
</html>
