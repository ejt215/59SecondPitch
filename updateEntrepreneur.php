<?php
session_start();

require_once 'fiftynineDAO.php';
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$dao = new fiftynineDAO();
$email = $_SESSION['email'];
$profileID = $dao->get59ProfileIDFromEmail($email);
$workType = $_SESSION['workType'] ;
            $workName =     $_SESSION['workName'];
               $workDesc = $_SESSION['workDesc'];


$sql="INSERT INTO entrepreneur (59profileid,business_type,business_name,business_description)
VALUES ('$profileID','$workType','$workName','$workDesc')";



$dao->executeSQL($sql);
header("Location: Browse.php");


   









