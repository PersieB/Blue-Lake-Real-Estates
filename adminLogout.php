<?php
/*
* Logs out admin account and returns to home page
*/
session_start();
unset($_SESSION["AdminID"]);
unset($_SESSION["admin"]);
unset($_SESSION["AdminEmail"]);
header("Location:index.html");
?>