<?php
require_once 'FiftyNineDAO.php';

$dao = new FiftyNineDAO();
$email = $_POST['email'];
$pass = $_POST['password'];


if ($dao->verify($email, $pass)){
    session_start();
    $_SESSION['email'] = $_POST['email'];
    $_SESSION['profileid'] = $dao->get59ProfileIDFromEmail($email);
    
    $entrepreneurSQL = "SELECT * FROM entrepreneur WHERE 59profileid = " . $dao->get59ProfileIDFromEmail($email);
    $entrepreneurResult = $dao->executeSQL($entrepreneurSQL);
    $isEntrepreneur = $entrepreneurResult->num_rows;
    
    $investorSQL = "SELECT * FROM investor WHERE 59profileid = " . $dao->get59ProfileIDFromEmail($email);
    $investorResult = $dao->executeSQL($investorSQL);
    $isInvestor = $investorResult->num_rows;
   
    if ($isEntrepreneur && $isInvestor){
        die("This should gracefully let them choose to access their investor or entrepreneur profile");
    }
    elseif ($isEntrepreneur) {
        header("Location:  entrepreneurHome.php");
    }
    elseif ($isInvestor){
        header("Location:  investorHome.php");
    }
    else {
        die("You shouldn't be able to reach this      " .  $isEntrepreneur . "        " . $isInvestor);
    }
    
}
else{
    header("Location: login.php");
}
?>

