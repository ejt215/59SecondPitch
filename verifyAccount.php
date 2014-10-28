<?php
require_once 'fiftynineDAO.php';

$dao = new fiftynineDAO();
$email = $_POST['email'];
$pass = $_POST['password'];

if ($dao.verify($email,$pass))
        header("Location:  )
?>

