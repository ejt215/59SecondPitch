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
        <link href="CSS/feedback.css" rel="stylesheet" type="text/css"/>


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
            <div  id = "profiles"class="row-fluid">
                <div id ="profile" class ="coverflow  text-center"   >
                    <div class ="cover " name ="" id ="1" style ="border: 2px solid;text-overflow: ellipsis;" ></div>
                    <div class ="cover " name ="" id ="2" style ="border: 2px solid;text-overflow: ellipsis;"></div>
                    <div class ="cover " name ="" id ="3" style ="border: 2px solid;text-overflow: ellipsis;"></div>
                    <div class ="cover " name ="" id ="4" style ="border: 2px solid;text-overflow: ellipsis;"></div>
                    <div class ="cover " name ="" id ="5" style ="border: 2px solid;text-overflow: ellipsis;"></div>
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
        <div class="container-fluid" >
            <div  class="row-fluid">
                <div  class ="centered text-center" >
                    <button type="button" id ="nothanks" class="btn btn-danger">No Thanks</button>
                    <button type="button" id ="feedback" class="btn btn-info">Feedback</button>
                    <button type="button" id ="track" class="btn btn-info">Track</button>

                    <button type="button" id ="match" class="btn btn-success">Match</button>
                    <button type="button" id ="next" class="btn btn-info">Next</button>
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
         <td colspan="2" style="text-align: center;">
            
         </td>
      </tr>
   </table>
</div>


    </body>
</html>
