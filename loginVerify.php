<?php

require_once 'FiftyNineDAO.php';

$dao = new FiftyNineDAO();
$email = $_POST['email'];
$pass = $_POST['password'];


if ($dao->verify($email, $pass)) {
    session_start();
    $_SESSION['email'] = $_POST['email'];
    $_SESSION['profileid'] = $dao->get59ProfileIDFromEmail($email);

    $dao->get59Profile($email);
    $entrepreneurSQL = "SELECT * FROM entrepreneur WHERE 59profileid = " . $dao->get59ProfileIDFromEmail($email);
    $entrepreneurResult = $dao->executeSQL($entrepreneurSQL);
    $isEntrepreneur = $entrepreneurResult->num_rows;

    $investorSQL = "SELECT * FROM investor WHERE 59profileid = " . $dao->get59ProfileIDFromEmail($email);
    $investorResult = $dao->executeSQL($investorSQL);
    $isInvestor = $investorResult->num_rows;

    $_SESSION['firstname'] = $firstname;
    $_SESSION['lastname'] = $lastname;
    $_SESSION['type'] = $type;
    $_SESSION['email'] = $email;
    $_SESSION['age'] = $age;
    $_SESSION['password'] = $password;
    $_SESSION['almamater'] = $almamater;
    $_SESSION['city'] = $city;
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
    header("Location: login.php");
}
?>

