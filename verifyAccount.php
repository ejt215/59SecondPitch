<?php
require_once 'fiftynineDAO.php';

$dao = new fiftynineDAO();
$email = $_POST['email'];
$pass = $_POST['password'];


if ($dao->verify($email, $pass)){
    //die($email . "        " . $pass . "               " . $dao->verify($email, $pass));
    session_start();
    $_SESSION['email'] = $_POST['email'];
    $_SESSION['profileid'] = $dao->get59ProfileIDFromEmail($email);
    header("Location:  Browse.php");
}
else{
    header("Location: login.php");
}
?>

