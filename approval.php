
<?php
/*
* Program Displays apartments to users pending approval
*/
require 'db_credentials.php';
//start session
session_start();
echo "<script>alert('Check email for confirmation');</script>";
// Create database connection
$db = mysqli_connect(SERVER, USERNAME, PASSWD, DATABASE)  or die(mysqli_error($db));
$sql = "SELECT * FROM apartment where Approved = 'No' order by time_posted DESC";
//execute query
$result = mysqli_query($db, $sql) or die(mysqli_error($db));
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
<title>Pending</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="icon" type="image/x-icon" href="img/favicon.ico" />
    <script src="https://use.fontawesome.com/releases/v5.13.0/js/all.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic" rel="stylesheet" type="text/css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
</head>
<body id="page-top">
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <img class="navbar-brand" src="images/icon.svg" alt="logo" style="width:40px;">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
            </button>
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <a href="approval.php" class="nav-link" style="color: color:rgb(226, 101, 101);">Approval</a>
            <a href="services.php" class="nav-link" style="color: white;">Services</a>
            <div class="dropdown" >
                <button class="dropdown-toggle bg-dark navbar-dark" type="button" style="color: white;"
                data-toggle="dropdown" >
                Profile</button>
                <div class="dropdown-menu" >
                    <p class="dropdown-item"><i class="fas fa-2x fa-user"></i>
                    <?php echo "@".$_SESSION["username"]; ?></p>
                    <p class="dropdown-item"><?php echo $_SESSION["firstname"]; ?><?php echo" ". $_SESSION["lastname"]; ?></p>
                    <a class="dropdown-item" href="userLogout.php" style="color:rgb(226, 101, 101);">Logout</a>
                </div>
            </div>
        </div>
    </nav>
    <div style='background-color: #FFF8DC;'>
    <br><br>
    <!--Displays apartments from database -->
    <?php
    while ($row = mysqli_fetch_array($result)) {
        echo "<div dlass='card' style='width: 70%; margin: auto; border: 2px solid black;'>";
        echo "<img style='height: 600px; width: 100%;'src='apartments/".$row['MyImage']."' >";
            echo "<div class='container' style='padding: 2px 16px; background-color: white;'>";
                echo "<p style='word-wrap: break-word'> Brief Description: "; 
                echo $row['MyDescription']. "</p> ";
                echo "<p style='word-wrap: break-word'> Address: ";   
                echo $row['MyLocation']. ".</p> ";
                echo "<p>Price: GHC ";
                echo $row['MyPrice']. " </p>";
                echo "<p class='text-muted'> Posted on: ";
                    echo $row['time_posted']. "</p>";
                echo "<button class='btn btn-success' disabled>
                <span class='spinner-grow spinner-grow-sm'></span>
                Pending Approval...
                </button>";
            echo "</div>";

        echo "</div><br><br>";
      }
      mysqli_close($db);
      ?>
    </div>
</body>
</html>