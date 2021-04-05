<?php
session_start();
//does not allow advisor to use back arrow after logging out
if ($_SESSION["log"] == 0) {
	header("Location: advisor_login.php");
}

?>

<!DOCTYPE html>
<html>
<!-- importing css from external file-->
<head>
	<title>Student Scheduler</title>
    <link rel="icon" type="image/ico" href="https://web.ics.purdue.edu/~g1117490/main/ie.ico"/>
    <link href="Advisor_Create_Profile_css.css" rel="stylesheet" type="text/css" />
</head>
<body>
    <header class="h1">
      <div class="left-side">
        <img class="banner3" src="https://www.cco.purdue.edu/Content/Layout/logo.svg" style= "width:250px">
        <hr class="divider">
        <div class="page-title">
          <p class="title-main">Student Scheduler</p>
          <p class="title">Redefining student scheduling</p>
        </div>
      </div>
      <img class="banner1" src="https://cdn.shopify.com/s/files/1/0241/9737/products/1008-PUR-Tank-black_2_1800x.jpg?v=1571442802" style= "width:100px">
    </header>
	
	<!-- buttons to navigate advisor pages-->
	<h1>Main Page</h1>
    <div id = "sideR">
	<p><a href = "Advisor_Edit_Profile.php" class = "button1">Profile Page</a></p>
	<p><a href = "Advisor_Create_Exam.php" class = "button1">Create Exam</a></p>
	<p><a href = "Advisor_Edit_Exam.php" class = "button1">Change Exam</a></p>
	<p><a href = "Advisor_Create_Assignment.php" class = "button1">Create Assignment</a></p>
	<p><a href = "Advisor_Edit_Assignment.php" class = "button1">Change Assignment</a></p>
	<p><a href = "Advisor_Logout.php" class = "button1">Logout</a></p>
	<br>
</body>
</html>