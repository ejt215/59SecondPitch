
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
    </head>
    <body>




        <script>

            $(document).ready(function () {
                $("ul#demo_menu1").sidebar({
                });
                $('.coverflow').coverflow({
                    index: 6,
                    density: 2,
                    innerOffset: 50,
                    innerScale: .7
                });
                $("#next").click(function () {


                    var clickBtnValue = $(this).val();

                    data = {'action': clickBtnValue};

                    //data = $(this).serialize() + "&" + $.param(data);
                    $.ajax({
                        type: "POST",
                        dataType: "json",
                        url: "fetchProfile.php",
                        data: data,
                        success: function (data) {
                           
                            var profile;
                            for (i = 1; i < 6; i++) {
                                profile = data[""+i];
                                 
                                $("#"+i).html(
                                        "<h1> " + profile["business_name"] + "</h1><br />Business type: " + profile["business_type"] + "<br />Creator: " + profile["firstname"] + " " + profile["lastname"] + "<br /> " +
                                        "Almamater: " + profile['almamater'] + "<br />Location: " + profile['city'] + "<br />" + "Description :<br /><br /><br />" + profile['business_description']
                                        );

                            }
                        }
                    });
                });
            });


        </script>

        <div class ="page-header ">
            <div class ="centering text-center" >
                <img src="IMG/59SecondPitchLogo.png" alt=""/>
            </div>

        </div>
<ul id="demo_menu1" >
                <li><a href="/" >Manage profile</a></li>
                <li><a href="/plugins/" >Favorites</a></li>
                <li><a href="/works/" >Tracking</a></li>
                <li><a href="/about/" >Logout</a></li>

            </ul>

        <div class="container-fluid " >
            

            <div  class="row-fluid ">
                <div id ="profile" class ="coverflow  centered text-center"   >
                    
                        <div class ="cover centered text-center" id ="1" ></div>
                        <div class ="cover centered text-center" id ="2" ></div>
                        <div class ="cover centered text-center" id ="3" ></div>
                        <div class ="cover centered text-center" id ="4" ></div>
                        <div class ="cover centered text-center" id ="5" ></div>

                   
                    
                </div>
                 
                
                <div  class ="centered text-center" >
                    <button type="button" class="btn btn-danger">No Thanks</button>
                    <button type="button" class="btn btn-info">Feedback</button>
                    <button type="button"  class="btn btn-success">Match</button>
                    <button type="button" id ="next" class="btn btn-info">Next</button>
                </div>
                </div>

           
            
            </div>
        




    </body>
</html>

