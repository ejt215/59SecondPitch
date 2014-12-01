<!DOCTYPE html>
<?php
session_start();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>59SecondPitch Login</title>
        <link href="CSS/bootstrap.min.css" rel="stylesheet" media="screen">
        <link href="CSS/loginStyles.css" rel="stylesheet">
    </head>
    <body>
        <script src="http://code.jquery.com/jquery.js"></script>
        <script src="JS/bootstrap.min.js"></script>
        <script src="JS/login.js"></script>
        <link class="cssdeck" rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/2.3.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/2.3.1/css/bootstrap-responsive.min.css" class="cssdeck">



        <?php
        //
        // define variables and set to empty values
        $firstnameErr = $lastnameErr = $emailErr = $passwordErr = $repasswordErr = $typeErr = $uploadErr = "";
        $name = $email = $password = $lastname = $firstname = $repassword = $age = $almamater = $city = $type = "";
        $valid = true;
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            switch ($_POST['submit']) {
                case 'login':
                    break;
                case 'create':
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
                        if ($password != $repassword) {
                            $passwordErr = "Passwords do not match.";
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


                    //--------------Profile Picture Validation---------------------
                    $target_dir = "PROFILE_PICTURES/";
                    $target_file = $target_dir . basename($_FILES["profilePictureUpload"]["name"]);
                    $uploadOk = 1;
                    $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);

                    // Check if image file is a actual image or fake image
                    $check = getimagesize($_FILES["profilePictureUpload"]["tmp_name"]);
                    if ($check !== false) {
                        $uploadErr = "File is an image - " . $check["mime"] . ".";
                        $uploadOk = 1;
                    } else {
                        echo "File is not an image.";
                        $uploadOk = 0;
                    }


                    // Check if file already exists
                    if (file_exists($target_file)) {
                        $uploadErr = "Sorry, file already exists.";
                        $uploadOk = 0;
                    }

                    // Check file size
                    if ($_FILES["fileToUpload"]["size"] > 500000) {
                        $uploadErr = "Sorry, your file is too large.";
                        $uploadOk = 0;
                    }

                    // Allow certain file formats
                    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
                        $uploadErr = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                        $uploadOk = 0;
                    }

                    // Check if $uploadOk is set to 0 by an error
                    if ($uploadOk == 0) {
                        $uploadErr = "Sorry, your file was not uploaded.";

                        // if everything is ok, try to upload file
                    } else {
                        if (move_uploaded_file($_FILES["profilePictureUpload"]["tmp_name"], $target_file)) {
                            echo "The file " . basename($_FILES["profilePictureUpload"]["name"]) . " has been uploaded.";
                        } else {
                            echo "Sorry, there was an error uploading your file.";
                        }
                    }


                    if ($valid) {
                        $_SESSION['firstname'] = $firstname;
                        $_SESSION['lastname'] = $lastname;
                        $_SESSION['type'] = $type;
                        $_SESSION['email'] = $email;
                        $_SESSION['age'] = $age;
                        $_SESSION['password'] = $password;
                        $_SESSION['almamater'] = $almamater;
                        $_SESSION['city'] = $city;
                        header('Location: http://localhost/59SecondPitch/addUpdate59Profile.php');
                        exit();
                    }
                    break;
            }
        }
        ?>
        <div class="" id="loginModal">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 id="banner">Have an Account?</h3>
            </div>
            <div class="modal-body">
                <div class="well">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#login" data-toggle="tab">Login</a></li>
                        <li><a href="#create" data-toggle="tab">Create Account</a></li>
                    </ul>
                    <div id="myTabContent" class="tab-content">
                        <div class="tab-pane active in" id="login">
                            <form class="form-horizontal" action="loginVerify.php" method="POST">
                                <fieldset>
                                    <div id="legend">
                                        <legend class="">Login</legend>
                                    </div>    
                                    <div class="control-group">
                                        <!-- Email -->
                                        <label class="control-label"  for="email">Email</label>
                                        <div class="controls">
                                            <input type="text" id="email" name="email" placeholder="" class="input-xlarge">
                                        </div>
                                    </div>

                                    <div class="control-group">
                                        <!-- Password-->
                                        <label class="control-label" for="password">Password</label>
                                        <div class="controls">
                                            <input type="password" id="password" name="password" placeholder="" class="input-xlarge">
                                        </div>
                                    </div>


                                    <div class="control-group">
                                        <!-- Button -->
                                        <div class="controls">
                                            <button type="submit" class="btn btn-success" name="submit" value="login">Login</button>
                                        </div>
                                    </div>
                                </fieldset>
                            </form>  
                        </div>
                        <div class="tab-pane fade" id="create">
                            <form class="form-horizontal" id="newProfileForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" enctype="multipart/form-data">
                                <div class="control-group">
                                    <label class="control-label" for="email">Email:</label>
                                    <div class="controls"><input type="text" id="email" name="email" value = "<?php echo $email; ?>"> <span class="error">* <?php echo $emailErr; ?></span></div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="password">Password:</label>
                                    <div class="controls"><input type="password" id="password" name="password" value = "<?php echo $password; ?>"><span class="error">* <?php echo $passwordErr; ?></span><br></div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="repassword">Re-Enter Password:</label>
                                    <div class="controls"><input type="password" id="repassword" name="repassword" value = "<?php echo $repassword; ?>"></div>
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
                                    <div class="controls">
                                        <input type="text" id="city" name="city" value = "<?php echo $city; ?>">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <!--<div class="control-label">
                                        <span class="btn btn-default btn-file">
                                            Upload Profile Picture <input type="file">
                                        </span>
                                    </div>-->
                                    <div class="controls">
                                        <input type="file" name="profilePictureUpload" id="profilePictureUpload"><span class="error">* <?php echo $uploadErr; ?></span>
                                        <!--<input id="profilePictureURL" type="text" readonly>--> 
                                    </div>
                                </div>
                                <div class="control-group">
                                    <div class="controls">
                                        <input type="radio" name="type" <?php
                                        if (isset($type) && $type == "Entrepreneur") {
                                            echo "Entrepreneur";
                                        }
                                        ?>value="Entrepreneur">Entrepreneur<span class="error">* <?php echo $typeErr; ?><br>
                                            <input type="radio" name = "type" <?php
                                            if (isset($type) && $type == "Investor") {
                                                echo "Investor";
                                            }
                                            ?>value="Investor">Investor
                                            </div>
                                            </div>
                                            <div class="control-group">
                                                <div class="controls"><button type="submit" class="btn" name="submit" value="create">Submit</button></div>
                                            </div>
                                            </form>
                                    </div>   
                                </div>
                        </div>
                    </div>
                </div>



                <script class="cssdeck" src="//cdnjs.cloudflare.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
                <script class="cssdeck" src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/2.3.1/js/bootstrap.min.js"></script>