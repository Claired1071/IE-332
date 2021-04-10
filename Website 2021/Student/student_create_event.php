<p>&nbsp;</p>
<p>&nbsp;</p>
<!-- importing css from external file-->
<p>&nbsp;</p>
<p>&nbsp;</p>
<header class="h1">
<div class="left-side"><img class="banner3" style="width: 250px;" src="https://image.flaticon.com/icons/png/512/123/123392.png" /><hr class="divider" />
<div class="page-title">
<p class="title-main">Student Scheduler</p>
<p class="title">Redefining student scheduling</p>
</div>
</div>
<img class="banner1" style="width: 100px;" src="https://image.flaticon.com/icons/png/512/60/60785.png" /></header>
<h1>Create an Event</h1>
<p>Create Event</p>
<!-- creating student event form--><form action="student_create_event.php" method="post">
<p><strong>Event Title: </strong> <input name="Etitle" required="" type="text" placeholder="Enter Event Title" /></p>
<p><strong>Event Date: </strong> <input name="Edate" required="" type="date" placeholder="Enter Event Date" /></p>
<p><strong>Event Time: </strong> <input name="Etime" required="" type="time" placeholder="Enter Event Time" /></p>
<p><strong>Event Type:</strong><select name="Etype">
<option>Social</option>
<option>Work</option>
<option>Freetime/Other</option>
</select></p>
<p><input class="button1" type="submit" value="Create Event" /></p>
</form>
