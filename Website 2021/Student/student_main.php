<?php 
session_start();
//user cannot go back after logging out
if ($_SESSION["active"] == 0) {
	header("Location:  student_login.php");
}
?>
<!DOCTYPE html>
<html>
<!-- importing css from external file-->
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
          <p class="title">Redefining student scheduling</p>
        </div>
      </div>
    </header>
	<!-- buttons to go to other pages-->
<h1>Main</h1>
<div id="sideR">
<p><a class="button1" href="student_profiles.php">View Profile</a></p>
<p><a class="button1" href="student_edit_profile.php">Edit Profile</a></p>
<p><a class="button1" href="student_create_event.php"> Create Event</a></p>
<p><a class="button1" href="student_events.php">View Events</a></p>
<p><a class="button1" href="student_schedule.php">View Schedule</a></p>
<p><a class="button1" href="student_feedback.php">Provide Feedback</a></p>
<p><a class="button1" href="student_statistics.php">View Past Student Statistics</a></p>
<p><a class="button1" href="student_logout.php">Logout</a></p>
<br />
<p><em>Thank you for using Student Scheduler!</em></p>
</div>
