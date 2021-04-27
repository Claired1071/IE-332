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

<!-- retrieving outside css file-->

<head>
	<title>Student Scheduler</title>
    <link rel="icon" type="image/ico" href="https://web.ics.purdue.edu/~g1117490/main/icon.ico"/>
    <link href="student_create_profile_css.css" rel="stylesheet" type="text/css" />
</head>
<body>
<header class="h1">
<div class="left-side"><img class="banner3" style="width: 100px;" src="https://web.ics.purdue.edu/~g1117490/Main/picture2.png" /><hr class="divider" />
<div class="page-title">
<p class="title-main">Student Scheduler</p>
<p class="title">"Redefining student scheduling"</p>
</div>
</div>
</header>
<h1>Create an Event</h1>
<p>Create Event</p>
<!-- creating student event form--><form action="student_create_event.php" method="post">
<p><strong>Event Title: </strong> <input name="Event_Name" required="" type="text" placeholder="Enter Event Title" /></p>
<p><strong>Event Date: </strong> <input name="Event_Date" required="" type="date" placeholder="Enter Event Date" /></p>
<p>Please enter times in military time.</p>
<p><strong>Event Start Time: </strong> <input name="Event_Start_Time" required="" type="text" placeholder="Ex. 13:00" /></p>
<p><strong>Event End Time: </strong> <input name="Event_End_Time" required="" type="text" placeholder="Ex. 14:00" /></p>
<p><strong>Event Type:</strong><select name="Event_Type">
<option>Social</option>
<option>Work</option>
<option>Freetime/Other</option>
</select></p>
<p><input class="button1" type="submit" value="Create Event" /></p>
</form>

    <?php
	}
}
mysqli_close($data_base);
?>
<p><a href="student_main.php" class = "button1">Main Page</a></p>
    
    
</body>
</html>
