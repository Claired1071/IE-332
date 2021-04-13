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
        <img class="banner3" src="https://www.flaticon.com/svg/vstatic/svg/4185/4185688.svg?token=exp=1618277116~hmac=cbc9ee8049bc4abca2b26f462e4ad900">
        <hr class="divider">
        <div class="page-title">
          <p class="title-main">Student Scheduler</p>
          <p class="title">Redefining student scheduling</p>
        </div>
      </div>
    </header>
    <h1> Feedback </h1>
    <p> Feedback </p>
      <!-- feedback form-->
      <form action = "advisor_create_assignment.php" method="post">
        
        <p><strong>Course: </strong>
        <select type = "text" name = "Assignment or Exam Title">
        </select></p>
        
      <p><strong>Assignment for Feedback: </strong>
        <select type = "text" name = "Assignment Title">
        </select></p>
        
              <p><strong>Exam for Feedback: </strong>
        <select type = "text" name = "Exam Title">
        </select></p>
        
        
        <form action="" method="post">


<p><strong>Did you find yourself having to put in more hours than was suggested? </strong><select name="feedback_morehours">
<option value="Yes">Yes</option>
<option value="No">No</option>
</select></p>
          
<p><strong>If so, how many more hours did you have to study/work on the assignment for?</strong> <input type="text" name = "feedback_lesshours" placeholder="Enter number of hours" Required></p>

<p><strong>Did you find yourself not needing to put in as many hours as was suggested? </strong><select name="feedback_lesshours">
<option value="Yes">Yes</option>
<option value="No">No</option>
</select></p>

<p><strong>If so, how many less hours did you not have to study/work on the assignment for?</strong> <input type="text" name = "Feedback" placeholder="Enter number of hours" Required></p>
<p><input type="submit" class = "button1" value = "Submit rating"></p>
</form>
<!--message for submission-->
<div class="message"><?php if($message!="") { echo $message; } ?></div>

<?php
mysqli_close($data_base);
?>

<p><a href="student_main.php" class = "button1">Back to Main</a></p>

</body>
</html>
