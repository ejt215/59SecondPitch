<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


include_once 'FiftyNineDAO.php';
session_start();
$profileID = $_SESSION['profileid'];

$dao = new FiftyNineDAO();

//if (isset($_SESSION['last_visited']) && $_SESSION['last_visited'] == "investorHome"){
    $profiles = $dao->getInvestorFavorites($profileID);
    //die(count($profiles);
    echo json_encode($profiles);
//}
