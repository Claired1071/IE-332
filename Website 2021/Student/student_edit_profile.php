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

<!-- importing css from external file-->
<head>
	<title>Student Scheduler</title>
    <link rel="icon" type="image/ico" href="https://web.ics.purdue.edu/~g1117490/main/ie.ico"/>
    <link href="student_create_profile_css.css" rel="stylesheet" type="text/css" />
</head>
<body>
    <header class="h1">
      <div class="left-side">
        <img class="banner3" src="https://www.flaticon.com/svg/vstatic/svg/4185/4185688.svg?token=exp=1618089495~hmac=84e1937dad55bad2ee74e52fe392a686" style= "width:250px">
        <hr class="divider">
        <div class="page-title">
          <p class="title-main">Student Scheduler</p>
          <p class="title">Redefining student scheduling</p>
        </div>
      </div>
      <img class="banner1" src="https://www.flaticon.com/svg/vstatic/svg/4185/4185823.svg?token=exp=1618088399~hmac=85714128e97e4f96030e0e83ec09bc99" style= "width:100px">
    </header>

<h1>Edit Profile</h1>
<p>Please fill in the information you would like to change.</p>

<?php
//pulling student data from the database
$query = "SELECT * FROM Student WHERE Email = '" .$_SESSION["s_email"]. "'";
$result = mysqli_query($data_base,$query);

if (mysqli_num_rows($result) > 0) {
?>

<form action = "student_edit_profile_confirmation" method="post">
	
    <?php
    while ($row = mysqli_fetch_array($result)) {
    ?>
	<!-- lets student insert more information-->
	<p><strong>Email Address: </strong><input type = "email" name = "Email" value = "<?php echo $row["Email"]; ?>" Required></p>
	<p><strong>Password: </strong><input type = "password" name = "Password" value = "<?php echo $row["Password"]; ?>" Required></p>
	<p><strong>First Name: </strong><input type = "text" name = "Fname" value = "<?php echo $row["Fname"]; ?>" Required></p>
	<p><strong>Last Name: </strong><input type = "text" name = "Lname" value = "<?php echo $row["Lname"]; ?>" Required></p>
	 <p><strong>Student ID: </strong><input type="text" name = "Student_ID" placeholder="Ex. 11111111111" value = "<?php echo $row["Student_ID"]; ?>" Required></p>
        <p><strong>Major: </strong><input type="text" name = "Major" placeholder="Enter Major" value = "<?php echo $row["Major"]; ?>" Required></p>
	<p><strong>GPA: </strong><input type="text" name = "GPA" placeholder="Enter GPA" value = "<?php echo $row["GPA"]; ?>" Required></p>
	<p><strong>Courses: </strong><input type="text" name = "Courses" value = "<?php echo $row["Courses"]; ?>" Required></p>
	<p><strong>Year: </strong><input type="text" name = "Year" value = "<?php echo $row["Year"]; ?>" Required></p>
	<p><input type="submit" class = "button1" value="Update Account" /></p>
</form>

<?php
	}
}
mysqli_close($data_base);
?>
<p><a href="student_main.php" class = "button1">Main Page</a></p>

</body>
</html>
