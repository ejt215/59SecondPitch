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

$dao->insertInvestorProfile($profileID,$class,$contact_type,$contact_preferences,$phoneNumber);

header("Location: investorHome.php");
?>
