<?php
/*
Verifies user details and login
*/
require 'db_credentials.php';
//start session
session_start();
if(isset($_POST['submit'])){
    $Username = filter_input(INPUT_POST, 'username');
    $user_password = filter_input(INPUT_POST, 'pass'); 
    $Username1 = trim($Username);
    $user_password1 = trim($user_password);

    // Create connection
    $conn = mysqli_connect(SERVER, USERNAME, PASSWD, DATABASE)  or die(mysqli_error($conn));
    
    // first check the database to make sure  a user already exist with the same username and/or email
    $password = md5($user_password1);//encrypt the password before saving in the database
    $user_check_query = "SELECT * FROM customer WHERE Username='$Username1' AND MyPassword='$password'";
    $result = mysqli_query($conn, $user_check_query);
    //check admin credentials as well
    $user_check_query1 = "SELECT * FROM admin WHERE Username='$Username' AND CompPassword='$password'";
    $result1 = mysqli_query($conn, $user_check_query1);
    //user info from database
    $row = mysqli_fetch_array($result);
    //if user exists
    if(is_array($row)){
        $_SESSION["CustID"] = $row['CustomerID'];
        $_SESSION["username"] = $row['Username'];
        $_SESSION["email"] = $row['PrimaryEmail'];
        $_SESSION["firstname"] = $row['FirstName'];
        $_SESSION["lastname"] = $row['SurName'];
        header('location: about.php');
        //echo 'success';
    }

    //admin info
    $row1 = mysqli_fetch_array($result1);
    //if the login credentials were admin's
    if(is_array($row1)){
        $_SESSION["AdminID"] = $row1['AdminID'];
        $_SESSION["admin"] = $row1['Username'];
        $_SESSION["name"] = $row1['CompName'];
        $_SESSION["AdminEmail"] = $row1['CompEmail'];
        header('location: adminDashboard.php');
    }

    if(mysqli_num_rows($result) == 0 || mysqli_num_rows($result1) == 0){
        ?>
        <!DOCTYPE html>
            <html lang="en">
            <head>
                <title>Login</title>
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
            <body>
            <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
                <img class="navbar-brand" src="images/icon.svg" alt="logo" style="width:40px;">
                <h5 style="color: rgb(219, 94, 94);">Blue Lake</h5>
                <h5 style="margin-left: auto; margin-right: auto; color: rgb(226, 101, 101);">Login</h5>
                <a href="index.html" class="nav-link" style="color: white">Home</a>
            </nav>
                <div  class="limiter">
                    <div class="container-login100 p-3 mb-2 bg-secondary text-white" >
                        <div class="wrap-login100">
                            <div class="login100-form-title" style="background-image: url(images/bg-01.jpg);">
                                <span class="login100-form-title-1">
                                    Sign In
                                </span>
                            </div>

                            <form class="login100-form validate-form" method="POST" action="logindb.php">
                            <div> 
                        <a href="index.html" class="txt1" style="color: rgb(207, 7, 7);">
                            <h6>CANCEL</h6><br>
                        </a> 
                    </div>
                        <?php echo "<p style='color: red;'>User does not exist. Might want to create an account!</p>"?>
                        <div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
                            <span class="label-input100">Username</span>
                            <input class="input100" type="text" name="username" placeholder="Enter username"
                            required>
                            
                        </div>

                        <div class="wrap-input100 validate-input m-b-18" data-validate = "Password is required">
                            <span class="label-input100">Password</span>
                            <input class="input100" type="password" name="pass" placeholder="Enter password" required>
                            
                        </div>
                        
                        <div class="flex-sb-m w-full p-b-30">
                            <p style="color: green;">Don't have an account? -></p>

                            <div>
                                <a href="signup.html" class="txt1" style="color: green;">
                                    <b>CREATE ACCOUNT</b>
                                </a>
                            </div>
                        </div>

                        <div class="container-login100-form-btn">
                            <button class="login100-form-btn" name="submit" id="submit" type="submit">
                                Login
                            </button>
                        </div>
                        </form>
                        </div>
                    </div>
                </div>
            </body>
            </html>
            <?php
    }
}
?>