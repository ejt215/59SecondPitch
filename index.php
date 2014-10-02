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
    </head>
    <body>
        <script src="http://code.jquery.com/jquery.js"></script>
        <script src="JS/bootstrap.min.js"></script>

        <!--form setup taken from tutorial for twitter bootstrap-->
        <form class="form-horizontal">
            <div class="control-group">
                <label class="control-label" for="username">Username:</label>
                <div class="controls"><input type="text" id="username" placeholder="Username"></div>
            </div>
            <div class="control-group">
                <label class="control-label" for="password">Password:</label>
                <div class="controls"><input type="password" id="inputPassword" placeholder="Password"></div>
            </div>
            <div class="control-group">
                <label class="control-label" for="rePassword">Re-Enter Password:</label>
                <div class="controls"><input type="password" id="rePassword" placeholder="Re-Enter Password"></div>
            </div>
            <div class="control-group">
                <label class="control-label" for="email">Email:</label>
                <div class="controls"><input type="text" id="email" placeholder="Email"></div>
            </div>
            <div class="control-group">
                <label class="control-label" for="firstname">First Name:</label>
                <div class="controls"><input type="text" id="firstname" placeholder="First Name"></div>
            </div>
            <div class="control-group">
                <label class="control-label" for="lastname">Last Name:</label>
                <div class="controls"><input type="text" id="lastname" placeholder="Last Name"></div>
            </div>
            <div class="control-group">
                <label class="control-label" for="age">Age:</label>
                <div class="controls"><input type="text" id="age" placeholder="Age"></div>
            </div>
            <div class="control-group">
                <label class="control-label" for="almamater">University/Alma Mater:</label>
                <div class="controls"><input type="text" id="almamater" placeholder="University/Alma Mater"></div>
            </div>
            <div class="control-group">
                <label class="control-label" for="city">City/Metro Area:</label>
                <div class="controls"><input type="text" id="city" placeholder="City/Metro Area"></div>
            </div>
            <div class="control-group">
                <div class="controls"><button type="submit" class="btn">Submit</button></div>
            </div>
        </form>

    </body>
</html>
