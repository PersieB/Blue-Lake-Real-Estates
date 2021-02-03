<?php
/*
Program to remove agents
*/
require 'db_credentials.php';

//connect to database
$db = mysqli_connect(SERVER, USERNAME, PASSWD, DATABASE)  or die(mysqli_error($db));
//get id
$id = isset($_GET['id']) ? $_GET['id'] : '';

//execute query to select record
$query1 = "SELECT * from agents WHERE AgentID = '$id'";
$result1 = mysqli_query($db,$query1) or die ( mysqli_error($db));
$row = mysqli_fetch_array($result1);

//get image
$image = $row['ProfilePic'];
$path = "agents/".$image;

//delete record and image from folder
unlink($path);
$query = "DELETE from agents WHERE AgentID= '$id'"; 
$result = mysqli_query($db,$query) or die ( mysqli_error($db));
if($result){
    header('Location: adminViewAgent.php');
    echo "success";
    exit();
}


?>
