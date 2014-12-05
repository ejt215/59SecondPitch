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
    header("Location: entrepreneurHome.php");
} elseif (isset($_SESSION['last_visited']) && $_SESSION['last_visited'] == "entrepreneurEditProfile") {
    $dao->updateEntrepreneurIdea($profileID,$_SESSION['business_id'],$_SESSION['workType'],$_SESSION['workName'], $_SESSION['business_video']);
    header("Location: entrepreneurIdeas.php"); 
} elseif (isset($_SESSION['last_visited']) && $_SESSION['last_visited'] == "entrepreneurSignup") { 
    $dao->insertEntrepreneurIdea($profileID,$_SESSION['workType'],$_SESSION['workName'], $_SESSION['business_video']);
    header("Location: entrepreneurHome.php");
} else {
    die("addUpdateDeleteEntrepreneurProfile");
}
?>