   <!DOCTYPE html>
<html>

<!-- importing css from external file-->

<head>
	<title>Student Scheduler</title>
    <link rel="icon" type="image/ico" href="https://web.ics.purdue.edu/~g1117490/main/ie.ico"/>
    <link href="Advisor_Create_Profile_css.css" rel="stylesheet" type="text/css" />
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
    <h1> Assignment Creation</h1> 

      <p>Create Assignment</p>
      <!-- creating Assignment form-->
      <form action = "Advisor_Create_Assignment.php" method="post">
      <p><strong>Course ID: </strong> <input type="text" name = "Course_ID" placeholder="Enter Course ID" Required></p>
      <p><strong>Assignment Title: </strong> <input type="text" name = "Assignment_Name" placeholder="Enter Assignment Title" Required></p>
      <p><strong>Assignment Due Date: </strong> <input type="date" name = "Due_Date" placeholder="Enter Assignment Due Date" Required></p>
      <p><strong>Assignment Due Time: </strong> <input type="time" name = "Due_Time" placeholder="Enter Assignment Due Time" Required></p>
      <p><strong>Estimate Work Hour for the Assignment (hrs): </strong> <input type="text" name = "Suggested_Study_Time" placeholder="Enter Estimate Work Hour" Required></p>
      <p><input type="submit" class = "button1" value="Create Assignment" /></p>
	</form>

</body>
</html>

