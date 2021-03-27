<?php
echo "Hello";
//Define your host here.
$HostName = "sql207.epizy.com";
 
//Define your database name here.
$DatabaseName = "epiz_28244514_smartfare";
 
//Define your database username here.
$HostUser = "epiz_28244514";
 
//Define your database password here.
$HostPass = "QIAi0ePi11O";

$conn = mysqli_connect($HostName,$HostUser,$HostPass,$DatabaseName);

 $username = $_POST['username'];
 $email = $_POST['email'];
 $password = $_POST['password'];

 $sql = "INSERT INTO user(username,email,password) VALUES ('$username','$email','$password')";

 $R = $conn->query($sql);

 if($R){
     $M = "Success";
 }
 else{
     $M = "Failed";
 }
 echo($M);

 
?>
