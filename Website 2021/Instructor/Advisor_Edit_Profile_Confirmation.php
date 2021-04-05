<?php
session_start();
include("Advisor_Connect.php");

//user cannot go back after logging out
if ($_SESSION["active"] == 0) {
	header("Location:  Advisor_Login.php");
}
//no pre-existing email redirects user to main page
if ($_POST["Email"] == "") {
	header("Location:  Advisor_Main.php");
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

//pulling changed data from advisor edit page 
$advi_email = $_POST['Email'];
$advi_password = $_POST['Password'];
$advi_fname = $_POST['Fname'];
$advi_lname = $_POST['Lname'];
$advi_phone = $_POST['Phone_Number'];

//changed data is inputted into the database
$sql = "UPDATE Student SET Email = '" .$a_email. "', Password = '" .$a_password. "', Fname = '" .$a_fname. "', Lname = '" .$a_lname. "', Phone_Number = '" .$a_number. "'WHERE Email = '" . $_SESSION["a_email"] . "'";

if (mysqli_query($data_base,$sql)) {
    echo "<p>Profile updated</p>";
    shell_exec("Rscript /home/campus/g1117490/www/main/Project_R/matchingInputs.R");
    header("Location: Advisor_main.php");
    
    $_SESSION["a_email"] = $_POST["Email"];
} else {
    echo "Error";
}

mysqli_close($data_base);
?>

<p><a href = "Advisor_Main.php" class = "button1" >Main Page</a></p>

</body>
</html>
