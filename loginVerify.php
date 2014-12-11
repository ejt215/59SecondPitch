<?php
/* Name: loginVerify
 * Authors: Maxwell Smith & Eric Thornton
 * Description: Verifies login credentials and redirects client to the appropriate page
 */
require_once 'FiftyNineDAO.php';
//session_start();
$dao = new FiftyNineDAO();
$email = $_POST['email'];
$pass = $_POST['password'];
$_SESSION['loginError'] ="";

if ($dao->verify($email, $pass)) {
    session_start();
    $_SESSION['email'] = $_POST['email'];
    $_SESSION['profileid'] = $dao->get59ProfileIDFromEmail($email);

    
    $entrepreneurSQL = "SELECT * FROM entrepreneur WHERE 59profileid = " . $_SESSION['profileid'];
    $entrepreneurResult = $dao->executeSQL($entrepreneurSQL);
    $isEntrepreneur = $entrepreneurResult->num_rows;

    $investorSQL = "SELECT * FROM investor WHERE 59profileid = " . $_SESSION['profileid'];
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
        $investorProf = $dao->getInvestorProfile($_SESSION['profileid']);
        $_SESSION['class'] = $investorProf->class;
        $_SESSION['contact_type'] = $investorProf->contact_type;
        $_SESSION['contact_preferences'] = $investorProf->contact_preferences;
        $_SESSION['phone'] = $investorProf->phone;
        header("Location:  investorHome.php");
    } else {
        die("You shouldn't be able to reach this      " . $isEntrepreneur . "        " . $isInvestor);
    }
} else {
    $_SESSION['loginError'] = "Invalid username or password.";
    header("Location: login.php");
}
?>

