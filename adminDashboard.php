<?php
/*
*Mini Dashboard features for company admin
*/

//session starts
session_start();

//check for admin username...
if($_SESSION["admin"]){
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <title>Admin</title>
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
            <span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="collapsibleNavbar">
                <a class="nav-link" href="adminDashboard.php" style="color: rgb(226, 101, 101)">Dashboard</a>
                <a href="changePassword.html"><button class="bg-dark navbar-dark" type="button"
                style="color: white;">Reset Credentials</button></a>
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

        <section class="page-section" id="services">
            <div class="container">
            <h2 class="text-center mt-0">Blue Lake Real Estate</h2>
            <hr class="divider my-4" />
                <div class="row">
                    <div class="col-lg-2 col-md-6 text-center">
                        <div class="mt-5">
                            <i class="fas fa-4x fa-eye text-primary mb-4"></i>
                            <a href="AdmingeneralView.php"><h3 class="h4 mb-2">View Properties</h3></a> 
                        </div>
                    </div>

                    <div class="col-lg-2 col-md-6 text-center">
                        <div class="mt-5">
                            <i class="fas fa-4x fa-check text-primary mb-4"></i> 
                            <a href="requests.php"><h3 class="h4 mb-2">Check Requests</h3></a>
                        </div>
                    </div>

                    <div class="col-lg-2 col-md-6 text-center">
                        <div class="mt-5">
                            <i class="fas fa-4x fa-bell text-primary mb-4"></i>
                            <a href="adminHousing.html"><h3 class="h4 mb-2">Advertise Property</h3></a>  
                        </div>
                    </div>

                    <div class="col-lg-2 col-md-6 text-center">
                        <div class="mt-5">
                            <i class="far fa-4x fa-edit text-primary mb-4"></i>
                            <a href="deleteView.php"><h3 class="h4 mb-2">Edit Properties</h3></a>   
                        </div>
                    </div>

                    <div class="col-lg-2 col-md-6 text-center">
                        <div class="mt-5">
                            <i class="fas fa-4x fa-user text-primary mb-4"></i>
                            <a href="agents.html"><h3 class="h4 mb-2">Add New Agent</h3></a>   
                        </div>
                    </div>

                    <div class="col-lg-2 col-md-6 text-center">
                        <div class="mt-5">
                            <i class="fas fa-4x fa-user-edit text-primary mb-4"></i>
                            <a href="adminViewAgent.php"><h3 class="h4 mb-2">View/Edit Agents</h3></a>  
                        </div>
                    </div>
        
                </div>
                </div>
            </div>
        </section>
    </body>
</html>
<?php
}
?>
