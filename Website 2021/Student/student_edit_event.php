<?php
session_start();
include("student_connect.php");

//user cannot go back after logging out
if ($_SESSION["active"] == 0) {
	header("Location:  student_login.php");
}

?>

<!DOCTYPE html>
<html>

<!-- retrieving css from external file-->
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
          <p class="title">Redefining student scheduling</p>
        </div>
      </div>
    </header>

<h1>Edit Event</h1>
<p>Please fill in the information you would like to change.</p>

<?php
//retrieving event data from database
$query = "SELECT * FROM Events WHERE Email = '" .$_SESSION["s_email"]. "'";
$result = mysqli_query($data_base,$query);

if (mysqli_num_rows($result) > 0) {
?>

<form action = "student_edit_event_confirmation" method="post">
	
    <?php
    while ($row = mysqli_fetch_array($result)) {
    ?>
	<!-- lets student change information-->
    
<p><strong>Event Title: </strong> <input type="text" name="Event_Name" placeholder="Enter Event Title" value = "<?php echo $row["Event_Name"]; ?>" Required></p>

<p><strong>Event Date: </strong> <input type="date" name="Event_Date" placeholder="Enter Event Date" value = "<?php echo $row["Event_Event_Date"]; ?>" Required></p>
    
<p>Please enter times in military time.</p>
    
<p><strong>Event Start Time: </strong> <input name="Event_Start_Time" type="text" placeholder="Ex. 13:00" value = "<?php echo $row["Event_Start_Time"]; ?>" Required></p>
    
<p><strong>Event End Time: </strong> <input name="Event_End_Time" type="text" placeholder="Ex. 14:00" value = "<?php echo $row["Event_End_Time"]; ?>" Required></p>
    
<p><strong>Event Type:</strong><input type="text" name="Event_Type" value = "<?php echo $row["Event_Type"]; ?>" Required></p>  

<p><input type="submit" class = "button1" value="Update Event" /></p>
</form>

<?php
	}
}
mysqli_close($data_base);
?>
<p><a href="student_main.php" class = "button1">Main Page</a></p>

</body>
</html>