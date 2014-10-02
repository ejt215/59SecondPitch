<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$con=mysqli_connect("127.0.0.1","root","");

if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}



$username = mysqli_real_escape_string($con, $_POST['username']);
$password = mysqli_real_escape_string($con, $_POST['password']);
$firstname = mysqli_real_escape_string($con, $_POST['firstname']);
$lastname = mysqli_real_escape_string($con, $_POST['lastname']);
$email = mysqli_real_escape_string($con, $_POST['email']);
$age = mysqli_real_escape_string($con, $_POST['age']);
$almamater = mysqli_real_escape_string($con, $_POST['almamater']);
$city = mysqli_real_escape_string($con, $_POST['city']);
$selected = mysqli_select_db($con,"59SecondPitch") 
  or die("Could not select examples");
$sql1 = "select email from investor where email=".$email;


$result1 = mysqli_query($con,$sql1);
$numRows = $result->num_rows;
if($numRows >0){
    
}

$sql="INSERT INTO investor (username,password,firstname,lastname,email,age,almamater,city)
VALUES ('$username','$password','$firstname','$lastname','$email','$age','$almamater','$city')";

if (!mysqli_query($con,$sql)) {
  die('Error: ' . mysqli_error($con));
}

$result = mysqli_query($con,"SELECT firstname,almamater FROM investor WHERE username ='".$username."'");
//fetch tha data from the database
while ($row = mysqli_fetch_array($result)) {
   echo "Hello ".$row{'firstname'}." your almamater is ".$row{'almamater'}; 
   
}

mysqli_close($con);