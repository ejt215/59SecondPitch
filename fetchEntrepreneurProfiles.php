<?php

include_once 'FiftyNineDAO.php';
session_start();
$profileID = $_SESSION['profileid'];

$dao = new FiftyNineDAO();

if (isset($_SESSION['ideas']) && $_SESSION['ideas']){
    $profiles = $dao->getEntrepreneurProfiles($profileID);
    echo json_encode($profiles);
}
?>