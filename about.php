<?php
/*
* Contains information about Blue Lake Company
 */

 //session starts
session_start();    

//check if session username is valid or exists
if($_SESSION["username"]){
    ?>
    <!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="utf-8" />
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
            <title>About</title>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
            <link rel="icon" type="image/x-icon" href="img/favicon.ico" />
            <script src="https://use.fontawesome.com/releases/v5.13.0/js/all.js" crossorigin="anonymous"></script>
            <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet" />
            <link href="https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic" rel="stylesheet" type="text/css" />
            <link href="css/styles.css" rel="stylesheet" /> 
        </head>
        <body id="page-top">
            <!-- Navigation bar -->
            <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
                <img class="navbar-brand" src="images/icon.svg" alt="logo" style="width:40px;">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <a class="nav-link" href="about.html" style="color:rgb(226, 101, 101);">About</a>
                <a class="nav-link" href="services.php" style="color: white">Services</a>
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

            <!-- Page Content -->
            <section class="page-section bg-white">
            <h2 class="text-center mt-0">We've got what you need!</h2>
            <hr class="divider primary my-4" />
            <img src="images/home.jpg" style="width: 100%; height: 100%;"> 
                        
            <div class="container">      
                <hr class="divider primary my-4" />
                <div class="row justify-content-center">
                    <div class="col-sm-6 text-center">
                        <p class="text-primary mt-0" style="font-size: 18px; ">Want to view apartments and make arrangement
                            from the comfort of your home? Want to advertise an apartment for sale or rent? Want to connect to real
                            estate agents to work on your behalf? Look no further! Blue Lake Real Estate is here for you !
                        </p>   
                    </div>
                    <div class="col-sm-6 text-center">
                        <p class="text-primary mt-0" style="font-size: 18px; ">
                            At Blue Lake, we provide quality and reliable services
                            to our customers, providing easy and affordable access to real estate opportunties and also
                            giving our customers the platform to sell their real estate properties as well. We are always at your service!
                        </p>
                    </div>
                </div>
                <br><br>

                <!-- The team -->
                <h2 class="text-center mt-0">MEET THE TEAM</h2>
                <hr class="divider primary my-4" />
                <div class="row">
                <div class="col-md-4">
                    <div class="thumbnail">
                        <img src="images/asempa.jpg" alt="Lights" style="width:100%; object-fit: cover; height: 373px;">
                        <div class="caption text-center">
                            <br>
                            <p>Kobina Asempa Takyi</p>
                            <p>Chief Operating Officer & Founder</p>  
                        </div>
                        </a>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="thumbnail">
                        <img src="images/moji.jpg" alt="Nature" style="width:100%; object-fit: cover; height: 373px;">
                        <div class="caption text-center">
                            <br>
                            <p>Mojosola Otusheso</p>
                            <p>Leasing Manager & Consultant</p>
                        </div>
                        </a>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="thumbnail">
                        <img src="images/ebo.jpg" alt="Fjords" style="width:100%; object-fit: cover; height: 373px;">
                        <div class="caption text-center">
                            <br>
                            <p>David Ebo Acquah</p>
                            <p>Home inspector & Property Manager</p>
                        </div>
                        </a>
                    </div>
                </div>  
            </div>
            <br>
            <div class="row justify-content-center">
                <a class="btn btn-light btn-xl js-scroll-trigger bg-primary" href="services.php">Get Started!</a>
            </div>
            </section>
        </body>
    </html>
<?php
}
?>

