<?php
/* Name: fetchInvestorTracks
 * Authors: Maxwell Smith & Eric Thornton
 * Description: Returns all entrepreneur ventures that an investor has maybe'd
 */
include_once 'FiftyNineDAO.php';
session_start();
$profileID = $_SESSION['profileid'];

$dao = new FiftyNineDAO();

    $profiles = $dao->getInvestorTracks($profileID);
    //die(count($profiles);
    echo json_encode($profiles);
