<?php
/*
Program to reject advertisement request and sends customer email
*/
require 'db_credentials.php';
require 'vendor/autoload.php';
use \Mailjet\Resources; //mailjet API resources
//connect to database
$db = mysqli_connect(SERVER, USERNAME, PASSWD, DATABASE)  or die(mysqli_error($db));
//get id
$id = isset($_GET['id']) ? $_GET['id'] : '';
//get apartment details
$query = "SELECT * from apartment where ApartmentID = '$id'";
$result1 = mysqli_query($db, $query);
$row = mysqli_fetch_array($result1);
$customer = $row['posted_by'];
$image = $row['MyImage'];
$location = $row['MyLocation'];
$price = $row['MyPrice'];
$image_text = $row['MyDescription'];

//get customer who booked apartment details
$query1 = "SELECT * from customer where Username = '$customer'";
$result2 = mysqli_query($db, $query1);
$row1 = mysqli_fetch_array($result2);
$email = $row1['PrimaryEmail'];
$firstname = $row1['FirstName'];
$lastname = $row1['SurName'];

//image path
$path1 = "apartments/".$image;
//delete from database and folder
unlink($path1);
$query = "DELETE from apartment WHERE ApartmentID= '$id'"; 
$result = mysqli_query($db,$query) or die ( mysqli_error($db));
if($result){
    mysqli_close($db);
    header('Location: requests.php');
} 

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
            'Email' => "".$email."",
            
            
        ]
        ],
        'Subject' => "Advertisement Request -[REJECTED]",
        'TextPart' => "My first Mailjet email",
        'HTMLPart' => "<h3>Dear ". $firstname ." ". $lastname.",</h3> Thank you for advertising an apartment with the Description: <b>". $image_text.
        "</b>, located at <b>" .$location. "</b> and costs <b>GHC". $price."</b>".
        " We are sorry to inform you that your request has been rejected.
        We will continue to interact with you on why the request was rejected. Reply by confirming details shortly. 
        <p>Best.</p>
        <p>Blue Lake.</p>",
        
        'CustomID' => "AppGettingStartedTest"
        
    ]
    ]
];
$response = $mj->post(Resources::$Email, ['body' => $body]);



?>
