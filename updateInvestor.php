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



$contactType = $_SESSION['contactType'] ;
            $userType =     $_SESSION['userType'];
               $contactPref = $_SESSION['contactPref'];


$sql="INSERT INTO investor (class,contact_type,contact_preferences)
VALUES ('$userType','$contactType','$contactPref')";



if (!mysqli_query($con,$sql)) {
  die('Error: ' . mysqli_error($con));
}

mysqli_close($con);


    header("Location: http://localhost/59SecondPitch/Investor.php"); 
    exit();










