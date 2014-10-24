<?php
session_start();

require_once 'fiftynineDAO.php';
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$con=mysqli_connect("128.180.177.4:3307","guest","pitch","59secondpitch");
//$con=mysqli_connect("162.242.219.56","59App","AppAppDevDev?","59App");

if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}



$workType = $_SESSION['workType'] ;
            $workName =     $_SESSION['workName'];
               $workDesc = $_SESSION['workDesc'];
$id = (int)$_SESSION['59profileid'];

$sql="INSERT INTO entrepreneur (59profileid,business_type,business_name,business_description)
VALUES ('$id','$workType','$workName','$workDesc')";



if (!mysqli_query($con,$sql)) {
  die('Error: ' . mysqli_error($con));
}

mysqli_close($con);


    //header("Location: http://localhost/59SecondPitch/Investor.php"); 
    //exit();










/*$dao = new fiftynineDAO();
$email = $_SESSION['email'];
$profileID = $dao->get59ProfileIDFromEmail($email);

$workType = $_SESSION['workType']; 
$workName = $_SESSION['workName'];
$workDesc = $_SESSION['workDesc'];

$sql="INSERT INTO entrepreneur (59profileid,business_type,business_name,business_description)" .
"VALUES ('$profileID','$workType','$workName','$workType')";

$dao->executeSQL($sql);
?>*/
