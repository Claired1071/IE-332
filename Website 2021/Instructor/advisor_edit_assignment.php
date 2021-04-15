<!DOCTYPE html>
<html>

<!-- importing css from external file-->

<head>
	<title>Student Scheduler</title>
    <link rel="icon" type="image/ico" href="image/ico" href="image/ico" href="https://web.ics.purdue.edu/~g1117490/main/ie.ico"/>
    <link href="advisor_create_profile_css.css" rel="stylesheet" type="text/css" />
</head>
<body>
    <header class="h1">
      <div class="left-side">
        <img class="banner3" src="https://www.flaticon.com/svg/vstatic/svg/4185/4185688.svg?token=exp=1618089495~hmac=84e1937dad55bad2ee74e52fe392a686" style= "width:100px">
        <hr class="divider">
        <div class="page-title">
          <p class="title-main">Student Scheduler</p>
          <p class="title">Redefining student scheduling</p>
        </div>
      </div>
    </header>
    <h1> Change Assignment </h1>
    <p> Change Assignment </p>
    
    <?php
//pulling Assignment data from the database
$query = "SELECT Assignment_Name FROM Assignment WHERE;
$result = mysqli_query($data_base,$query);

      <!-- changing assignment form-->
      <form action = "advisor_create_assignment.php" method="post">
      <p><strong>Assignment Would like to change: </strong>
        <select type = "text" name = "Assignment_Name">
        </select></p>
      <p><strong>Assignment Title: </strong> <input type="text" name = "Assignment_Name" placeholder="Enter New Assignment Title" Required></p>
      <p><strong>Assignment Due Date: </strong> <input type="date" name = "Due_Date" placeholder="Enter New Assignment Due Date" Required></p>
      <p><strong>Assignment Due Time: </strong> <input type="time" name = "Due_Time" placeholder="Enter New Assignment Due Time" Required></p>
      <p><strong>Estimate Study Time for the Assignment (hrs): </strong> <input type="text" name = "Suggested_Study_Time" placeholder="Enter Estimate Study Time(Hrs)" Required></p>
      <p><input type="submit" class = "button1" value="Change Assignment" /></p>
	</form>

</body>
</html>
    
