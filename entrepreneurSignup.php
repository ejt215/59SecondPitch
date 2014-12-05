
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
        $workType = $workName = $workDesc = $business_video = "";
        $workTypeerr = $workNameerr = $workDescerr = $businessVideoerr = "";
        $valid = true;
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
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

            if (empty($_POST["business_video"])) {
                $workDescerr = "Please provide a video URL";
                $valid = false;
            } else {
                $business_video = $_POST["business_video"];
            }

            if ($valid) {
                $_SESSION['workType'] = $workType;
                $_SESSION['workName'] = $workName;
                $_SESSION['business_video'] = $business_video;
                $_SESSION['last_visited'] = "entrepreneurSignup";
                header('Location: http://localhost/59SecondPitch/addUpdateDeleteEntrepreneurProfile.php');
                exit();
            }
        }
        ?>

        <div class="container">
            <!--form setup taken from tutorial for twitter bootstrap-->
            <form id="entrepreneurForm" class="form-horizontal" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
                <label>How would you classify your work?</label><br>
                <input id="ideaRadio" type="radio" name="workType" value="idea" checked="<?php if ($_POST['business_type'] == "idea"){echo "true";}  ?>">Idea<span class="error">* <?php echo $workTypeerr; ?></span><br>
                <input id="projectRadio" type="radio" name = "workType" value="project" checked="<?php if ($_POST['business_type'] == "project"){echo "true";}  ?>">Project<br>
                <input id="startupRadio" type="radio" name="workType" value="startup" checked="<?php if ($_POST['business_type'] == "startup"){echo "true";}  ?>">Startup<br>
                <input id="companyRadio" type="radio" name="workType" value="company" checked="<?php if ($_POST['business_type'] == "company"){echo "true";}  ?>">Company<br>
                
                <br><label>What is the name of your work?</label>
                <input type="text" id="workName" name="workName" value = "<?php
                if (isset($_POST['business_name'])) {
                    echo $_POST['business_name'];
                } else if (isset($_POST['workName'])) {
                    echo $_POST['workName'];
                }
                ?>"> <span class="error">* <?php echo $workNameerr; ?></span><br>
                <br><label>Pitch Video Vimeo ID:</label>
                <input type="text" id="business_video" name="business_video" value ="<?php  if (isset($_POST['business_video'])){echo $_POST['business_video'];}; ?>"> <span class="error">* <?php echo $businessVideoerr; ?></span><br>
                <br><button type="submit" class="btn">Submit</button>
            </form>
        </div>
    </body>
