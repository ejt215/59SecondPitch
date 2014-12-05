
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
        <script src="JS/investorHome.js"></script>

    </head>
    <body>
        <?php $_SESSION['type'] = "Investor"; ?>
        <div class="container">
            <div id="legendDiv" class="row">
                <legend id="legend">Investor Home</legend>
            </div> 

            <div id="sidebarDiv">
                <ul id="sidebar" >

                    <li><a style='color:#FFFFFF' href="/59SecondPitch/investorHome.php">Home</a></li>
                    <li><a style='color:#FFFFFF' href="/59SecondPitch/manageProfile.php">Manage Profile</a></li>
                    <li><a style='color:#FFFFFF' href="/59SecondPitch/login.php">Logout</a></li>

                </ul>
            </div>

            <div id="optionsDiv" class="container marketing">

                <!-- Three columns of text below the carousel -->
                <div class="row">
                    <div class="span4 col-lg-4">
                        <img class="img-circle" src="IMG/magnifyingGlass.jpeg" alt="Generic placeholder image" style="width: 140px; height: 140px;">
                        <h2>Browse</h2>
                        <p>Find out who wants to start a conversation.</p>
                        <p><a id="browseBtn" class="btn btn-default" href="/59SecondPitch/browse.php" role="button">Go Browsing »</a></p>
                    </div><!-- /.col-lg-4 -->
                    <div class="span4 col-lg-4">
                        <img class="img-circle" src="IMG/questionmark.jpg" alt="Generic placeholder image" style="width: 140px; height: 140px;">
                        <h2>Maybe</h2>
                        <p>Review profiles that you didn't want to commit to but found worth saving.</p>
                        <p><a id="trackingBtn" class="btn btn-default" href="/59SecondPitch/investorTracking.php" role="button">View Tracked Profiles »</a></p>
                    </div><!-- /.col-lg-4 -->
                    <div class="span4 col-lg-4">
                        <img class="img-circle" src="IMG/check.jpeg" alt="Generic placeholder image" style="width: 140px; height: 140px;">
                        <h2>Yes</h2>
                        <p>Review the profiles that you gave your contact information to.</p>
                        <p><a id="favoritesButton" class="btn btn-default" href="/59SecondPitch/investorFavorites.php" role="button">View Favorite Profiles »</a></p>
                    </div><!-- /.col-lg-4 -->
                </div><!-- /.row -->
            </div>
            <div>
                <p id="quote">"How many millionaires do you know who have become wealthy by investing in savings accounts? I rest my case." -Robert G. Allen</p>
            </div>
        </div>
    </body>
</html>