<?php
/*
Program updates agent profile
*/
require 'db_credentials.php';
//connect to database
$db = mysqli_connect(SERVER, USERNAME, PASSWD, DATABASE)  or die(mysqli_error($db));
if(isset($_POST['submit'])){
    $id = $_GET['id']; // get id through query string
    
    //execute query and get old agent pic
    $query1 = "SELECT * from agents WHERE AgentID = '$id'";
    $result1 = mysqli_query($db,$query1) or die ( mysqli_error($db));
    $row = mysqli_fetch_array($result1);
    $image = $row['ProfilePic'];
    $path = "agents/".$image;

    $image = $_FILES['image']['name'];
    // Get text
    $image_text = mysqli_real_escape_string($db, $_POST['image_text']);
    $firstname = mysqli_real_escape_string($db, $_POST['first']);
    $lastname = mysqli_real_escape_string($db, $_POST['last']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $phone = mysqli_real_escape_string($db, $_POST['phone']);
    $location = mysqli_real_escape_string($db, $_POST['loc']);
    $linkedin = mysqli_real_escape_string($db, $_POST['linkedin']);

    date_default_timezone_set("GMT");
    $curDate = date('Y-m-d H:i:s');

    // image file directory
    $target = "agents/".basename($image);
    
    //delete from path and database
    unlink($path);
    $sql = "UPDATE agents set FirstName = '$firstname', SurName = '$lastname', PrimaryEmail = '$email',
    PrimaryPhone = '$phone', MyResidence = '$location', BriefBio = '$image_text', ProfilePic = '$image', linkedin = '$linkedin',
    time_posted = '$curDate' where AgentID = '$id'";

    mysqli_query($db, $sql) or die ( mysqli_error($db));
    if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
        header('Location: adminViewAgent.php');
    }else{
        $msg = "Failed to upload image";
        echo $msg;
    }
    
    
    mysqli_close($db);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Update Agent</title>
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
				<h5 style="margin-left: auto; margin-right: auto; color: rgb(226, 101, 101);">Update Agent</h5>
				<a href="adminDashboard.php" class="nav-link" style="color: white">Back</a>
		</nav>
	<div  class="limiter">
		<div class="container-login100 p-3 mb-2 bg-secondary text-white" >
			<div class="wrap-login100">
				<div class="login100-form-title" style="background-image: url(images/bg-01.jpg);">
					<span class="login100-form-title-1">
                        UPDATE AGENT<br>
                    </span><br>
                    
				</div>
                <form class="login100-form validate-form"  name="Myform" id="myform" 
                method="POST" enctype="multipart/form-data">
                    <div> 
                        <a href="adminDashboard.php" class="txt1" style="color: rgb(207, 7, 7);">
                            <h6>CANCEL</h6><br>
                        </a> 
                    </div>

                    <div class="wrap-input100 validate-input m-b-26" >
						<span class="label-input100">Firstname</span>
                        <input class="input100" type="text" id="first" name="first" placeholder="Enter first name" 
                        required onblur="validateFirstName(this)">
                    </div>
                    <p id="p1" style="color: red;"></p>

                    <div class="wrap-input100 validate-input m-b-26">
						<span class="label-input100">Last name</span>
                        <input class="input100" type="text" id="last" name="last" placeholder="Enter last name" 
                        required onblur="validateLastName(this)">
                    </div>
                    <p id="p2" style="color: red;"></p>

                    <div class="wrap-input100 validate-input m-b-26">
						<span class="label-input100">Primary Email</span>
                        <input class="input100" type="text" id="email" name="email" placeholder="Enter email" 
                        required onblur="validateEmail(this)">
                    </div>
                    <p id="p3" style="color: red;"></p>

                    <div class="wrap-input100 validate-input m-b-26">
						<span class="label-input100">Primary contact</span>
                        <input class="input100" type="text" id="phone" name="phone" placeholder="Enter contact number" 
                        required onblur="validatePhone(this)">	
                    </div>
                    <p id="p4" style="color: red;"></p>

                    <div class="wrap-input100 validate-input m-b-26">
						<span class="label-input100">Place of Residence</span>
                        <input class="input100" type="text" id="loc" name="loc" placeholder="Enter address" 
                        required onblur="validateLocation(this)">
                    </div>
                    <p id="p5" style="color: red;"></p>

                    <div class="wrap-input100 validate-input m-b-26">
						<span class="label-input100">Linkedin</span>
                        <input class="input100" type="url" id="linkedin" name="linkedin" placeholder="Enter linedin url" 
                        required onblur="validateLinkedin(this)">
                    </div>
                    <p id="p7" style="color: red;"></p>
                    
                    <div class="wrap-input100 validate-input m-b-26">
						<span class="label-input100">Brief Profile</span>
                        <textarea class="input100" type="text" id="desc" name="image_text" rows="4" cols="30"
                        placeholder="Sth to describe agent" required></textarea>
                    </div>
                    <p id="p6" style="color: red;"></p>

                    <div class="wrap-input100 validate-input m-b-26">
						<span class="label-input100">Upload Picture</span>
						<input class="input100" id="file" type="file" accept=".jpg,.jpeg,.png" name="image" required>
                    </div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn" name="submit" type="submit" id="submit">
							Add
						</button>
                    </div>
				</form>
			</div>
		</div>
    </div>
    <script src="agent.js"></script>
</body>
</html>
