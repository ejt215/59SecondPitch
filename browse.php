<!DOCTYPE html>
<?php
/* Name: browse
 * Authors: Maxwell Smith & Eric Thornton
 * Description:  This page allows investors to see entrepreneur ideas
 */
session_start();
include_once 'FiftyNineDAO.php';
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" type="text/css" href="CSS/dark-glass/sidebar.css" />

        <!-- custom css -->
        <link rel="stylesheet" type="text/css" href="CSS/browseStyles.css" />
        <link rel="stylesheet" type="text/css" href="CSS/feedback.css" />

        <link href="CSS/bootstrap.min.css" rel="stylesheet" media="screen">
        <link href="CSS/jquery-ui.min.css" rel="stylesheet" type="text/css"/>
        <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" rel="stylesheet">

        <script src="http://code.jquery.com/jquery.js"></script>
        <script src="JS/bootstrap.min.js"></script>
        <script src="JS/jquery-ui.min.js" type="text/javascript"></script>
        <script type="text/javascript" src="JS/jquery.sidebar.js"></script>
        <script src="JS/jquery.coverflow.js"></script>
        <script src="JS/jquery.interpolate.js"></script>
        <script src="JS/jquery.mousewheel.js"></script>
        <script src="JS/jquery.touchSwipe.min.js"></script>
        <script src="JS/reflection.js"></script>

        <!-- custom js -->
        <script src="JS/browse.js"></script>

    </head>
    <body class =browse-header >

        <div class ="page-header " style='background-color: black'>
            <div class ="centering text-center " >
                <img src="IMG/59SecondPitchLogo.png" alt=""/>
            </div>

        </div>

        <!-- Sidebar -->
        <ul id="demo_menu1" >
            <li><a href="../59SecondPitch/investorHome.php" >Home</a></li>
            <li><a href="../59SecondPitch/manageProfile.php" >Manage profile</a></li>
            <li><a style='color:#FFFFFF'href="../59SecondPitch/investorFavorites.php" >Favorites</a></li>
            <li><a style='color:#FFFFFF'href="../59SecondPitch/investorTracking.php" >Tracking</a></li>
            <li><a style='color:#FFFFFF'href="../59SecondPitch/login.php" >Logout</a></li>
        </ul>




        <!--Profile Container-->
        <div id="profileContainer" class="container-fluid1">
            <img id="browseBackground" src="IMG/city3.jpg">;
            <div  id = "profiles"class="row-fluid">
                <div id ="profile" class ="coverflow  text-center"   >

                </div>
            </div>
            <div id ="fullProfile" class ="row-fluid" style="display: none;">
                <div id ="fullProfileDisplay" class ="text-center">
                    <div id ="f1" style ="display: none;" ></div>
                    <div id ="f2" style ="display: none;"></div>
                    <div id ="f3" style ="display: none;"></div>
                    <div id ="f4" style ="display: none;"></div>
                    <div id ="f5" style ="display: none;"></div>
                </div>
            </div>
        </div>

        <!--Button Container-->
        <div class="container-fluid" style="background:#000000">
            <div  class="row-fluid">
                <div  class ="centered text-center" >
                    <button type="button" id ="next" class="ph-button ph-btn-red">Next</button>
                </div>
            </div>
        </div>

        <div id="dialog" class="web_dialog">
            <table style="width: 100%; border: 0px;" cellpadding="3" cellspacing="0">
                <tr>
                    <td class="web_dialog_title">Feedback</td>
                    <td class="web_dialog_title align_right">
                        <a href="#" id="btnClose">Close</a>
                    </td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td colspan="2" style="padding-left: 15px;">
                        <b>Entrepreneurs appreciate your feedback. </b>
                    </td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td colspan="2" style="padding-left: 15px;">
                        <!-- Feedback form -->
                        <form>
                            <input id="feed1"  type="radio" name ="feedback"  value="interest" checked/> Not interested in product<br>
                            <input id="feed2" type="radio" name ="feedback"  value="realistic" /> Unrealistic <br>
                            <input id="feed3"  type="radio" name ="feedback"   value="refine" /> Needs refinement<br>
                            <input id ="feed4" value = ""  name ="feedback" type="text" /> Other<br>
                            <input id="btnSubmit" style ="text-align: center"type="button"  value="Submit" />
                        </form>

                    </td>
                </tr>

                <tr>
                    <td colspan="2" style="text-align: center;"></td>
                </tr>
            </table>
        </div>

        <div class ="footer wrap ">
            <div class ="centering text-center " ></div>
        </div>
    </body>
</html>
