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
$extension = $_SESSION['extension'];
$profilepicture = $_SESSION['profilepicture'];

if ($age == "") {
    $age = 0;
}

$dao = new FiftyNineDAO();

if (isset($_SESSION['last_visited']) && $_SESSION['last_visited'] == "manage") {
    $sql = "UPDATE 59profile " .
            "SET password = '" . $password . "'," .
            "email = '" . $email . "'," .
            "firstname = '" . $firstname . "'," .
            "lastname = '" . $lastname . "'," .
            "age = " . $age . "," .
            "almamater = '" . $almamater . "'," .
            "city = '" . $city . "' " .
            "WHERE 59profileid = '" . $fiftynineprofileid . "'";
    $dao->executeSQL($sql);
    if ($type == "Investor") {
        header("Location: http://localhost/59SecondPitch/investorHome.php");
        exit();
    } else if ($type == "Entrepreneur") {
        header("Location: http://localhost/59SecondPitch/entrepreneurHome.php");
        exit();
    }
} else {
    $sql = "INSERT INTO 59profile (password, email, firstname, lastname, age, almamater, city, profilepicture)
    VALUES ('$password', '$email', '$firstname', '$lastname', '$age', '$almamater', '$city',NULL)";
    
    $dao->executeSQL($sql);
    $fiftynineprofileid = $dao->get59ProfileIDFromEmail($email);
    $_SESSION['profileid'] = $fiftynineprofileid;
    if (!rename($profilepicture,"PROFILE_PICTURES/P" . $fiftynineprofileid . "." . $extension)){
        die("Could not rename profile picture file for filesystem");
    }else{
        //die("File renamed");
    }
    $sql = "UPDATE 59profile " .
            "SET profilepicture = 'P" . $fiftynineprofileid . "." . $extension . "' " .
            "WHERE 59profileid = " . $fiftynineprofileid;
    $dao->executeSQL($sql);
   
    if ($type == "Investor") {
        header("Location: http://localhost/59SecondPitch/investorSignup.php");
        exit();
    } else if ($type == "Entrepreneur") {
        header("Location: http://localhost/59SecondPitch/entrepreneurSignup.php");
        exit();
    }
}



