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

if (isset($_POST['delete']) && $_POST['delete'] == "delete") {
    $dao->deleteEntrepreneurIdea(substr($_POST['business_id'], 2));
}
elseif (isset($_SESSION['last_visited']) && $_SESSION['last_visited'] == "editEntrepreneurProfile") {
    $dao->updateEntrepreneurIdea($profileID,$_SESSION['business_id'],$_SESSION['workType'],$_SESSION['workName'],$_SESSION['workDesc'], $_SESSION['business_video']);
    /*$workType = $_SESSION['workType'];
    $workName = $_SESSION['workName'];
    $workDesc = $_SESSION['workDesc'];
    $business_id = $_SESSION['business_id'];

    $sql = "UPDATE entrepreneur " .
            "SET business_type = '" . $workType . "'," .
            "business_name = '" . $workName . "'," .
            "business_description = '" . $workDesc . "'," . 
            "business_video = '" . $business_video . "' " .
            "WHERE 59profileid = " . $profileID . " " .
            "AND business_id = " . $business_id;
    $dao->executeSQL($sql);*/
    header("Location: entrepreneurIdeas.php"); 
} elseif (isset($_SESSION['last_visited']) && $_SESSION['last_visited'] == "entrepreneurSignup") {
    
    $dao->insertEntrepreneurIdea($profileID,$_SESSION['workType'],$_SESSION['workName'],$_SESSION['workDesc'], $_SESSION['business_video']);
    header("Location: entrepreneurHome.php");
} else {
    die("addUpdateDeleteEntrepreneurProfile");
}
?>