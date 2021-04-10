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
    <link rel="icon" type="image/ico" href="https://web.ics.purdue.edu/~g1117490/main/ie.ico"/>
    <link href="student_create_profile_css.css" rel="stylesheet" type="text/css" />
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
	<!-- buttons to go to other pages-->
<h1>Main</h1>
<div id="sideR">
<p><a class="button1" href="student_profile.php">Profile</a></p>
<p><a class="button1" href="student_events.php">Events</a></p>
<p><a class="button1" href="student_schedule.php">Schedule</a></p>
<p><a class="button1" href="student_feedback.php">Feedback</a></p>
<p><a class="button1" href="student_logout.php">Logout</a></p>
<br />
<p><em>Thank you for using Student Scheduler!</em></p>
</div>
