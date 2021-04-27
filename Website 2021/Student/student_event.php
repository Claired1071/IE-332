<?php
session_start();

//user can't go back if logged out
if ($_SESSION["active"] == 0) {
	header("Location:  student_login.php");
}

?>
<!DOCTYPE html>
<html>
<!-- retrieving css external file-->
<head>
	<title>Student Scheduler</title>
    <link rel="icon" type="image/ico" href="https://web.ics.purdue.edu/~g1117490/Main/icon.ico"/>
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
	<h1>List of Events</h1>
  <?php
  //database connection
  $servername = "mydb.itap.purdue.edu";
  $username = "g1117490";
  $password = "iegroup9";
  $dbname = "g1117490";

  $data_base = mysqli_connect($servername, $username, $password, $dbname);

  if (mysqli_connect_errno()) {
      printf("Connection failed: %s\n", mysqli_connect_error());
      exit();
  }

  //retrieving event data from database
  $sql = "SELECT E.*, Event_Name, Event_Date, Event_Start_Time, Event_Type, Event_End_Time FROM Events E WHERE E.Student_ID = S.Student_ID AND S.Email='" . $_SESSION["s_email"] . "' ORDER BY Event_Date DESC";
  $result = mysqli_query($data_base,$sql);

  if (mysqli_num_rows($result) > 0) {
    echo "<table class = 'center' border = '1'>
    <tr>
    <th>Job ID</th>
    <th>Company Name</th>
    <th>Job Title</th>
    <th>Job Type</th>
    <th>Job Description</th>
    <th>Matching Score</th>
    </tr>
    ";
    while ($row = mysqli_fetch_array($result)) {
      echo "<tr>";
      echo '<td> <a href="student_event.php?id=' . $row["Opportunity_ID"] . '">' . $row["Opportunity_ID"] . "</td>";
      echo '<td> <a href="company.php?company=' . $row["Company_Name"] . '">' . $row["Company_Name"] . "</td>";
      echo "<td>" . $row["Job_Title"] . "</td>";
      echo "<td>" . $row["Opportunity_Type"] . "</td>";
      echo "<td>" . $row["Job_Description"] . "</td>";
      echo "<td>" . $row["Weight_Score"] . "</td>";
      echo "</tr>";
    }
  } else {
    echo "No result found";
  }
  echo "</table>";
  mysqli_close($data_base);
  ?>
<p><a href = "student_main.php" class = "button1">Main Page</a></p>

</body>
</html>