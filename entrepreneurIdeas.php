<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
session_start();
//Set this session variable so that pages can know the referrer
$_SESSION['ideas'] = true;
include_once 'FiftyNineDAO.php';
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
        <script src="JS/entrepreneurIdeas.js"></script>
    </head>
    <body>

        <div class ="page-header ">
            <div class ="centering text-center" >
                <img src="IMG/59SecondPitchLogo.png" alt=""/>
            </div>

        </div>

        <!-- Sidebar -->
        <div id="sidebarDiv">
            <ul id="sidebar" >
                <li><a href="/59SecondPitch/entrepreneurHome.php">Home</a></li>
                <li><a href="/59SecondPitch/manageProfile.php">Manage Profile</a></li>
            </ul>
        </div>




        <!--Profile Container-->
        <div id="profileContainer" class="container-fluid1">
            <div  class="row-fluid">
                <div id ="profile" class ="coverflow  text-center"   >
                    <div class ="cover " name ="" id ="1" style ="border: 2px solid;" ></div>
                    <div class ="cover " name ="" id ="2" style ="border: 2px solid;"></div>
                    <div class ="cover " name ="" id ="3" style ="border: 2px solid;"></div>
                    <div class ="cover " name ="" id ="4" style ="border: 2px solid;"></div>
                    <div class ="cover " name ="" id ="5" style ="border: 2px solid;"></div>
                </div>
            </div>
        </div>

        <!--Button Container-->
        <div class="container-fluid" >
            <div  class="row-fluid">
                <div  class ="centered text-center" >
                    <button type="button" id ="newIdea" class="btn btn-danger">New Idea</button>
                </div>
            </div>
        </div>



    </body>
</html>
