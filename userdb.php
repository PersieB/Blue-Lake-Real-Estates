<?php
/*
Program allows successful signup and inserts details into database
*/
require 'db_credentials.php';
if(isset($_POST['submit'])){
    $firstname = trim(filter_input(INPUT_POST, 'firstname'));
    $surname = trim(filter_input(INPUT_POST, 'surname'));
    $Username = trim(filter_input(INPUT_POST, 'username'));
    $email = trim(filter_input(INPUT_POST, 'email'));
    $phone = trim(filter_input(INPUT_POST, 'phone'));
    $user_password = trim(filter_input(INPUT_POST, 'pass'));

    // Create connection
    $conn = mysqli_connect(SERVER, USERNAME, PASSWD, DATABASE)  or die(mysqli_error($conn));
    
    // first check the database to make sure 
    // a user does not already exist with the same username and/or email
    $password = md5($user_password);//encrypt the password before saving in the database
    $user_check_query = "SELECT * FROM customer WHERE Username='$Username' LIMIT 1";
    $result = mysqli_query($conn, $user_check_query);
    if(mysqli_num_rows($result) == 0){
        $sql = "INSERT INTO customer (Firstname, Surname, Username, PrimaryEmail, PrimaryPhone, MyPassword)
        VALUES ('$firstname','$surname','$Username','$email','$phone','$password')";
        mysqli_query($conn, $sql);
        header('location: login.html');
    }

    else{
        ?>  
        <!DOCTYPE html>
        <html lang="en">
        <head>
        <title>Signup</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>


        <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">

        <link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

        <link rel="stylesheet" type="text/css" href="css/loginutil.css">
        <link rel="stylesheet" type="text/css" href="css/login.css">

        </head>
            <body>
                <?php
                $user = mysqli_fetch_assoc($result);
                if($Username == $user['Username']){
                    $user_error = 'Username already taken';
                }
                ?>
                <div  class="limiter">
                <div class="container-login100 p-3 mb-2 bg-secondary text-white" >
                    <div class="wrap-login100">
                        <div class="login100-form-title" style="background-image: url(images/bg-01.jpg);">
                            <span class="login100-form-title-1">
                                Create Account
                            </span>
                </div>
                
				<form class="login100-form validate-form" action="userdb.php" name="Myform" method="POST">
                <div class="flex-sb-m w-full p-b-30">
						<p style="color: green;">Already have an account? -></p>

						<div>
							<a href="login.html" class="txt1" style="color: green;">
								<b>SIGN IN</b>
							</a>
						</div>
					</div>
                
					<div class="wrap-input100 validate-input m-b-26">
						<span class="label-input100">Firstname</span>
                        <input class="input100" type="text" id="firstname" name="firstname" placeholder="Enter first name"
                        value="<?php echo $firstname; ?>" onblur="validateFirstName(this)" required>
                        <span class="focus-input100"></span>
                    </div>
                    <p id="p1" style="color: red;"></p>
                    
                    <div class="wrap-input100 validate-input m-b-26" >
						<span class="label-input100">Surname</span>
                        <input class="input100" type="text" id="surname" name="surname" placeholder="Enter surname"
                        value="<?php echo $surname; ?>" onblur = "validateLastName(this)" required>
						<span class="focus-input100"></span>
                    </div>
                    <p id="p2" style="color: red;"></p>
                    <small style='color: green;'>Between 5 & 15 characters</small>
					<small style='color: green;'>Only lowercase include alphabets, numbers and underscore</small>
                    <div class="wrap-input100 validate-input m-b-26">
						<span class="label-input100">Username</span>
                        <input class="input100" type="text" id="username" name="username" placeholder="Enter username"
                        value="<?php echo $Username; ?>" onblur="validateUserrName(this)" required>
						<span class="focus-input100"></span>
                    </div>
                    <p id="p3" style="color: red;"></p>
                    <p style="color: red;"><?php echo $user_error ?></p>

                    <div class="wrap-input100 validate-input m-b-26">                   
						<span class="label-input100">Gmail account</span>
                        <input class="input100" type="text" id="email" name="email" placeholder="Enter email"
                        value="<?php echo $email; ?>" onblur="validateEmail(this)" required>
						<span class="focus-input100"></span>
                    </div>
                    <p id="p4" style="color: red;"></p>

                    <small style='color: green;'>Format: +233277776087 / 0277776087</small>
                    <div class="wrap-input100 validate-input m-b-26">
						<span class="label-input100">Phone number</span>
                        <input class="input100" type="text" name="phone" id="phone" placeholder="Enter contact"
                        value="<?php echo $phone; ?>" onblur="validatePhone(this)" required>
						<span class="focus-input100"></span>
					</div>
                    <p id="p5" style="color: red;"></p>

                    <small style='color: green;'>Min: 8 characters</small>
					<small style='color: green;'>At least 1 Uppercase, Lowercase and a special character from @#$%&</small>
					<div class="wrap-input100 validate-input m-b-18">
						<span class="label-input100">Password</span>
						<input class="input100" type="password" id="password" name="pass" placeholder="Enter password" onblur="validatePassword(this)" required>
						<span class="focus-input100"></span>	
                    </div>
                    <p id="p6" style="color: red;"></p>

                    <div class="wrap-input100 validate-input m-b-18">
						<span class="label-input100">Confirm Password</span>
						<input class="input100" type="password" id="password1" name="pass" placeholder="Enter password" onblur="validatePassword1(this)" required>
						<span class="focus-input100"></span>
					</div>
                    <p id="p7" style="color: red;"></p>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn" name="submit" type="submit" id="submit" >
							SignUp
						</button>
					</div>
				</form>
			</div>
		</div>
    </div>
    <script src="sign_up.js"></script>
            </body>
        </html>

    <?php
    }

}
?>
