<?php

session_start();
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$con=mysqli_connect("128.180.177.4:3307","guest","pitch","59secondpitch");
//$con=mysqli_connect("162.242.219.56","59App","AppAppDevDev?","59App");

if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}



//$username = mysqli_real_escape_string($con, filter_input(INPUT_POST, 'username'));
$username = $_SESSION['username'];
$password = $_SESSION['password'];
$email = $_SESSION['email'];
$firstname = $_SESSION['firstname'];


$lastname = $_SESSION['password'];
$age = $_SESSION['age'];
$almamater = $_SESSION['almamater'];
$city = $_SESSION['city'];
$type = $_SESSION['type'];
//$selected = mysqli_select_db($con,"59App") 
  //or die("Could not select examples");
//$sql1 = "select email from investor where email=".$email;


//$result1 = mysqli_query($con,$sql1);
//$numRows = $result->num_rows;
//if($numRows >0){
    
//}
if($age ==""){

    $age =0;

}

$sql="INSERT INTO 59Profile (username,password,email,firstname,lastname,age,almamater,city)
VALUES ('$username','$password','$email','$firstname','$lastname','$age','$almamater','$city')";



if (!mysqli_query($con,$sql)) {
  die('Error: ' . mysqli_error($con));
  
  
  
  
}
$sql1 = "select 59profileid from 59Profile where email = '".$email."'";
$result = mysqli_query($con,$sql1);
//fetch tha data from the database
while ($row = mysqli_fetch_array($result)) {
   $_SESSION['59profileid'] = $row{'59profileid'}; 
   
}
//echo "Yeah Buddy";

mysqli_close($con);


if($type=="Investor"){
    header("Location: http://localhost/59SecondPitch/Investor.php"); 
exit();
}
else if ($type =="Entrepreneur"){
    header("Location: http://localhost/59SecondPitch/Entrepreneur.php"); 
exit();
}




/*$result = mysqli_query($con,"SELECT firstname,almamater FROM 59Profile WHERE email ='".$email."'");
//fetch tha data from the database
while ($row = mysqli_fetch_array($result)) {
   echo "Hello ".$row{'firstname'}." your almamater is ".$row{'almamater'}; 
   
}*/


