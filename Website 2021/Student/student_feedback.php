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
          
<p><strong>If you found yourself putting in more hours than suggested, please list the additional amount of hours:</strong> <input type="text" name = "feedback_morehours" placeholder="Ex. 1" Required></p>

<p><strong>If you found yourself putting in less hours than suggested, please list the additional amount of hours that you did not need:</strong> <input type="text" name = "feedback_lesshours" placeholder="Ex. 1" Required></p>
          
<p><strong>Did you find the suggested number of hours sufficient? </strong><select name="feedback_hours">
<option value="Yes">Yes</option>
<option value="No">No</option>
</select></p>

<p><input type="submit" class = "button1" value = "Submit Feedback"></p>
</form>
<!--message for submission-->
<div class="message"><?php if($message!="") { echo $message; } ?></div>

<?php
mysqli_close($data_base);
?>

<p><a href="student_main.php" class = "button1">Back to Main</a></p>

</body>
</html>
