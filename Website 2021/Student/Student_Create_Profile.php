       <!DOCTYPE html>
<html>

<!-- importing css from external file-->

<head>
	<title>Student Scheduler</title>
    <link rel="icon" type="image/ico" href="https://web.ics.purdue.edu/~g1117490/main/ie.ico"/>
    <link href="Student_Create_Profile_css.css" rel="stylesheet" type="text/css" />
</head>
<body>
    <header class="h1">
      </div>
      <img class="banner1" src="https://image.flaticon.com/icons/png/512/60/60785.png" style= "width:100px">
    </header>
    <h1>Profile Creation</h1>
    <p>Hello! Please fill in the information below to make your profile.</p>
	<!-- creating student profile form-->
	<form action = "Student_Create_Profile_Confirmation.php" method="post">
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
