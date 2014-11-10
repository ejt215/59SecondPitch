<?php
session_start();
require_once 'fiftynineDAO.php';

//$value = json_decode($_POST['id']);
//$business_id = $value['businessid'];
$business_id = $_POST['businessid'];
$profileID = $_SESSION['profileid'];
$dao = new fiftynineDAO();
$dao->match($profileID, $business_id);
//small change

    //die($email . "        " . $pass . "               " . $dao->verify($email, $pass));
    
header("Location:  Browse.php");







?>

