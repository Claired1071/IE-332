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
      <img class="banner1" src="https://www.flaticon.com/svg/vstatic/svg/4185/4185823.svg?token=exp=1618088399~hmac=85714128e97e4f96030e0e83ec09bc99" style= "width:100px">
    </header>
    <h1> Change Lecture </h1>
    <p> Change Lecture</p>
    
    <?php
	//pulling lecture data from the database
	$query = "SELECT Course_ID Lecture_Name FROM Lecture;
	$result = mysqli_query($data_base,$query);
      <!-- changing lecture form-->
      <form action = "advisor_create_lecture.php" method="post">
      <p><strong>Select Course ID: </strong>
        <select type = "text" name = "Course_ID">
        </select></p>
      <p><strong>Exam Would like to change: </strong>
        <select type = "text" name = "Lecture_Name">
        </select></p>
      <p><strong>Course ID: </strong> <input type="text" name = "Course_ID" placeholder="Enter New Course ID" Required></p>
      <p><strong>Lecture ID: </strong> <input type="text" name = "Lecture_ID" placeholder="Enter New Lecture ID" Required></p>
      <p><strong>Lecture Title: </strong> <input type="text" name = "Lecture_Name" placeholder="Enter New Lecture Title" Required></p>
      <p><strong>Lecture Date: </strong> <input type="date" name = "Lecture_Date" placeholder="Enter New Lecture Date" Required></p>
      <p><strong>Lecture Start Time: </strong> <input type="time" name = "Lecture_Start_Time" placeholder="Enter New Start Lecture Time" Required></p>
      <p><strong>Lecture End Time: </strong> <input type="time" name = "Lecture_End_Time" placeholder="Enter New End Lecture Time" Required></p>
      <p><input type="submit" class = "button1" value="Change Lecture" /></p>
	</form>

</body>
</html>
