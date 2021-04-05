<?php
session_start();

//setting variable to use in all other pages so student cannot use back arrow in browser after logging out
$_SESSION["log"] = 0;
unset($_SESSION["a_email"]);
header("Location: advisor_login.php");
?>
