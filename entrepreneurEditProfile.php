<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
session_start();
if (isset($_POST['business_id'])) {
    $_SESSION['business_id'] = $_POST['business_id'];
}
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
        <link class="cssdeck" rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/2.3.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/2.3.1/css/bootstrap-responsive.min.css" class="cssdeck">

        <?php
        $workType = $workName = $business_video = "";
        $workTypeerr = $workNameerr = $businessVideoerr = "";
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
            /* if (!isset($_FILES['userfile']) || !($_FILES['userfile']['error'] == 0)) {
              echo "Please upload a file";
              $valid = false;
              } */
            if ($valid) {
                $_SESSION['workType'] = $workType;
                $_SESSION['workName'] = $workName;
                $_SESSION['business_video'] = $business_video;
                $_SESSION['editEntrepreneurProfile'] = true;
                header('Location: http://localhost/59SecondPitch/addUpdateDeleteEntrepreneurProfile.php');
                exit();
            }
        }
        ?>

        <div class="container">
            <!--form setup taken from tutorial for twitter bootstrap-->
            <form id="entrepreneurForm" class="form-horizontal" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
                <label>How would you classify your work?</label>
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
                <input type="text" id="business_video" name="business_video" value ="<?php echo $_POST['business_video']; ?>"> <span class="error">* <?php echo $businessVideoerr; ?></span><br>
                <br><button type="submit" class="btn">Submit</button>
            </form>
        </div>
    </body>
