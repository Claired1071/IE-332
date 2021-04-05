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
    <h1> Feedback </h1>
    <p> Feedback </p>
    
    <?php
//pulling assignment data from the database
$query = "SELECT Assignment_Name FROM Assignment;
$result = mysqli_query($data_base,$query);

      <!-- feedback form-->
      <form action = "Advisor_Create_Assignment.php" method="post">
      <p><strong>Please Select An Assignment To Give Feedback: </strong>
        <select type = "text" name = "Assignment_Name">
        </select></p>
	<p><strong>Please Provide Feedback:</strong> <input type="text" name = "Feedback" placeholder="Enter Feedback" Required></p>
	<p><input type="submit" class = "button1" value="Submit Feedback" /></p>
	</form>
</body>
</html>