<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$con=mysqli_connect("162.242.219.56:3306","59App","AppAppDevDev?");

if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}



//$username = mysqli_real_escape_string($con, $_POST['username']);
$password = mysqli_real_escape_string($con, trim($_POST['password']));
$firstname = mysqli_real_escape_string($con, trim($_POST['firstname']));
$lastname = mysqli_real_escape_string($con, trim($_POST['lastname']));
$email = mysqli_real_escape_string($con, trim($_POST['email']));
$age = mysqli_real_escape_string($con, trim($_POST['age']));
$almamater = mysqli_real_escape_string($con, trim($_POST['almamater']));
$city = mysqli_real_escape_string($con, trim($_POST['city']));
$selected = mysqli_select_db($con,"59App") 
  or die("Could not select examples");
//$sql1 = "select email from investor where email=".$email;


//$result1 = mysqli_query($con,$sql1);
//$numRows = $result->num_rows;
//if($numRows >0){
    
//}

$sql="INSERT INTO investor (email,password,firstname,lastname,age,almamater,city)
VALUES ('$email','$password','$firstname','$lastname','$age','$almamater','$city')";

if (!mysqli_query($con,$sql)) {
  die('Error: ' . mysqli_error($con));
}

$result = mysqli_query($con,"SELECT firstname,almamater FROM investor WHERE email ='".$email."'");
//fetch tha data from the database
while ($row = mysqli_fetch_array($result)) {
   echo "Hello ".$row{'firstname'}." your almamater is ".$row{'almamater'}; 
   
}

mysqli_close($con);