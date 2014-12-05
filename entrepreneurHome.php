
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
        <link href="CSS/carousel.css" rel="stylesheet">

        <script src="http://code.jquery.com/jquery.js"></script>
        <script src="JS/bootstrap.min.js"></script>
        <script src="JS/jquery-ui.min.js" type="text/javascript"></script>
        <script type="text/javascript" src="JS/jquery.sidebar.js"></script>
        <script src="JS/jquery.coverflow.js"></script>

        <script src="JS/jquery.interpolate.js"></script>
        <script src="JS/jquery.mousewheel.js"></script>
        <script src="JS/jquery.touchSwipe.min.js"></script>
        <script src="JS/reflection.js"></script>
        <script src="JS/entrepreneurHome.js"></script>

    </head>
    <body>
        <?php $_SESSION['type'] = "Entrepreneur"; 
              $_SESSION['last_visited'] = "entrepreneurHome";?>
        <div class="container">
            <div id="legendDiv" class="row">
                <legend id="legend">Entrepreneur Home</legend>
            </div> 

            <div id="sidebarDiv">
                <ul id="sidebar" >
                    <li><a style='color:#FFFFFF'href="/59SecondPitch/entrepreneurHome.php">Home</a></li>
                    <li><a style='color:#FFFFFF'href="/59SecondPitch/manageProfile.php">Manage Profile</a></li>
                    <li><a style='color:#FFFFFF'href="/59SecondPitch/login.php">Logout</a></li>
                </ul>
            </div>

            <div id="optionsDiv" class="container marketing">

                <!-- Three columns of text below the carousel -->
                <div class="row">
                    <div class="span4 col-lg-4">
                        <img class="img-circle" src="IMG/Matches.GIF" alt="Generic placeholder image" style="width: 140px; height: 140px;">
                        <h2>Matches</h2>
                        <p>Find out who wants to start a conversation.</p>
                        <p><a class="btn btn-default" href="/59SecondPitch/entrepreneurMatches.php" role="button">View Matches »</a></p>
                    </div><!-- /.col-lg-4 -->
                    <div class="span4 col-lg-4">
                        <img class="img-circle" src="IMG/Brain.gif" alt="Generic placeholder image" style="width: 140px; height: 140px;">
                        <h2>Ventures</h2>
                        <p>You're a genius and we both know it.  Let's show the world what you're made of.</p>
                        <p><a class="btn btn-default" href="/59SecondPitch/entrepreneurIdeas.php" role="button">View Ideas »</a></p>
                    </div><!-- /.col-lg-4 -->
                    <div class="span4 col-lg-4">
                        <img class="img-circle" src="IMG/Statistics.jpg" alt="Generic placeholder image" style="width: 140px; height: 140px;">
                        <h2>Statistics</h2>
                        <p>Numbers speak louder than words.</p>
                        <p><a class="btn btn-default" href="/59SecondPitch/entrepreneurStatistics.php" role="button">View Statistics »</a></p>
                    </div><!-- /.col-lg-4 -->
                </div><!-- /.row -->
            </div>
            <div>
                <p id="quote">"A man may die, nations may rise and fall, but an idea lives on." -JFK</p>
            </div>
        </div>
    </body>
</html>
