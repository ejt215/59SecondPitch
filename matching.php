<?php
require_once 'fiftynineDAO.php';

$dao = new fiftynineDAO();
$dao->
//small change
if ($dao->verify($email, $pass)){
    //die($email . "        " . $pass . "               " . $dao->verify($email, $pass));
    
    header("Location:  Browse.php");
}
else{
    header("Location: login.php");
}
?>

