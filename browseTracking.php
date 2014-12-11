<?php
/* Name: browseMatching
 * Authors: Maxwell Smith & Eric Thornton
 * Description:  Processes the maybe when an investor maybes an entrepreneur idea to do background research
 */
session_start();
require_once 'FiftyNineDAO.php';

$business_id = $_POST['businessid'];
$profileID = $_SESSION['profileid'];
$dao = new FiftyNineDAO();
$dao->track($profileID, $business_id);

header("Location:  browse.php");
?>
