       <!DOCTYPE html>
<html>

<!-- importing css from external file-->

<head>
	<title>Student Scheduler</title>
    <link rel="icon" type="image/ico" href="https://web.ics.purdue.edu/~g1117490/main/ie.ico"/>
    <link href="student_create_profile_css.css" rel="stylesheet" type="text/css" />
</head>
<body>
<header class="h1">
<div class="left-side"><img class="banner3" style="width: 250px;" src="https://www.flaticon.com/svg/vstatic/svg/4185/4185688.svg?token=exp=1618089495~hmac=84e1937dad55bad2ee74e52fe392a686" /><hr class="divider" />
<div class="page-title">
<p class="title-main">Student Scheduler</p>
<p class="title">Redefining student scheduling</p>
</div>
</div>
<img class="banner1" style="width: 100px;" src="https://www.flaticon.com/svg/vstatic/svg/4185/4185823.svg?token=exp=1618088399~hmac=85714128e97e4f96030e0e83ec09bc99" /></header>
<h1>Create an Event</h1>
<p>Create Event</p>
<!-- creating student event form--><form action="student_create_event.php" method="post">
<p><strong>Event Title: </strong> <input name="Event_Name" required="" type="text" placeholder="Enter Event Title" /></p>
<p><strong>Event Date: </strong> <input name="Event_Date" required="" type="date" placeholder="Enter Event Date" /></p>
<p><strong>Event Start Time: </strong> <input name="Event_Start_Time" required="" type="time" placeholder="Enter  Start Time" /></p>
  <p><strong>Event End Time: </strong> <input name="Event_End_Time" required="" type="time" placeholder="Enter End Time" /></p>
<p><strong>Event Type:</strong><select name="Event_Type">
<option>Social</option>
<option>Work</option>
<option>Freetime/Other</option>
</select></p>
<p><input class="button1" type="submit" value="Create Event" /></p>
</form>
</body>
</html>
