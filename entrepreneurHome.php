
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
session_start();
include_once 'fiftynineDAO.php';
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" type="text/css" href="CSS/dark-glass/sidebar.css" />
        <link rel="stylesheet" type="text/css" href="CSS/browseStyles.css" />
        <link href="CSS/bootstrap.min.css" rel="stylesheet" media="screen">
        <link href="CSS/jquery-ui.min.css" rel="stylesheet" type="text/css"/>


        <script src="http://code.jquery.com/jquery.js"></script>
        <script src="JS/bootstrap.min.js"></script>
        <script src="JS/jquery-ui.min.js" type="text/javascript"></script>
        <script type="text/javascript" src="JS/jquery.sidebar.js"></script>
        <script src="JS/jquery.coverflow.js"></script>

        <script src="JS/jquery.interpolate.js"></script>
        <script src="JS/jquery.mousewheel.js"></script>
        <script src="JS/jquery.touchSwipe.min.js"></script>
        <script src="JS/reflection.js"></script>
        <script src="JS/entrepreneurHome.js.js"></script>
    </head>
    <body>
        <div class="container">
            <form class="form-horizontal" action='entrepreneurMatches.php' method="POST">
                <div id="legend">
                    <legend class="">Entrepreneur Options</legend>
                </div> 
                <div class="controls">
                    <button id="matchesBtn" type="submit" class="btn btn-success">Matches</button>
                </div>
                <div class="controls">
                    <button id="ideasBtn" type="submit" class="btn btn-success">My Ideas</button>
                </div>
                <div class="controls">
                    <button id="statisticsBtn" type="submit" class="btn btn-success">Statistics</button>
                </div>
                <div class="controls">
                    <button id="manageBtn" type="submit" class="btn btn-success">Manage Profile</button>
                </div>
            </form>
        </div>
    </body>
</html>
