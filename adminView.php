<?php
/*
* Program inserts apartment advertised by admin into database and redirects to a view page
*/
require 'db_credentials.php';

//connect to database
$db = mysqli_connect(SERVER, USERNAME, PASSWD, DATABASE)  or die(mysqli_error($db));
// If upload button is clicked ...
if (isset($_POST['submit'])) {
    // Get image name
    $image = $_FILES['image']['name'];
    // Get apartment details
    $image_text = mysqli_real_escape_string($db, $_POST['image_text']);
    $price = mysqli_real_escape_string($db, $_POST['price']);
    $location = mysqli_real_escape_string($db, $_POST['loc']);

    //time zone
    date_default_timezone_set("GMT");
    $curDate = date('Y-m-d H:i');

    // image file directory
    $target = "apartments/".basename($image);
    $poster = $_SESSION["admin"];
    //sql query
    $sql = "INSERT INTO apartment (MyDescription, MyPrice, MyLocation, MyImage, Approved, time_posted, posted_by)
    VALUES ('$image_text', '$price', '$location', '$image', 'Yes', '$curDate', '$poster')";

    // execute query
    mysqli_query($db, $sql);

    //check whether image was successfully added to file path
    if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
      $msg = "Image uploaded successfully";
      header('Location: AdmingeneralView.php');
    }else{
        $msg = "Failed to upload image";
        echo $msg;
    }
    
}
?>