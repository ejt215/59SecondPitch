<?php

session_start();
require_once 'FiftyNineDAO.php';

//$value = json_decode($_POST['id']);
//$business_id = $value['businessid'];
$business_id = $_POST['businessid'];
$profileID = $_SESSION['profileid'];
$dao = new FiftyNineDAO();
$dao->match($profileID, $business_id);
//small change
//die($email . "        " . $pass . "               " . $dao->verify($email, $pass));

header("Location:  browse.php");
?>

