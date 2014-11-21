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
$workType = $_SESSION['workType'];
$workName = $_SESSION['workName'];
$workDesc = $_SESSION['workDesc'];
$business_id = $_SESSION['business_id'];

if (isset($_SESSION['editEntrepreneurProfile']) && $_SESSION['editEntrepreneurProfile']) {
    $sql = "UPDATE entrepreneur " .
            "SET business_type = '" . $workType . "'," .
            "business_name = '" . $workName . "'," .
            "business_description = '" . $workDesc . "' " .
            "WHERE 59profileid = " . $profileID . " " .
            "AND business_id = " . $business_id;
    $dao->executeSQL($sql);
    header("Location: entrepreneurIdeas.php");
} else {

    $sql = "INSERT INTO entrepreneur (59profileid,business_type,business_name,business_description)" .
            "VALUES ('$profileID','$workType','$workName','$workDesc')";

    $dao->executeSQL($sql);
    header("Location: entrepreneurHome.php");
}










