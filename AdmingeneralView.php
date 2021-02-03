<?php
/*
*Program to display properties being advertised to admin
*/

require 'db_credentials.php';
//start session
session_start();
//check for admin username...
if($_SESSION["admin"]){
    $page = isset($_GET['page']) ? $_GET['page'] : '';
    if($page=="" || $page=="1"){
        $page1 = 0;
    }
    else{
        $page1 = ($page*5)-5;
    }
    // Create database connection
    $db = mysqli_connect(SERVER, USERNAME, PASSWD, DATABASE)  or die(mysqli_error($db));
    //execute query
    $result = mysqli_query($db, "SELECT * FROM apartment where Approved = 'Yes' order by time_posted DESC  limit $page1,5");
    ?>
    <!DOCTYPE html>
    <html>
    <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Properties</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <link rel="icon" type="image/x-icon" href="img/favicon.ico" />
        <script src="https://use.fontawesome.com/releases/v5.13.0/js/all.js" crossorigin="anonymous"></script>
        <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic" rel="stylesheet" type="text/css" />
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body id="page-top">
        <!-- navigation bar -->
        <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
            <img class="navbar-brand" src="images/icon.svg" alt="logo" style="width:40px;">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavbar">
                <a class="nav-link" href="AdmingeneralView.php" style="color:rgb(226, 101, 101);">Properties</a>
                <a class="nav-link" href="adminDashboard.php" style="color: white">Dashboard</a>
                <div class="dropdown" >
                    <button class="dropdown-toggle bg-dark navbar-dark" type="button" style="color: white;"
                    data-toggle="dropdown" >
                    Profile</button>
                    <div class="dropdown-menu" >
                        <p class="dropdown-item"><i class="fas fa-2x fa-user"></i>
                        <?php echo "@".$_SESSION["admin"]; ?></p>
                        <p class="dropdown-item"> <?php echo $_SESSION["name"]; ?></p>
                        <a class="dropdown-item" href="adminLogout.php" style="color:rgb(226, 101, 101);">Logout</a>
                    </div>
                </div>
            </div>
        </nav>
        <div style='background-color: #FFF8DC;'><br><br>

        <!-- Display Apartments from database-->
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
                    echo "<p class='text-muted'> Last Update: ";
                    echo $row['time_posted']. "</p>";
                    echo "</div>";
            echo "</div><br><br>";
        }
        $result1 = mysqli_query($db, "SELECT * FROM apartment where Approved = 'Yes' order by time_posted DESC");
        $count = mysqli_num_rows($result1);
        $per_page = ceil($count / 5);
        echo "<div  style='width: 70%; margin: auto; text-align: center;'>";
        for($b = 1; $b <=$per_page; $b++){
            ?> <a style='font-size: 30px;color: black;'href="AdmingeneralView.php?page=<?php echo $b; ?>">
             <?php echo "&laquo; ". $b." &raquo; ";?></a> <?php
        }
        echo "</div>";
        mysqli_close($db);
        ?>
        </div>
    </body>
    </html>
<?php
}
?>