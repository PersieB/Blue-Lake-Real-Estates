<?php
/*
Program updates apartment details
*/
require 'db_credentials.php';
$db = mysqli_connect(SERVER, USERNAME, PASSWD, DATABASE)  or die(mysqli_error($db));
if(isset($_POST['submit'])){
    $id = $_GET['id']; // get id through query string

    $query1 = "SELECT * from apartment WHERE ApartmentID = '$id'";
    $result1 = mysqli_query($db,$query1) or die ( mysqli_error($db));
    $row = mysqli_fetch_array($result1);
    $image = $row['MyImage'];
    $path = "apartments/".$image;

    $image = $_FILES['image']['name'];
    // Get text
    $image_text = mysqli_real_escape_string($db, $_POST['image_text']);
    $price = mysqli_real_escape_string($db, $_POST['price']);
    $location = mysqli_real_escape_string($db, $_POST['loc']);

    //time zone
    date_default_timezone_set("GMT");
    $curDate = date('Y-m-d H:i:s');

    // image file directory
    $target = "apartments/".basename($image);

    //delete old image
    unlink($path);
    $sql = "UPDATE apartment set MYDescription = '$image_text', MyPrice = '$price', MyLocation = '$location',
    MyImage = '$image', time_posted = '$curDate' where ApartmentID = '$id'";

    mysqli_query($db, $sql) or die ( mysqli_error($db));

    if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
        header('Location: AdmingeneralView.php');
        
    }
    
    mysqli_close($db);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Update Properties</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/loginutil.css">
	<link rel="stylesheet" type="text/css" href="css/login.css">
</head>
<body >
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
		<img class="navbar-brand" src="images/icon.svg" alt="logo" style="width:40px;">
					<h5 style="color: rgb(219, 94, 94);">Blue Lake</h5>
				<h5 style="margin-left: auto; margin-right: auto; color: rgb(226, 101, 101);">Update</h5>
				<a href="deleteView.php" class="nav-link" style="color: white">Back</a>
		</nav>
	<div  class="limiter">
		<div class="container-login100 p-3 mb-2 bg-secondary text-white" >
			<div class="wrap-login100">
				<div class="login100-form-title" style="background-image: url(images/bg-01.jpg);">
					<span class="login100-form-title-1">
                        UPDATE APARTMENT
                       
                    </span><br>
                    
				</div>
                <form class="login100-form validate-form" name="Myform" id="myform" 
                method="POST" enctype="multipart/form-data">
                    <div>
                        <a href="deleteView.php" class="txt1" style="color: rgb(207, 7, 7);">
                            <h6>CANCEL</h6><br>
                        </a>
                    </div>

                    <div class="wrap-input100 validate-input m-b-26" >
						<span class="label-input100">Price</span>
                        <input class="input100" type="text" id="price" name="price" placeholder="Enter price in GHC" 
                        onblur = "validatePrice(this)" required>
                    </div>
                    <p id="p1" style="color: red;"></p>

                    <div class="wrap-input100 validate-input m-b-26">
						<span class="label-input100">Location</span>
                        <input class="input100" type="text" id="loc" name="loc" placeholder="Enter location" 
                        onblur = "validateLocation(this)"required>
                    </div>
                    <p id="p2" style="color: red;"></p>
                    
                    <div class="wrap-input100 validate-input m-b-26">
						<span class="label-input100">Brief Description</span>
                        <textarea class="input100" type="text" id="desc" name="image_text" rows="4" cols="30"
                        placeholder="Sth to describe apartment" onblur = "validateBrief(this)" required></textarea>	
                    </div>
                    <p id="p3" style="color: red;"></p>

                    <div class="wrap-input100 validate-input m-b-26">
						<span class="label-input100">Upload Image</span>
                        <input class="input100" id="file" type="file" accept=".jpg,.jpeg,.png" name="image"
                        onchange="return fileValidation()" required>
                    </div>
                    <p id="p4" style="color: red;"></p>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn" name="submit" type="submit" id="submit">
							Update
						</button>
                    </div>
				</form>
			</div>
		</div>
    </div>
    <script src="housing.js"></script>
</body>
</html>