<?php
/*
*Deletes apartment from records
*/
require 'db_credentials.php';
//connects to database
$db = mysqli_connect(SERVER, USERNAME, PASSWD, DATABASE)  or die(mysqli_error($db));
//get id
$id = isset($_GET['id']) ? $_GET['id'] : '';
//query and execution
$query1 = "SELECT * from apartment WHERE ApartmentID = '$id'";
$result1 = mysqli_query($db,$query1) or die ( mysqli_error($db));
$row = mysqli_fetch_array($result1);
//get image and path
$image = $row['MyImage'];
$path = "apartments/".$image;
//delete from database and path
unlink($path);
$query = "DELETE from apartment WHERE ApartmentID= '$id'"; 
$result = mysqli_query($db,$query) or die ( mysqli_error($db));
if($result){
    header('Location: AdmingeneralView.php');
    exit();
}


?>
