<?php

require_once 'FiftyNineDAO.php';
session_start();
$dao = new FiftyNineDAO();
$email = $_POST['email'];
$pass = $_POST['password'];
$_SESSION['loginError'] ="";

if ($dao->verify($email, $pass)) {
    session_start();
    $_SESSION['email'] = $_POST['email'];
    $_SESSION['profileid'] = $dao->get59ProfileIDFromEmail($email);

    
    $entrepreneurSQL = "SELECT * FROM entrepreneur WHERE 59profileid = " . $dao->get59ProfileIDFromEmail($email);
    $entrepreneurResult = $dao->executeSQL($entrepreneurSQL);
    $isEntrepreneur = $entrepreneurResult->num_rows;

    $investorSQL = "SELECT * FROM investor WHERE 59profileid = " . $dao->get59ProfileIDFromEmail($email);
    $investorResult = $dao->executeSQL($investorSQL);
    $isInvestor = $investorResult->num_rows;

    $fiftyNineProfile = $dao->get59Profile($email);
    //die($fiftyNineProfile->firstname . $fiftyNineProfile->lastname . $fiftyNineProfile->email . $fiftyNineProfile->age . $fiftyNineProfile->password . $fiftyNineProfile->almamater . $fiftyNineProfile->city);
    $_SESSION['firstname'] = $fiftyNineProfile->firstname; 
    $_SESSION['lastname'] = $fiftyNineProfile->lastname;
    $_SESSION['email'] = $fiftyNineProfile->email;
    $_SESSION['age'] = $fiftyNineProfile->age;
    $_SESSION['password'] = $fiftyNineProfile->password;
    $_SESSION['almamater'] = $fiftyNineProfile->almamater;
    $_SESSION['city'] = $fiftyNineProfile->city;
    
    if ($isEntrepreneur && $isInvestor) {
        die("This should gracefully let them choose to access their investor or entrepreneur profile");
    } elseif ($isEntrepreneur) {
        header("Location:  entrepreneurHome.php");
    } elseif ($isInvestor) {
        header("Location:  investorHome.php");
    } else {
        die("You shouldn't be able to reach this      " . $isEntrepreneur . "        " . $isInvestor);
    }
} else {
    $_SESSION['loginError'] = "Invalid username or password.";
    header("Location: login.php");
}
?>

