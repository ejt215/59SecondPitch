<?php
/* Name: browseMatching
 * Authors: Maxwell Smith & Eric Thornton
 * Description:  Processes the match when an investor matches with an entrepreneur idea
 */

session_start();
require_once 'FiftyNineDAO.php';

$business_id = $_POST['businessid'];
$match = $_POST['match'];
$profileID = $_SESSION['profileid'];
$dao = new FiftyNineDAO();
$dao->match($profileID, $business_id,$match);

header("Location:  browse.php");
?>

