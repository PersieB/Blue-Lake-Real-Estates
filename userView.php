<?php
/*
Program inserts apartments pending approval into database
*/
require 'db_credentials.php';
require 'vendor/autoload.php';
  session_start();
  use \Mailjet\Resources; //mailjet API resources
  // Create database connection
  $db = mysqli_connect(SERVER, USERNAME, PASSWD, DATABASE)  or die(mysqli_error($db));

  // If upload button is clicked ...
  if (isset($_POST['submit'])) {
  	// Get image name
      $image = $_FILES['image']['name'];
  	// Get text
      $image_text = mysqli_real_escape_string($db, $_POST['image_text']);
      $price = mysqli_real_escape_string($db, $_POST['price']);
      $location = mysqli_real_escape_string($db, $_POST['loc']);

      date_default_timezone_set("GMT");
      $curDate = date('Y-m-d H:i:s');

  	// image file directory
  	$target = "apartments/".basename($image);
    $poster = $_SESSION["username"];
  	$sql = "INSERT INTO apartment (MyDescription, MyPrice, MyLocation, MyImage, Approved, time_posted, posted_by)
    VALUES ('$image_text', '$price', '$location', '$image', 'No', '$curDate', '$poster')";
  	// execute query
      mysqli_query($db, $sql);
      if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
          header('Location: approval.php');
      }
      if($_SESSION["username"]){

        /* Send email for notification */
        $mj = new \Mailjet\Client('3494195b708df1858f75020d3b2550ef','87913daad34c6e7b310b1259d9645b22',true,['version' => 'v3.1']);
        $body = [
            'Messages' => [
            [
                'From' => [
                'Email' => "lakeb6404@gmail.com",
               
                ],
                'To' => [
                [
                    'Email' => "".$_SESSION['email']."",
                    
                    
                ]
                ],
                'Subject' => "Advertisement Request Confirmation",
                'TextPart' => "My first Mailjet email",
                'HTMLPart' => "<h3>Dear ". $_SESSION['firstname'] ." ". $_SESSION['lastname'].",</h3> Thank you for 
                 advertising an apartment with the Description: <b>". $image_text.
                "</b>, located at <b>" .$location. "</b> and costs <b>GHC". $price."</b>".
                " You will receive an email notifying the status of your request as soon as it is approved or rejected. We will continue to interact and make arrangements shortly. Reply by confirming details shortly. 
                <p>Best.</p>
                <p>Blue Lake.</p>",
                
                'CustomID' => "AppGettingStartedTest"
                
            ]
            ]
        ];
        $response = $mj->post(Resources::$Email, ['body' => $body]);

        
      }  
  }
?>