<?php
/*
Program provides form to reset admin credentials
*/
require 'db_credentials.php';
if(isset($_POST['submit'])){
	//connect to database
	$db = mysqli_connect(SERVER, USERNAME, PASSWD, DATABASE)  or die(mysqli_error($db));
	// Get new details
	$old_username = mysqli_real_escape_string($db, $_POST['username']);
	$new_username = mysqli_real_escape_string($db, $_POST['username1']);
    $old_password = mysqli_real_escape_string($db, $_POST['pass']);
	$new_password = mysqli_real_escape_string($db, $_POST['pass1']);
	$new_password1 = mysqli_real_escape_string($db, $_POST['pass2']);
	//hash passwords
	$pass = md5($old_password); //old password
	$password = md5($new_password);  //new password
	//execute query
	$query = "SELECT * from admin where Username = '$old_username' and CompPassword = '$pass'";
	$result1 = mysqli_query($db,$query) or die ( mysqli_error($query));
	//update if record exists
	if(mysqli_num_rows($result1)==1){
		$sql = "UPDATE admin set Username = '$new_username', CompPassword = '$password' where Username = '$old_username'";
		$result = mysqli_query($db,$sql) or die ( mysqli_error($db));
		header('location: login.html');
	}
	else{
		?>
		<!DOCTYPE html>
		<html lang="en">
		<head>
			<title>Reset</title>
			<meta charset="UTF-8">
			<meta name="viewport" content="width=device-width, initial-scale=1">
			<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>


			<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">

			<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">

			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

			<link rel="stylesheet" type="text/css" href="css/loginutil.css">
			<link rel="stylesheet" type="text/css" href="css/login.css">

		</head>
		<body >
			<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
				<img class="navbar-brand" src="images/icon.svg" alt="logo" style="width:40px;">
							<h5 style="color: rgb(219, 94, 94);">Blue Lake</h5>
						<h5 style="margin-left: auto; margin-right: auto; color: rgb(226, 101, 101);">Reset Profile</h5>
						<a href="adminDashboard.php" class="nav-link" style="color: white">Back</a>
				</nav>
			<div  class="limiter">
				<div class="container-login100 p-3 mb-2 bg-secondary text-white" >
					<div class="wrap-login100">
						<div class="login100-form-title" style="background-image: url(images/bg-01.jpg);">
							<span class="login100-form-title-1">
								Reset Profile
							</span>
						</div>

						<form class="login100-form validate-form" method="POST">
							<div> 
								<a href="adminDashboard.php" class="txt1" style="color: rgb(207, 7, 7);">
									<h6>CANCEL</h6><br>
								</a> 
							</div>
							<?php echo "<p style='color: red;'>Old Admin username and/or password doesn't exist!</p>"?>
							<?php echo "<p style='color: red;'>Kindly enter correct previous login details to reset profile</p>"?>
							<div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
								<span class="label-input100">Old Username</span>
								<input class="input100" type="text" id="username"  value="<?php echo $old_username ?>"name="username" placeholder="Enter username"
								onblur="validateOldUserrName(this)" required>
							</div>
							<p id="p1" style="color: red;"></p>
							<div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
								<span class="label-input100">New Username</span>
								<input class="input100" type="text" id="username1" value="<?php echo $new_username ?>"name="username1" placeholder="Enter username"
								onblur="validateNewUserrName(this)" required>
							</div>
							<p id="p2" style="color: red;"></p>
							<div class="wrap-input100 validate-input m-b-18" data-validate = "Password is required">
								<span class="label-input100">Old Password</span>
								<input class="input100" type="password" id="pass" name="pass" placeholder="Enter password"
								onblur="validateOldPassword(this)" required>
							</div>
							<p id="p3" style="color: red;"></p>
							<small style='color: green;'>Min: 8 characters</small>
							<small style='color: green;'>At least 1 Uppercase, Lowercase and a special character from @#$%&</small>
							<div class="wrap-input100 validate-input m-b-18" data-validate = "Password is required">
								<span class="label-input100">New Password</span>
								<input class="input100" type="password" id="pass1" name="pass1" placeholder="Enter password"
								onblur="validateNewPassword(this)" required>
							</div>
							<p id="p4" style="color: red;"></p>
							<div class="wrap-input100 validate-input m-b-18" data-validate = "Password is required">
								<span class="label-input100">Confirm Password</span>
								<input class="input100" type="password" id="pass2" name="pass2" placeholder="Enter password"
								onblur="validateConfirmPassword(this)" required>
							</div>
							<p id="p5" style="color: red;"></p>
							<div class="container-login100-form-btn">
								<button class="login100-form-btn" name="submit" id="submit" type="submit">
									Reset
								</button>
							</div>
						</form>
					</div>
				</div>
			</div>
			
			<script src="adminProfile.js"></script>
		</body>
		</html>
		<?php

	}
}
?>
