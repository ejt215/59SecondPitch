<?php

session_start();
include_once 'FiftyNineDAO.php';

$password = $_SESSION['password'];
$email = $_SESSION['email'];
$firstname = $_SESSION['firstname'];
$lastname = $_SESSION['lastname'];
$age = $_SESSION['age'];
$almamater = $_SESSION['almamater'];
$city = $_SESSION['city'];
$type = $_SESSION['type'];

if ($age == "") {
    $age = 0;
}

$dao = new FiftyNineDAO();

$sql = "INSERT INTO 59Profile (password,email,firstname,lastname,age,almamater,city)
VALUES ('$password','$email','$firstname','$lastname','$age','$almamater','$city')";

$dao->executeSQL($sql);


if ($type == "Investor") {
    header("Location: http://localhost/59SecondPitch/investorSignup.php");
    exit();
} else if ($type == "Entrepreneur") {
    header("Location: http://localhost/59SecondPitch/entrepreneurSignup.php");
    exit();
}
