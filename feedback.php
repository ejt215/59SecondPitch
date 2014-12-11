<?php
 /*Name: feedback
 * Authors: Maxwell Smith & Eric Thornton
 * Description: Inserts investor feedback for entrepreneur ideas into the database
 */
session_start();
require_once 'FiftyNineDAO.php';

$business_id = $_POST['businessid'];
$radio = $_POST['radio'];

if(isset($_POST['other'])){
    $other = $_POST['other'];
}
else{
    $other =  "";
}

$dao = new FiftyNineDAO();
$dao->feedback($business_id, $radio,$other);

header("Location:  browse.php");
?>