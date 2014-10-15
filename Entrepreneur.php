<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
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

        <div class="container">
            <!--form setup taken from tutorial for twitter bootstrap-->
            <form id="investorForm" class="form-horizontal" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <div class="control-group">
                    <label class="control-label">How would you classify your work?</label>
                    <div class="controls">
                        <input id="ideaRadio" type="radio" name="workType" value="idea">Idea<br>
                        <input id="projectRadio" type="radio" name = "workType" value="project">Project<br>
                        <input id="startupRadio" type="radio" name="workType" value="startup">Startup<br>
                        <input id="companyRadio" type="radio" name="workType" value="company">Company
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">What is the name of your work?</label>
                    <div class="controls">
                        <input type="text" id="workName" name="workName">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Description of your work:</label>
                    <div class="controls"><textarea rows="4" cols="50"></textarea></div>
                </div>
                <div class="control-group">
                    <div class="controls"><button type="submit" class="btn">Submit</button></div>
                </div>
            </form>
        </div>
    </body>