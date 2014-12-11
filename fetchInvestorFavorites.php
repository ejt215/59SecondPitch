<?php
/* Name: fetchInvestorFavorites
 * Authors: Maxwell Smith & Eric Thornton
 * Description: Returns all entrepreneur ventures that an investor has matched with
 */
include_once 'FiftyNineDAO.php';
session_start();
$profileID = $_SESSION['profileid'];

$dao = new FiftyNineDAO();

//if (isset($_SESSION['last_visited']) && $_SESSION['last_visited'] == "investorHome"){
    $profiles = $dao->getInvestorFavorites($profileID);
    echo json_encode($profiles);
//}
