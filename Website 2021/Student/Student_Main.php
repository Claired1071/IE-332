<!--?php 
session_start();
//user cannot go back after logging out
if ($_SESSION["active"] == 0) {
	header("Location:  student_login.php");
}
?-->
<p>&nbsp;</p>
<p>&nbsp;</p>
<!-- importing css from external file-->
<p>&nbsp;</p>
<p></p>
<header class="h1">
<div class="left-side"><img class="banner3" style="width: 250px;" src="https://image.flaticon.com/icons/png/512/123/123392.png" /><hr class="divider" />
<div class="page-title">
<p class="title-main">Student Scheduler</p>
<p class="title">Redefining student scheduling</p>
</div>
</div>
<img class="banner1" style="width: 100px;" src="https://image.flaticon.com/icons/png/512/60/60785.png" /></header><!-- buttons to go to other pages-->
<h1>Main</h1>
<div id="sideR">
<p><a class="button1" href="Student_Profile.php">Profile</a></p>
  <p><a class="button1" href="Student_Events.php">Events</a></p>
  <p><a class="button1" href="Student_Feedback.php">Feedback</a></p>
<p><a class="button1" href="Student_Logout.php">Logout</a></p>
<br />
<p><em>Thank you for using Student Scheduler!</em></p>
</div>
