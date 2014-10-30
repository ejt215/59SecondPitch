<?php

session_start();
include_once 'fiftynineDAO.php';



$username = $_SESSION['username'];
$password = $_SESSION['password'];
$email = $_SESSION['email'];
$firstname = $_SESSION['firstname'];
$lastname = $_SESSION['lastname'];
$age = $_SESSION['age'];
$almamater = $_SESSION['almamater'];
$city = $_SESSION['city'];
$type = $_SESSION['type'];

if($age ==""){
    $age =0;
}

$dao = new fiftynineDAO();

$sql="INSERT INTO 59Profile (username,password,email,firstname,lastname,age,almamater,city)
VALUES ('$username','$password','$email','$firstname','$lastname','$age','$almamater','$city')";

$dao->executeSQL($sql);

if($type=="Investor"){
    header("Location: http://localhost/59SecondPitch/Investor.php"); 
    exit();
}
else if ($type =="Entrepreneur"){
    header("Location: http://localhost/59SecondPitch/Entrepreneur.php"); 
    exit();
}
