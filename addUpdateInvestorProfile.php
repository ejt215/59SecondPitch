<?php

session_start();

require_once 'FiftyNineDAO.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$dao = new FiftyNineDAO();
$email = $_SESSION['email'];
$profileID = $dao->get59ProfileIDFromEmail($email);
$_SESSION['profileid'] = $profileID;
$class = $_SESSION['userType'];
$contact_type = $_SESSION['contactType'];
$contact_preferences = $_SESSION['contactPref'];
$phoneNumber = $_SESSION['phoneNumber'];

if (isset($_SESSION['last_visited']) && $_SESSION['last_visited'] == "investorEditProfile") {
    $dao->updateInvestorProfile($profileID,$class,$contact_type,$contact_preferences,$phoneNumber);
    $_SESSION['class'] = $class;
    $_SESSION['contact_type'] = $contact_type;
    $_SESSION['contact_preferences'] = $contact_preferences;
    $_SESSION['phone'] = $phoneNumber;
    header("Location: investorHome.php"); 
} elseif (isset($_SESSION['last_visited']) && $_SESSION['last_visited'] == "investorSignup") { 
    $dao->insertInvestorProfile($profileID,$class,$contact_type,$contact_preferences,$phoneNumber);
    header("Location: investorHome.php");
} else {
    die("addUpdateInvestorProfile");
}



$dao->insertInvestorProfile($profileID,$class,$contact_type,$contact_preferences,$phoneNumber);

header("Location: investorHome.php");
?>
