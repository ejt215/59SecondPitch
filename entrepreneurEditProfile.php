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
        $workType = $workName = $workDesc = "";
        $workTypeerr = $workNameerr = $workDescerr = "";
        $valid = true;
        
        //Make sure to only do the validation if the page is coming from itself
        if ($_SERVER["REQUEST_METHOD"] == "POST" && $_SERVER["HTTP_REFERER"] == "http://" . $_SERVER["HTTP_HOST"] . $_SERVER["PHP_SELF"]) {
            if (empty($_POST["workType"])) {
                $workTypeerr = "Work Type is required.";
                $valid = false;
            } else {
                $workType = $_POST["workType"];
            }

            if (empty($_POST["workName"])) {
                $workNameerr = "Work Name is required.";
                $valid = false;
            } else {
                $workName = $_POST["workName"];
            }

            if (empty($_POST["workDesc"])) {
                $workDescerr = "Please provide a description.";
                $valid = false;
            } else {
                $workDesc = $_POST["workDesc"];
            }

            if ($valid) {
                $_SESSION['workType'] = $workType;
                $_SESSION['workName'] = $workName;
                $_SESSION['workDesc'] = $workDesc;
                $_SESSION['editEntrepreneurProfile'];
                header('Location: http://localhost/59SecondPitch/addUpdateEntrepreneurProfile.php');
                exit();
            }
        }
        ?>

        <div class="container">
            <!--form setup taken from tutorial for twitter bootstrap-->
            <form id="entrepreneurForm" class="form-horizontal" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <div class="control-group">
                    <label class="control-label">How would you classify your work?</label>
                    <div class="controls">
                        
                        <input id="ideaRadio" type="radio" name="workType" value="idea">Idea<span class="error">* <?php echo $workTypeerr; ?></span><br>
                        <input id="projectRadio" type="radio" name = "workType" value="project">Project<br>
                        <input id="startupRadio" type="radio" name="workType" value="startup">Startup<br>
                        <input id="companyRadio" type="radio" name="workType" value="company">Company
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">What is the name of your work?</label>
                    <div class="controls">
                        <input type="text" id="workName" name="workName" value = "<?php if (isset($_POST['business_name'])){echo $_POST['business_name'];} else if (isset($_POST['workName'])){echo $_POST['workName'];}  ?>"> <span class="error">* <?php echo $workNameerr; ?></span>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Description of your work:</label>
                    <div class="controls"><textarea rows="4" cols="50" name ="workDesc"><?php if (isset($_POST['business_description'])){echo $_POST['business_description'];} else if (isset($_POST['workDesc'])){echo $_POST['workDesc'];}  ?></textarea><span class="error">* <?php echo $workDescerr; ?></span></div>
                </div>
                <!--<div class="control-group">
                   <div class="controls">
                       <label class="control-label">Upload an image.</label>
                       <input type="hidden" name="MAX_FILE_SIZE" value="99999999" />
                       <input name="userfile" type="file" accept="image/jpeg,image/gif,image/png,image/jpg"  />
                   </div>

               </div>-->
                <div class="control-group">
                    <div class="controls"><button type="submit" class="btn">Submit</button></div>
                </div>
            </form>
        </div>
    </body>