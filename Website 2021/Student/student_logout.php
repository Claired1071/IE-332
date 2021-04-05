<?php
session_start();
//user is not allowed to go back into the browser after logging out
$_SESSION["active"] = 0;
unset($_SESSION["s_email"]);
header("Location: student_login.php");
?>
