
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
session_start();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>59SecondPitch</title>
        <link href="CSS/bootstrap.min.css" rel="stylesheet" media="screen">
        <link href="CSS/newProfileStyles.css" rel="stylesheet">

    </head>
    <body>
        <script src="http://code.jquery.com/jquery.js"></script>
        <script src="JS/bootstrap.min.js"></script>
        <script src="JS/myScript.js"></script>

        <?php
        $userTypeerr = $contactTypeerr = $contactPreferr = "";
        $userType = $contactType = $contactPref = "";
        $valid = true;
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (empty($_POST["usertype"])) {
                $userTypeerr = "User Type is required.";
                $valid = false;
            } else {
                $userType = $_POST["usertype"];
            }



            if (empty($_POST["contacttype"])) {
                $contactTypeerr = "Contact type is required.";
                $valid = false;
            } else {
                $contactType = $_POST["contacttype"];
            }


            if (empty($_POST["contactpref"])) {
                $contactPreferr = "Please provide contact preferences.";
                $valid = false;
            } else {
                $contactPref = $_POST["contactpref"];
            }

            if ($valid) {
                $_SESSION['contactType'] = $contactType;
                $_SESSION['userType'] = $userType;
                $_SESSION['contactPref'] = $contactPref;

                header('Location: http://localhost/59SecondPitch/addUpdateInvestorProfile.php');
                exit();
            }
        }
        ?>


        <div class="container">
            <!--form setup taken from tutorial for twitter bootstrap-->
            <form id="investorForm" class="form-horizontal" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                <div class="control-group">
                    <label class="control-label">How would you classify yourself?</label>
                    <div class="controls">
                        <input id="investorRadio" type="radio" name="usertype" <?php if (isset($userType) && $userType == "Investor") {
            echo "Investor";
        } ?>value="Investor">Investor<span class="error">* <?php echo $userTypeerr; ?></span><br>
                        <input id="advisorRadio" type="radio" name = "usertype" <?php if (isset($userType) && $userType == "Advisor") {
            echo "Advisor";
        } ?>value="Advisor">Advisor<br>
                        <input id="helpingHandRadio" type="radio" name="usertype" <?php if (isset($userType) && $userType == "helpingHand") {
            echo "helpingHand";
        } ?>value="helpingHand">Helping Hand
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">How would you like to be contacted?</label>
                    <div class="controls">
                        <input id="phoneRadio" type="radio" name="contacttype" <?php if (isset($contactType) && $contactType == "Phone") {
            echo "Phone";
        } ?>value="Phone">Phone<span class="error">* <?php echo $contactTypeerr; ?></span><br>
                        <input id="emailRadio" type="radio" name = "contacttype" <?php if (isset($contactType) && $contactType == "Email") {
            echo "Email";
        } ?>value="Email">Email<br>
                        <input id="eitherRadio" type="radio" name="contacttype" <?php if (isset($contactType) && $contactType == "either") {
            echo "Either";
        } ?>value="Either">Either
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">What are your contact preferences?(days,times,etc.)</label>
                    <div class="controls"><textarea name ="contactpref" value =""rows="4" cols="50"><?php echo $contactPref; ?></textarea><span class="error">* <?php echo $contactPreferr; ?></span><br></div>
                </div>
                <div class="control-group">
                    <div class="controls"><button type="submit" class="btn">Submit</button></div>
                </div>
            </form>
        </div>
    </body>
