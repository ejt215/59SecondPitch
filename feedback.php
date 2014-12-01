<?php
session_start();
require_once 'FiftyNineDAO.php';

//$value = json_decode($_POST['id']);
//$business_id = $value['businessid'];
$business_id = $_POST['businessid'];
$radio = $_POST['radio'];
if(isset($_POST['other'])){
    $other = $_POST['other'];
}
else{
    $other =  "";
}
echo "DSFDSFDSFDSFSDF".$_POST['businessid'];
echo "fsdfssafasf".$_POST['radio'];


$dao = new FiftyNineDAO();
$dao->feedback($business_id, $radio,$other);
//small change
//die($email . "        " . $pass . "               " . $dao->verify($email, $pass));

header("Location:  browse.php");
?>