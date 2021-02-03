<?php
/*
*Program sends email to customers who book an apartment for rent or sale
*/
require 'db_credentials.php';
require 'vendor/autoload.php';
//connect to database
$db = mysqli_connect(SERVER, USERNAME, PASSWD, DATABASE)  or die(mysqli_error($db));
//start session
session_start();
use \Mailjet\Resources; //mailjet API resources
if($_SESSION["username"]){
    $msg="";
    // get id through query string
    $id = $_GET['id'];
     
    //query to select Apartment details and add to email
    $sql = "SELECT * from apartment where ApartmentID = '$id'";
    //execute query
    $result = mysqli_query($db, $sql);
    $row = mysqli_fetch_array($result);

    //if record exists
    if($row > 0){
        //get details
        $location = $row['MyLocation'];
        $price = $row['MyPrice'];
        $image_text = $row['MyDescription'];
        $image = $row['MyImage'];

        header('location: services.php');
        
        //send mail for confirmation
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
                'Subject' => "Booking Confirmation & Arrangements.",
                'TextPart' => "My first Mailjet email",
                'HTMLPart' => "<h3>Dear ". $_SESSION['firstname'] ." ". $_SESSION['lastname'].",</h3> Thank you for showing interest in booking an apartment with the Description: <b>". $image_text."</b>".
                ", located at <b>" .$location. "</b> and costs <b>GHC". $price."</b>".
                " We will continue to interact and make arrangements shortly. Reply by confirming details shortly. 
                <p>Best,</p>
                <p>Blue Lake.</p>",
                
                'CustomID' => "AppGettingStartedTest"
                
            ]
            ]
        ];
        $response = $mj->post(Resources::$Email, ['body' => $body]);
        
        
    }
    

    
    
}
?>