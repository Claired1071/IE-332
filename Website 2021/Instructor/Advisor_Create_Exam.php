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
    <h1> Exam Creation</h1>
    <p>Create Exam</p>
      <!-- creating exam form-->
      <form action = "Advisor_Create_Exam.php" method="post">
      <p><strong>Course ID: </strong> <input type="text" name = "Course_ID" placeholder="Enter Course ID" Required></p>     
      <p><strong>Exam Title: </strong> <input type="text" name = "Exam_Name" placeholder="Enter Exam Title" Required></p>
      <p><strong>Exam ID: </strong> <input type="text" name = "Exam_ID" placeholder="Enter ID Required></p>
      <p><strong>Exam Date: </strong> <input type="date" name = "Exam_Date" placeholder="Enter Exam Date" Required></p>
      <p><strong>Exam Start Time: </strong> <input type="time" name = "Exam_Start_Time" placeholder="Enter Exam Start Time" Required></p>
      <p><strong>Exam End Time: </strong> <input type="time" name = "Exam_End_Time" placeholder="Enter Exam End Time" Required></p>
      <p><strong>Suggested Study Time for the Exam (hrs): </strong> <input type="text" name = "Suggested_Study_Time" placeholder="Enter Suggested Study Time (hrs)" Required></p>
      <p><input type="submit" class = "button1" value="Create Exam" /></p>
	</form>

</body>
</html>