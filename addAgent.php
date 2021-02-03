<?php
/*
*Program allows admin to add new agents
*/
require 'db_credentials.php';

//start session
session_start();

  // Create database connection
  $db = mysqli_connect(SERVER, USERNAME, PASSWD, DATABASE)  or die(mysqli_error($db));

  // If upload button is clicked ...
  if (isset($_POST['submit'])) {
  	// Get image name
      $image = $_FILES['image']['name'];
  	// Get agent profile details
      $image_text = mysqli_real_escape_string($db, $_POST['image_text']);
      $firstname = mysqli_real_escape_string($db, $_POST['first']);
      $lastname = mysqli_real_escape_string($db, $_POST['last']);
      $email = mysqli_real_escape_string($db, $_POST['email']);
      $phone = mysqli_real_escape_string($db, $_POST['phone']);
      $location = mysqli_real_escape_string($db, $_POST['loc']);
      $linkedin = mysqli_real_escape_string($db, $_POST['linkedin']);

      //time zone
      date_default_timezone_set("GMT");
      $curDate = date('Y-m-d H:i');

  	  // image file directory
  	  $target = "agents/".basename($image);

      //query to insert into agents table in database
      $sql = "INSERT INTO agents (FirstName, SurName, PrimaryEmail, PrimaryPhone, MyResidence, BriefBio, ProfilePic, linkedin, time_posted)
      values('$firstname', '$lastname', '$email', '$phone', '$location', '$image_text', '$image', '$linkedin', '$curDate')";

  	  // execute query
      mysqli_query($db, $sql) or die(mysqli_error($db));

      //check whether image upload is successful and has been moved to image path
      if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
      //redirect page
        header('Location: adminViewAgent.php');
      }else{
          $msg = "Failed to upload image";
          echo $msg;
      }
      
  }
?>