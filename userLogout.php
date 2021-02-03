<?php
/* Program logs customers out */
session_start();
unset($_SESSION["CustID"]);
unset($_SESSION["username"]);
unset($_SESSION["email"]);
unset($_SESSION["firstname"]);
unset($_SESSION["lastname"]);
header("Location:index.html");
?>