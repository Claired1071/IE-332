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
	<div class="left-side"><img class="banner3" style="width: 250px;" src="https://www.flaticon.com/svg/vstatic/svg/4185/4185688.svg?token=exp=1618089495~hmac=84e1937dad55bad2ee74e52fe392a686" /><hr class="divider" />        <hr class="divider">
        <div class="page-title">
          <p class="title-main">Student Scheduler</p>
          <p class="title">Redefining student scheduling</p>
        </div>
      </div>
      <img class="banner1" style="width: 100px;" src="https://www.flaticon.com/svg/vstatic/svg/4185/4185823.svg?token=exp=1618088399~hmac=85714128e97e4f96030e0e83ec09bc99" /></header>
    </header>
    <h1> Assignment Creation</h1> 

      <p>Create Assignment</p>
      <!-- creating Assignment form-->
      <form action = "advisor_create_assignment.php" method="post">
      <p><strong>Course ID: </strong> <input type="text" name = "Course_ID" placeholder="Enter Course ID" Required></p>
      <p><strong>Assignment Title: </strong> <input type="text" name = "Assignment_Name" placeholder="Enter Assignment Title" Required></p>
      <p><strong>Assignment Due Date: </strong> <input type="date" name = "Due_Date" placeholder="Enter Assignment Due Date" Required></p>
      <p><strong>Assignment Due Time: </strong> <input type="time" name = "Due_Time" placeholder="Enter Assignment Due Time" Required></p>
      <p><strong>Estimate Work Hour for the Assignment (hrs): </strong> <input type="text" name = "Suggested_Study_Time" placeholder="Enter Estimate Work Hour" Required></p>
      <p><input type="submit" class = "button1" value="Create Assignment" /></p>
	</form>

</body>
</html>

