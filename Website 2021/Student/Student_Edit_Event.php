<!DOCTYPE html>
<html>

<!-- importing css from external file-->

<head>
	<title>Student Scheduler</title>
    <link rel="icon" type="image/ico" href="image/ico" href="image/ico" href="https://web.ics.purdue.edu/~g1117490/main/ie.ico"/>
    <link href="Student_Create_Profile_css.css" rel="stylesheet" type="text/css" />
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
    <h1> Change Event </h1>
    <p> Change Event </p>
    
    <?php
//pulling Assignment data from the database
$query = "SELECT Event_Title FROM Event WHERE;
$result = mysqli_query($data_base,$query);

      <!-- changing event-->
      <form action = "Student_Create_Event.php" method="post">
      <p><strong>Event you would like to change: </strong>
        <select type = "text" name = "Event Title">
        </select></p>
      <p><strong>Event Title: </strong> <input type="text" name = "Event Title" placeholder="Enter New Event Title" Required></p>
      <p><strong>Event Date: </strong> <input type="date" name = "Event Date" placeholder="Enter New Event Date" Required></p>
      <p><strong>Event Time: </strong> <input type="time" name = "Event Time" placeholder="Enter New Event Time" Required></p>
        <p><strong>Event Type:</strong>
        <select type = "text" name = "Event Type">
                <option>Social</option>
                <option>Work</option>
          <option>Other</option>
        </select></p>
      <p><input type="submit" class = "button1" value="Change Event" /></p>
	</form>

</body>
</html>
