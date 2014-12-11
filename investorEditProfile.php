<!DOCTYPE html>
<?php
/* Name: investorEditProfile
 * Authors: Maxwell Smith & Eric Thornton
 * Description: Allows an investor to change his/her contact preferences
 */
session_start();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>59SecondPitch</title>
        <link href="CSS/bootstrap.min.css" rel="stylesheet" media="screen">
        <link class="cssdeck" rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/2.3.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/2.3.1/css/bootstrap-responsive.min.css" class="cssdeck">
        
        <!-- custom css -->
        <link href="CSS/newProfileStyles.css" rel="stylesheet">
        
    </head>
    <body>
        <script src="http://code.jquery.com/jquery.js"></script>
        <script src="JS/bootstrap.min.js"></script>
        
        <!-- custom js -->
        <script src="JS/investorEditProfile.js"></script>
        

        <?php
        //Validate fields
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
                if (empty($_POST["phoneNumber"])) {
                    $_SESSION['phoneNumber'] = null;
                } else {
                    $_SESSION['phoneNumber'] = $_POST['phoneNumber'];
                }
                $_SESSION['last_visited'] = "investorEditProfile";

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
                        <input id="investorRadio" type="radio" name="usertype" value="Investor" <?php
                        if (isset($_SESSION['class']) && $_SESSION['class'] == "Investor") {
                            echo "checked";
                        }
                        ?>>Investor<span class="error">* <?php echo $userTypeerr; ?></span><br>
                        <input id="advisorRadio" type="radio" name = "usertype" value="Advisor"<?php
                        if (isset($_SESSION['class']) && $_SESSION['class'] == "Advisor") {
                            echo "checked";
                        }
                        ?>>Advisor<br>
                        <input id="helpingHandRadio" type="radio" name="usertype" value="helpingHand"<?php
                        if (isset($_SESSION['class']) && $_SESSION['class'] == "helpingHand") {
                            echo "checked";
                        }
                        ?>>Helping Hand
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">How would you like to be contacted?</label>
                    <div class="controls">
                        <input id="phoneRadio" type="radio" name="contacttype" value="Phone"<?php
                        if (isset($_SESSION['contact_type']) && $_SESSION['contact_type'] == "Phone") {
                            echo "checked";
                        }
                        ?>>Phone<span class="error">* <?php echo $contactTypeerr; ?></span><br>
                        <input id="emailRadio" type="radio" name = "contacttype" value="Email"<?php
                        if (isset($_SESSION['contact_type']) && $_SESSION['contact_type'] == "Email") {
                            echo "checked";
                        }
                        ?>>Email<br>
                        <input id="eitherRadio" type="radio" name="contacttype" value="Either"<?php
                        if (isset($_SESSION['contact_type']) && $_SESSION['contact_type'] == "either") {
                            echo "checked";
                        }
                        ?>>Either
                    </div>
                </div>
                <div class="control-group" <?php if (isset($_SESSION['contact_type']) && $_SESSION['contact_type'] == "Email"){ echo "style='visibility:hidden'";}?> id="phoneNumber">
                    <label class="control-label">Phone Number: </label>
                    <div class="controls">
                        <input type="text" name="phoneNumber" <?php if (isset($_SESSION['phone']) && ($_SESSION['contact_type'] == "Phone" || $_SESSION['contact_type'] == "either")){ echo "value='" . $_SESSION['phone'] . "' ";}else{echo "value='No Phone'";}?>>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">What are your contact preferences?(days,times,etc.)</label>
                    <div class="controls"><textarea name ="contactpref" value =""rows="4" cols="50"><?php echo $_SESSION['contact_preferences']; ?></textarea><span class="error">* <?php echo $contactPreferr; ?></span><br></div>
                </div>
                <div class="control-group">
                    <div class="controls"><button type="submit" class="btn">Submit</button></div>
                </div>
            </form>
        </div>
    </body>