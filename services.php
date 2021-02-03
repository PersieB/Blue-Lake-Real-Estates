
<?php
/*
Program displays company services to customers
*/
session_start();
if($_SESSION["username"]){
    ?>
    <!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="utf-8" />
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
            <title>Services</title>
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
                <a class="nav-link" href="about.php" style="color: white">About</a>
                <a class="nav-link" href="services.php" sstyle="color:rgb(226, 101, 101);">Services</a>
                <a class="nav-link" href="contact.php" style="color: white">Contact</a>
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
            
            <section class="page-section" id="services">
                <div class="container">
                    <h2 class="text-center mt-0">At Your Service</h2>
                    <hr class="divider my-4" />
                    <div class="row">
                        <div class="col-lg-3 col-md-6 text-center">
                            <div class="mt-5">
                                <i class="fas fa-4x fa-eye text-primary mb-4"></i>
                                <a href="UsergeneralView.php"><h3 class="h4 mb-2">View Properties</h3></a>
                                <p class="text-muted mb-0">Enjoy the wonderful apartments being advertised !</p>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 text-center">
                            <div class="mt-5">
                                <i class="fas fa-4x fa-shopping-cart text-primary mb-4"></i> 
                                <a href="purchase.php"><h3 class="h4 mb-2">Purchase / Rent</h3></a>
                                <p class="text-muted mb-0">Book an apartment with minimum delay !</p>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 text-center">
                            <div class="mt-5">
                                <i class="fas fa-4x fa-bell text-primary mb-4"></i>
                                <a href="housing.html"><h3 class="h4 mb-2">Advertise Property</h3></a>
                                <p class="text-muted mb-0">Advertise apartment and Pay just 0.3% of price as charge !</p>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 text-center">
                            <div class="mt-5">
                                <i class="fas fa-4x fa-users text-primary mb-4"></i>
                                <a href="viewAgents.php"><h3 class="h4 mb-2">Connect to Agents</h3></a>
                                <p class="text-muted mb-0">Let noble Real Estate Agents work for you !</p>
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