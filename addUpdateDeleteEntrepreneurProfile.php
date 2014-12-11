<?php
/* Name: addUpdateDeleteEntrepreneurProfile
 * Authors: Maxwell Smith & Eric Thornton
 * Description: Adds, updates, or deletes an entrepreneur profile depending on which page redirected to this one
 */
session_start();

require_once 'FiftyNineDAO.php';

$dao = new FiftyNineDAO();
$email = $_SESSION['email'];
$profileID = $dao->get59ProfileIDFromEmail($email);

//If coming from entrepreneurIdeas.php
if (isset($_POST['delete']) && $_POST['delete'] == "delete") {
    $dao->deleteEntrepreneurIdea(substr($_POST['business_id'], 2));
    header("Location: entrepreneurHome.php");
} 
//If coming from entrepreneurEditProfile.php
elseif (isset($_SESSION['last_visited']) && $_SESSION['last_visited'] == "entrepreneurEditProfile") {
    $dao->updateEntrepreneurIdea($profileID,$_SESSION['business_id'],$_SESSION['workType'],$_SESSION['workName'], $_SESSION['business_video']);
    header("Location: entrepreneurIdeas.php"); 
} 
//If coming from entrepreneurSignup.php
elseif (isset($_SESSION['last_visited']) && $_SESSION['last_visited'] == "entrepreneurSignup") { 
    $dao->insertEntrepreneurIdea($profileID,$_SESSION['workType'],$_SESSION['workName'], $_SESSION['business_video']);
    header("Location: entrepreneurHome.php");
}
//You shouldn't be able to access this page through a way other than the 3 above options
else {
    die("addUpdateDeleteEntrepreneurProfile");
}
?>