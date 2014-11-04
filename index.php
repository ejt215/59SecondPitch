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

        <?php
        // define variables and set to empty values
        $firstnameErr = $lastnameErr = $emailErr = $passwordErr = $repasswordErr =$typeErr =  "";
        $name = $email = $password = $lastname = $firstname = $repassword = $age = $almamater = $city = $type= "";
        $valid = true;
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (empty($_POST["firstname"])) {
                $firstnameErr = "First name is required";
                $valid = false;
            } else {
                $firstname = $_POST["firstname"];
                if (!preg_match("/^[a-zA-Z ]*$/", $firstname)) {
                    $firstnameErr = "Only letters and white space allowed";
                    $valid = false;
                }
            }

            if (empty($_POST["email"])) {
                $emailErr = "Email is required";
                $valid = false;
            } else {
                $email = $_POST["email"];
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $emailErr = "Invalid email format";
                    $valid = false;
                }
            }

            if (empty($_POST["password"])) {
                $passwordErr = "Password is required";
                $valid = false;
            } else {
                $password = $_POST["password"];
                $repassword = $_POST["repassword"];
                if($password !=$repassword){
                    $passwordErr ="Passwords do not match.";
                    $valid = false;
                }
            }

            if (empty($_POST["lastname"])) {
                $lastnameErr = "Last name is required";
                $valid = false;
            } else {
                $lastname = $_POST["lastname"];
                if (!preg_match("/^[a-zA-Z ]*$/", $lastname)) {
                    $lastnameErr = "Only letters and white space allowed";
                    $valid = false;
                }
            }
             if (empty($_POST["type"])) {
                $typeErr = "Profile type is required.";
                $valid = false;
            } else {
                $type = $_POST["type"];
                
            }
            $age = $_POST["age"];
            $almamater = $_POST["almamater"];
            $city = $_POST["city"];
            
            if($valid){
                $_SESSION['firstname'] =$firstname; 
                $_SESSION['lastname'] =$lastname;
                $_SESSION['type'] =$type;
                $_SESSION['email'] =$email;
                $_SESSION['age'] =$age;
                $_SESSION['password'] =$password;
                $_SESSION['almamater'] =$almamater;
                $_SESSION['city'] =$city;
                header('Location: http://localhost/59SecondPitch/update.php');
            exit();
            }
        }
        ?>
        <!--<?php //echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>-->
        <div class="container">
            <!--form setup taken from tutorial for twitter bootstrap-->
            <form id="newProfileForm" class="form-horizontal" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                <div class="control-group">
                    <label class="control-label" for="password">Password:</label>
                    <div class="controls"><input type="password" id="password" name="password" value = "<?php echo $password; ?>"><span class="error">* <?php echo $passwordErr; ?></span><br></div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="repassword">Re-Enter Password:</label>
                    <div class="controls"><input type="password" id="repassword" name="repassword" value = "<?php echo $repassword; ?>"></div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="email">Email:</label>
                    <div class="controls"><input type="text" id="email" name="email" value = "<?php echo $email; ?>"> <span class="error">* <?php echo $emailErr; ?></span></div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="firstname">First Name:</label>
                    <div class="controls"><input type="text" id="firstname" name="firstname" method ="post" value = "<?php echo $firstname; ?>"><span class="error">* <?php echo $firstnameErr; ?></span></div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="lastname">Last Name:</label>
                    <div class="controls"><input type="text" id="lastname" name="lastname" value = "<?php echo $lastname; ?>"><span class="error">* <?php echo $lastnameErr; ?></span></div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="age">Age:</label>
                    <div class="controls"><input type="text" id="age" name="age" value = "<?php echo $age; ?>"></div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="almamater">University/Alma Mater:</label>
                    <div class="controls"><input type="text" id="almamater" name="almamater" value = "<?php echo $almamater; ?>"></div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="city">City/Metro Area:</label>
                    <div class="controls"><input type="text" id="city" name="city" value = "<?php echo $city; ?>"></div>
                </div>
                <div class="control-group">
                    <div class="controls">
                        <input type="radio" name="type" <?php if (isset($type) && $type=="Entrepreneur"){ echo "Entrepreneur";}?>value="Entrepreneur">Entrepreneur<span class="error">* <?php echo $typeErr; ?><br>
                        <input type="radio" name = "type" <?php if (isset($type) && $type=="Investor"){ echo "Investor";}?>value="Investor">Investor
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls"><button type="submit" class="btn">Submit</button></div>
                </div>
                
            </form>
        </div>
    </body>
</html>
