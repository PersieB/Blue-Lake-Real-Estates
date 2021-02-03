<?php
session_start();
if($_SESSION["username"]){
    ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="utf-8" />
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
            <title>Contact</title>
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
        <body id="page-top" style="background-color: #fff;">
        <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
                <img class="navbar-brand" src="images/icon.svg" alt="logo" style="width:40px;">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavbar">
                <a class="nav-link" href="about.php" style="color: white">About</a>
                <a class="nav-link" href="services.php"  style="color: white">Services</a>
                <a class="nav-link" href="contact.php"  style="color:rgb(226, 101, 101);">Contact</a>
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
        <section class="page-section" id="contact">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-4 text-center">
                        <h2 class="mt-0">Let's Get In Touch!</h2>
                        <hr class="divider my-4" />
                        <p class="text-muted mb-5">Ready to start do more business with us? Give us a call, send us an
                            email or message us on linkedin and twitter and we will get back to you as soon as possible!</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3 ml-auto text-center mb-5 mb-lg-0">
                        <i class="fas fa-phone fa-3x mb-3 text-muted"></i>
                        <div>+233 (0) 543-814-371</div> 
                    </div>

                    <div class="col-lg-3 mr-auto text-center">
                        <i class="fas fa-envelope fa-3x mb-3 text-muted"></i>
                        <a class="d-block" href="mailto:lakeb6404@gmail.com">lakeb6404@gmail.com</a>
                    </div>

                    <div class="col-lg-3 mr-auto text-center">
                        <i class="fab fa-linkedin fa-3x mb-3 text-muted"></i>
                        <a class="d-block" href="https://www.linkedin.com/in/blue-lake-a8474b1bb/" target="_blank">Linedkin</a>
                    </div>

                    <div class="col-lg-3 mr-auto text-center">
                        <i class="fab fa-twitter fa-3x mb-3 text-muted"></i>
                        <a class="d-block" href="https://twitter.com/BlueLak47018055" target="_blank">Twitter</a>
                    </div>
                </div>
            </div>
        </section>	
        </body>
    </html>
    <?php
}
?>  