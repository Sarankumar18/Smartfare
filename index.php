<?php


 
//Define your database name here.
$HostName = "localhost";
 
//Define your database name here.
$DatabaseName = "id12617037_smartfare";
 
//Define your database username here.
$HostUser = "id12617037_smartfaredb";
 
//Define your database password here.
$HostPass = "*FL0=VeeQyb^6*VX";

$conn = mysqli_connect($HostName,$HostUser,$HostPass,$DatabaseName);

$EncodedData = file_get_contents('php://input');
$DecodedData = json_decode($EncodedData,true);

$eid = $DecodedData['eid'];
$password = $DecodedData['password'];

$Login  = "SELECT * FROM employee WHERE eid = '$eid'";
$data = $conn->query($Login);
$status;
if (mysqli_num_rows($data) > 0) {
while($row = mysqli_fetch_assoc($data))
    {
        $Eid = $row['eid'];
        $Password = $row['password'];
        $Name = $row['name'];
        
    }
   
}
else{
   $message = "No Employee Found";

}
  if($password != $Password){
    $message = "Incorrect Password";
  }

$Response[] = array("eid"=> $Eid,"password"=> $Password, "name"=> $Name,"status"=> $status);
echo json_encode($Response);


?>
