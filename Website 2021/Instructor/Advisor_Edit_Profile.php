<?php
session_start();
include("new_connection.php");

//user cannot go back after logging out
if ($_SESSION["active"] == 0) {
	header("Location:  advisor_login.php");
}

?>

<!DOCTYPE html>
<html>

<!-- importing css from external file-->
<head>
	<title>Student Scheduler</title>
    <link rel="icon" type="image/ico" href="https://web.ics.purdue.edu/~g1117490/main/ie.ico"/>
    <link href="advisor_create_profile_css.css" rel="stylesheet" type="text/css" />
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

<h1>Edit Profile</h1>
<p>Please fill in the information you would like to change.</p>

<?php
//pulling student data from the database
$query = "SELECT * FROM Advisor WHERE Email = '" .$_SESSION["s_email"]. "'";
$result = mysqli_query($data_base,$query);

if (mysqli_num_rows($result) > 0) {
?>

<form action = "update.php" method="post">
	
    <?php
    while ($row = mysqli_fetch_array($result)) {
    ?>
	<!-- lets advisor insert more information-->
	<p><strong>Email Address: </strong><input type = "email" name = "Email" value = "<?php echo $row["Email"]; ?>" Required></p>
	<p><strong>Password: </strong><input type = "password" name = "Password" value = "<?php echo $row["Password"]; ?>" Required></p>
	<p><strong>First Name: </strong><input type = "text" name = "Fname" value = "<?php echo $row["Fname"]; ?>" Required></p>
	<p><strong>Last Name: </strong><input type = "text" name = "Lname" value = "<?php echo $row["Lname"]; ?>" Required></p>
	<p><strong>Phone Number (area code first): </strong><input type = "number" name = "Pnumber" value = "<?php echo $row["Pnumber"]; ?>" Required></p>
	<p><input type="submit" class = "button1" value="Update Account" /></p>
</form>

<?php
	}
}
mysqli_close($data_base);
?>
<p><a href="Advisor_Main.php" class = "button1">Main Page</a></p>

</body>
</html>
