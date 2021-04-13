       <!DOCTYPE html>
<html>

<!-- retrieving css from external file-->

<head>
	<title>Student Scheduler</title>
    <link rel="icon" type="image/ico" href="https://web.ics.purdue.edu/~g1117490/Main/ie.ico"/>
    <link href="student_create_profile_css.css" rel="stylesheet" type="text/css" />
</head>
<body>
   <header class="h1">
<div class="left-side"><img class="banner3" style="width: 100px;" src="https://www.flaticon.com/svg/vstatic/svg/4185/4185688.svg?token=exp=1618277116~hmac=cbc9ee8049bc4abca2b26f462e4ad900" /><hr class="divider" />
<div class="page-title">
<p class="title-main">Student Scheduler</p>
<p class="title">Redefining student scheduling</p>
</div>
</div>
    </header>
    <h1>Create Profile</h1>
    <p>Hello! Please fill in the information below to make your profile.</p>
	<!-- student profile creation -->
	<form action = "student_create_profile_confirmation.php" method="post">
        <p><strong>Email Address: </strong> <input type = "email" name = "Email" placeholder = "Enter Email Address" Required></p>
        <p><strong>Password: </strong> <input type = "password" name = "Password" placeholder = "Enter Password" Required></p>
        <p><strong>First Name: </strong> <input type = "text" name = "Fname" placeholder = "Enter First Name" Required></p>
        <p><strong>Last Name: </strong> <input type = "text" name = "Lname" placeholder = "Enter Last Name" Required></p>
        <p><strong>Major: </strong> <input type="text" name = "Major" placeholder="Enter Major" Required></p>
        <p><strong>GPA: </strong> <input type="text" name = "GPA" placeholder="Enter GPA" Required></p>
        <p><strong>Courses:</strong> <input type="text" name = "Courses" placeholder="Ex. IE33200-001, IE33600-002" Required></p>
        <p><strong>Year:</strong>
        <select type = "text" name = "Year">
                <option>Freshman</option>
                <option>Sophomore</option>
                <option>Junior</option>
          <option>Senior</option>
        </select></p>
        <p><input type="submit" class = "button1" value="Create Profile" /></p>
	</form>
</body>
</html>
