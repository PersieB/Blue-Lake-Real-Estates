<?php
/*
*Program approves advertisement requests from customers  and send email to customers
*/
require 'db_credentials.php';
require 'vendor/autoload.php';
use \Mailjet\Resources; //mailjet API resources
//connect to database
$db = mysqli_connect(SERVER, USERNAME, PASSWD, DATABASE)  or die(mysqli_error($db));

$id = $_GET['id']; // get id through query string

//select apartment details
$query = "SELECT * from apartment where ApartmentID = '$id'";
$result1 = mysqli_query($db, $query);
$row = mysqli_fetch_array($result1);

//get customer who posted and house details
$customer = $row['posted_by'];

//get apartment details
$image = $row['MyImage'];
$location = $row['MyLocation'];
$price = $row['MyPrice'];
$image_text = $row['MyDescription'];

//time zone
date_default_timezone_set("GMT");
$curDate = date('Y-m-d H:i:s');

//get customer details
$query1 = "SELECT * from customer where Username = '$customer'";
$result2 = mysqli_query($db, $query1);
$row1 = mysqli_fetch_array($result2);
$email = $row1['PrimaryEmail'];
$firstname = $row1['FirstName'];
$lastname = $row1['SurName'];

//query and execution to set Approved status to Yes
$sql = "UPDATE apartment set Approved = 'Yes',time_posted = '$curDate' where ApartmentID = '$id'";
$result = mysqli_query($db, $sql);

//check if query is successful
if($result){
    mysqli_close($db);
    header('Location: AdmingeneralView.php');
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
        'Subject' => "Advertisement Request -[APPROVED]",
        'TextPart' => "My first Mailjet email",
        'HTMLPart' => "<h3>Dear ". $firstname ." ". $lastname.",</h3> Thank you once again for advertising an apartment with
         the Description: <b>". $image_text."</b>, located at <b>" .$location. "</b> and costs <b>GHC". $price."</b>".
        " We are glad to inform you that your request has been approved and we will help to ensure successful purchase or rent of your apartment. We 
        will continue to interact and make arrangements shortly. Reply by confirming details shortly. 
        <p>Best.</p>
        <p>Blue Lake.</p>",
        
        'CustomID' => "AppGettingStartedTest"
        
    ]
    ]
];
$response = $mj->post(Resources::$Email, ['body' => $body]);


?>