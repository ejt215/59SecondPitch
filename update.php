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


$name = mysqli_real_escape_string($con, $_POST['name']);

$username = mysqli_real_escape_string($con, $_POST['username']);
$selected = mysqli_select_db($con,"test") 
  or die("Could not select examples");
$sql="INSERT INTO test (name, username)
VALUES ('$name', '$username')";

if (!mysqli_query($con,$sql)) {
  die('Error: ' . mysqli_error($con));
}

$result = mysqli_query($con,"SELECT name,username FROM test WHERE username ='".$username."'");
//fetch tha data from the database
while ($row = mysqli_fetch_array($result)) {
   echo "Hello ".$row{'name'}." your username is ".$row{'username'}; 
   
}

mysqli_close($con);