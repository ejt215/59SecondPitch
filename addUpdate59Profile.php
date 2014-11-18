<?php

session_start();
include_once 'FiftyNineDAO.php';

$fiftynineprofileid = $_SESSION['profileid'];
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

if (isset($_SESSION['manage']) && $_SESSION['manage']) {
    $sql = "UPDATE 59profile " .
    "SET password = '" . $password . "'," .
    "email = '" . $email . "'," .
    "firstname = '" . $firstname . "'," .
    "lastname = '" . $lastname . "'," .
    "age = " . $age . "," .
    "almamater = '" . $almamater . "'," .
    "city = '" . $city . "' " .
    "WHERE 59profileid = '" . $fiftynineprofileid . "'";
    die($sql);
    $dao->executeSQL($sql);
}
else{
   $sql = "INSERT INTO 59Profile (password, email, firstname, lastname, age, almamater, city)
    VALUES ('$password', '$email', '$firstname', '$lastname', '$age', '$almamater', '$city')";

    $dao->executeSQL($sql); 
}
die($type);


if ($type == "Investor") {
    header("Location: http://localhost/59SecondPitch/investorSignup.php");
    exit();
} else if ($type == "Entrepreneur") {
    header("Location: http://localhost/59SecondPitch/entrepreneurSignup.php");
    exit();
}
