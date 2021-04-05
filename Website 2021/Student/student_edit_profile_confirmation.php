<?php
session_start();
include("student_connect.php");

//user cannot go back after logging out
if ($_SESSION["active"] == 0) {
	header("Location:  student_login.php");
}
//no pre-existing email redirects user to main page
if ($_POST["Email"] == "") {
	header("Location:  student_main.php");
}

?>
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
      <div class="left-side">
        <img class="banner3" src="https://image.flaticon.com/icons/png/512/123/123392.png" style= "width:250px">
        <hr class="divider">
        <div class="page-title">
          <p class="title-main">Student Scheduler</p>
          <p class="title">Redefining student scheduling</p>
        </div>
      </div>
      <img class="banner1" src="student_create_profile_css.css" style= "width:100px">
    </header>
	<h1>Hello <?php echo $_POST["Fname"]; ?></h1>
	<p>Email address: <?php echo $_POST["Email"]; ?></p>
<?php

//pulling changed data from student edit page 
$s_email = $_POST['Email'];
$s_password = $_POST['Password'];
$s_fname = $_POST['Fname'];
$s_lname = $_POST['Lname'];
$s_major = $_POST['Major'];
$s_GPA = $_POST['GPA'];
$s_courses = $_POST['Courses'];
$s_year = $_POST['Year'];

//changed data is inputted into the database
$sql = "UPDATE Student SET Email = '" .$s_email. "', Password = '" .$s_password. "', Fname = '" .$s_fname. "', Lname = '" .$s_lname. "', Major = '" .$s_major. "', GPA = '" .$s_GPA. "', Courses = '" .$s_courses. "', Year = '" .$s_year. "' WHERE Email = '" . $_SESSION["s_email"] . "'";

if (mysqli_query($data_base,$sql)) {
    echo "<p>Profile updated</p>";
    shell_exec("Rscript /home/campus/g1117490/www/main/Project_R/matchingInputs.R");
    header("Location: student_main.php");
    
    $_SESSION["s_email"] = $_POST["Email"];
} else {
    echo "Error";
}

mysqli_close($data_base);
?>

<p><a href = "student_main.php" class = "button1" >Main Page</a></p>

</body>
</html>
