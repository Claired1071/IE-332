<!DOCTYPE html>
<html>

<!-- importing css from external file-->

<head>
	<title>Student Scheduler</title>
    <link rel="icon" type="image/ico" href="image/ico" href="image/ico" href="https://web.ics.purdue.edu/~g1117490/main/ie.ico"/>
    <link href="student_create_profile_css.css" rel="stylesheet" type="text/css" />
</head>
<body>
    <header class="h1">
      <div class="left-side">
        <img class="banner3" src="https://www.flaticon.com/svg/vstatic/svg/4185/4185688.svg?token=exp=1618089495~hmac=84e1937dad55bad2ee74e52fe392a686" style= "width:250px">
        <hr class="divider">
        <div class="page-title">
          <p class="title-main">Student Scheduler</p>
          <p class="title">Redefining student scheduling</p>
        </div>
      </div>
      <img class="banner1" src="https://www.flaticon.com/svg/vstatic/svg/4185/4185823.svg?token=exp=1618088399~hmac=85714128e97e4f96030e0e83ec09bc99" style= "width:100px">
    </header>
    <h1> Change Event </h1>
    <p> Change Event </p>
    
    <?php
//pulling event data from the database
$query = "SELECT Event_Name FROM Event WHERE;
$result = mysqli_query($data_base,$query);

      <!-- changing event-->
      <form action = "student_create_event.php" method="post">
      <p><strong>Event you would like to change: </strong>
        <select type = "text" name = "Event Title">
        </select></p>
      <p><strong>Event Title: </strong> <input type="text" name = "Event Title" placeholder="Enter New Event Title" Required></p>
      <p><strong>Event Date: </strong> <input type="date" name = "Event Date" placeholder="Enter New Event Date" Required></p>
      <p><strong>Event Start Time: </strong> <input type="time" name = "Event Time" placeholder="Enter New Start Time" Required></p>
        <p><strong>Event End Time: </strong> <input type="time" name = "Event Time" placeholder="Enter New End Time" Required></p>
       <p><strong>Event Type:</strong>
        <select type = "text" name = "Event Type">
                <option>Social</option>
                <option>Work</option>
          <option>Freetime/Other</option>
        </select></p>
      <p><input type="submit" class = "button1" value="Change Event" /></p>
	</form>

</body>
</html>
