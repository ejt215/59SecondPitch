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
                    <label class="control-label">How would you classify yourself?</label>
                    <div class="controls">
                        <input id="investorRadio" type="radio" name="userType" value="Investor">Investor<br>
                        <input id="advisorRadio" type="radio" name = "userType" value="Advisor">Advisor<br>
                        <input id="helpingHandRadio" type="radio" name="userType" value="helpingHand">Helping Hand
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">How would you like to be contacted?</label>
                    <div class="controls">
                        <input id="phoneRadio" type="radio" name="contactType" value="Phone">Phone<br>
                        <input id="emailRadio" type="radio" name = "contactType" value="Email">Email<br>
                        <input id="eitherRadio" type="radio" name="contactType" value="Either">Either
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">What are your contact preferences?(days,times,etc.)</label>
                    <div class="controls"><textarea rows="4" cols="50"></textarea></div>
                </div>
                <div class="control-group">
                    <div class="controls"><button type="submit" class="btn">Submit</button></div>
                </div>
            </form>
        </div>
    </body>