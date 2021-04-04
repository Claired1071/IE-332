<?php
session_start();
include("Student_Connect.php");

//user cannot go back after logging out
if ($_SESSION["active"] == 0) {
	header("Location:  Student_Login.php");
}
//no pre-existing email redirects user to main page
if ($_POST["Email"] == "") {
	header("Location:  Student_Main.php");
}

?>
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
	<h1>Hello <?php echo $_POST["Fname"]; ?></h1>
	<p>Email address: <?php echo $_POST["Email"]; ?></p>
<?php

//pulling changed data from student edit page 
$stud_email = $_POST['Email'];
$stud_password = $_POST['Password'];
$stud_fname = $_POST['Fname'];
$stud_lname = $_POST['Lname'];
$stud_phone = $_POST['Phone_Number'];
$stud_major = $_POST['Major'];
$stud_location = $_POST['Location'];
$stud_GPA = $_POST['GPA'];
$stud_experience = $_POST['Experience'];
$stud_courses = $_POST['Courses'];
$stud_year = $_POST['Year'];
$stud_opp = $_POST['Opportunity_Type'];
$stud_relocation = $_POST['Relocation'];
$stud_sponsorship = $_POST['Work_Sponsorship'];

//changed data is inputted into the database
$sql = "UPDATE Student SET Email = '" .$s_email. "', Password = '" .$s_password. "', Fname = '" .$s_fname. "', Lname = '" .$s_lname. "', Phone_Number = '" .$s_number. "', Major = '" .$s_major. "', GPA = '" .$stud_GPA. "', Courses = '" .$stud_courses. "', Year = '" .$stud_year. "' WHERE Email = '" . $_SESSION["s_email"] . "'";

if (mysqli_query($data_base,$sql)) {
    echo "<p>Profile updated</p>";
    shell_exec("Rscript /home/campus/g1116905/www/main/Project_R/matchingInputs.R");
    header("Location: student_main.php");
    
    $_SESSION["s_email"] = $_POST["Email"];
} else {
    echo "Error";
}

mysqli_close($data_base);
?>

<p><a href = "Student_Main.php" class = "button1" >Main Page</a></p>

</body>
</html>
