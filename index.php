<?php
 
//Define your host here.
$HostName = "sql207.epizy.com";
 
//Define your database name here.
$DatabaseName = "epiz_28244514_smartfare";
 
//Define your database username here.
$HostUser = "epiz_28244514";
 
//Define your database password here.
$HostPass = "QIAi0ePi11O";

$conn = mysqli_connect($HostName,$HostUser,$HostPass,$DatabaseName);

$json = file_get_contents('php://input');

$obj = json_decode($json,true);

$username = $obj['username'];
 
// Populate User email from JSON $obj array and store into $email.
$email = $obj['email'];
 
// Populate Password from JSON $obj array and store into $password.
$password = $obj['password'];
$CheckSQL = "SELECT * FROM user WHERE email='$email'";

// Executing SQL Query.
$check = mysqli_fetch_array(mysqli_query($con,$CheckSQL));


if(isset($check)){

 $EmailExistMSG = 'Email Already Exist, Please Try Again !!!';
 
 // Converting the message into JSON format.
$EmailExistJson = json_encode($EmailExistMSG);
 
// Echo the message.
 echo $EmailExistJson ; 

 }
 else{
 
    // Creating SQL query and insert the record into MySQL database table.
   $Sql_Query = "insert into user (username,email,password) values ('$username','$email','$password')";
    
    
    if(mysqli_query($con,$Sql_Query)){
    
    // If the record inserted successfully then show the message.
   $MSG = 'User Registered Successfully' ;
    
   // Converting the message into JSON format.
   $json = json_encode($MSG);
    
   // Echo the message.
    echo $json ;
    
    }
    else{
    
    echo 'Try Again';
    
    }
    }
    mysqli_close($con);

 
?>
