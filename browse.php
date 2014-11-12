<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
session_start();
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
        <script src="JS/browse.js"></script>
    </head>
    <body>

        <div class ="page-header ">
            <div class ="centering text-center" >
                <img src="IMG/59SecondPitchLogo.png" alt=""/>
            </div>

        </div>

        <!-- Sidebar -->
        <ul id="demo_menu1" >
            <li><a href="/" >Manage profile</a></li>
            <li><a href="/plugins/" >Favorites</a></li>
            <li><a href="/works/" >Tracking</a></li>
            <li><a href="/about/" >Logout</a></li>
        </ul>




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
                    <button type="button" id ="nothanks" class="btn btn-danger">No Thanks</button>
                    <button type="button" id ="feedback" class="btn btn-info">Feedback</button>
                    <button type="button" id ="match" class="btn btn-success">Match</button>
                    <button type="button" id ="next" class="btn btn-info">Next</button>
                </div>
            </div>
        </div>





    </body>
</html>
