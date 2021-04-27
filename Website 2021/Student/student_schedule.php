<?php
session_start();

//does not allow student to use back arrow after logging out
if ($_SESSION["active"] == 0) {
	header("Location:  student_login.php");
}

?>
<!DOCTYPE html>
<html>
<!-- retrieving css outside file-->
<head>
	<title>Student Scheduler</title>
    <link rel="icon" type="image/ico" href="https://web.ics.purdue.edu/~g1114790/main/icon.ico"/>
    <link href="student_create_profile_css.css" rel="stylesheet" type="text/css" />
</head>
<body>
	<header class="h1">
      <div class="left-side">
        <img class="banner3" src="https://web.ics.purdue.edu/~g1117490/Main/picture2.png" style= "width:100px">
        <hr class="divider">
        <div class="page-title">
          <p class="title-main">Student Scheduler</p>
          <p class="title">"Redefining Student Scheduling"</p>
        </div>
      </div>
    </header>
	<h1>Schedule</h1>
	<p>Table of Events with their corresponding date.</p>
  <?php
  //Connecting to database
  $servername = "mydb.itap.purdue.edu";
  $username = "g1114790";
  $password = "iegroup9";
  $dbname = "g1114790";

  $data_base = mysqli_connect($servername, $username, $password, $dbname);

  if (mysqli_connect_errno()) {
      printf("Connect failed: %s\n", mysqli_connect_error());
      exit();
  }

  //Pulling event info from sql
  $sql = "SELECT E.*, Event_Date, E.Event_Name, Event_Start_Time, Event_Type, Event_End_Time FROM Events E WHERE E.Student_ID = S.Student_ID AND E.Email='" . $_SESSION["s_email"] . "' ORDER BY Event_Date DESC";
  $result = mysqli_query($data_base,$sql);

  if (mysqli_num_rows($result) > 0) {
    echo "<table class = 'center' border = '1'>
    <tr>
    <th>Event Name</th>
    <th>Event Date</th>
    <th>Event Start Time</th>
    <th>Event Type</th>
    <th>Event_End_Time</th>
    </tr>
    ";
    while ($row = mysqli_fetch_array($result)) {
      echo "<tr>";
      echo '<td> <a href="student_event.php?id=' . $row["Event_Name"] . '">' . $row["Event_Name"] . "</td>";
      echo '<td> <a href="student_event.php?student=' . $row["Event_Name"] . '">' . $row["Event_Name"] . "</td>";
      echo "<td>" . $row["Event_Name"] . "</td>";
      echo "<td>" . $row["Event_Date"] . "</td>";
      echo "<td>" . $row["Event_Start_Time"] . "</td>";
      echo "<td>" . $row["Event_Type"] . "</td>";
      echo "<td>" . $row["Event_End_Time"] . "</td>";
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
