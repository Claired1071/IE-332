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
        <img class="banner3" src="https://image.flaticon.com/icons/png/512/123/123392.png" style= "width:250px">
        <hr class="divider">
        <div class="page-title">
          <p class="title-main">Student Scheduler</p>
          <p class="title">Redefining student scheduling</p>
        </div>
      </div>
      <img class="banner1" src="https://image.flaticon.com/icons/png/512/60/60785.png" style= "width:100px">
    </header>
    <h1> Feedback </h1>
    <p> Feedback </p>
      <!-- feedback form-->
      <form action = "advisor_create_assignment.php" method="post">
      <p><strong>Assignment or Exam would like to give feedback: </strong>
        <select type = "text" name = "Assignment or Exam Title">
        </select></p>
	<p><strong>Please Provide Feedback:</strong> <input type="text" name = "Feedback" placeholder="Enter Feedback" Required></p>
	<p><input type="submit" class = "button1" value="Submit Feedback" /></p>
	</form>
</body>
</html>