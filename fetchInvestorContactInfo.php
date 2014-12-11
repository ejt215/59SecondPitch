<?php
/* Name: fetchInvestorContactInfo
 * Authors: Maxwell Smith & Eric Thornton
 * Description: Returns investor contact info for all ivnestors that matched with 
 * any of an entrepreneur's ventures
 */
include_once 'FiftyNineDAO.php';
session_start();
$profileID = $_SESSION['profileid'];

$dao = new FiftyNineDAO();

if (isset($_SESSION['last_visited']) && $_SESSION['last_visited'] == "entrepreneurHome"){
    $profiles = $dao->getInvestorContactInfo($profileID);
    //die(count($profiles);
    echo json_encode($profiles);
}
?>

