<p>&nbsp;</p>
<!-- importing css from external file-->
<p>&nbsp;</p>
<p></p>
<header class="h1">
<div class="left-side"><img class="banner3" src="https://www.flaticon.com/svg/vstatic/svg/4185/4185688.svg?token=exp=1618277116~hmac=cbc9ee8049bc4abca2b26f462e4ad900" /><hr class="divider" />
<div class="page-title">
<p class="title-main">Student Scheduler</p>
<p class="title">Redefining student scheduling</p>
</div>
</div>
</header>
<h1>Feedback</h1>
<p>Feedback</p>
<!-- feedback form--><form action="advisor_create_assignment.php" method="post">
<p><strong>Course: </strong><select name="Assignment or Exam Title"></select></p>
<p><strong>Assignment for Feedback: </strong><select name="Assignment Title"></select></p>
<p><strong>Exam for Feedback: </strong><select name="Exam Title"></select></p>
</form><form action="" method="post">
<p><strong>If you found yourself putting in more hours than suggested, please list the additional amount of hours:</strong> <input name="feedback_morehours" required="" type="text" placeholder="Ex. 1" /></p>
<p><strong>If you found yourself putting in less hours than suggested, please list the additional amount of hours that you did not need:</strong> <input name="feedback_lesshours" required="" type="text" placeholder="Ex. 1" /></p>
<p><strong>If you found that the suggested number of hours is sufficent, please indicate a "0" for both entries above.</strong>
<p><input class="button1" type="submit" value="Submit Feedback" /></p>
</form><form action="student_feedback.php" method="post"><!--message for submission-->
<div class="message">&nbsp;</div>
<!--?php 
mysqli_close($data_base);
?-->
<p><a class="button1" href="student_main.php">Back to Main</a></p>
</form>
