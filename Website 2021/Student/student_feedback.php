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
          <p class="title">"Redefining student scheduling"</p>
        </div>
      </div>
    </header>
    <h1> Feedback </h1>
    <p> Feedback </p>
      <!-- feedback form-->
    <form action="advisor_create_assignment.php" method="post">
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
<p><a class="button1" href="student_main.php">Main Page</a></p>
	</form>
</body>
</html>
