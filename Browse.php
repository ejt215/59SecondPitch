
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
        <link href="CSS/bootstrap.min.css" rel="stylesheet" media="screen">
    </head>
    <body>
        <script src="http://code.jquery.com/jquery.js"></script>
        <script src="JS/bootstrap.min.js"></script>

        <script>
            $(document).ready(function () {
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
                           
                            $("#profile").html(
                                    "<h1> " + data["business_name"] + "</h1><br />Business type: " + data["business_type"] + "<br />Creator: " + data["firstname"]+" "+data["lastname"] + "<br /> " +
                                    "Almamater: "+data['almamater']+"<br />Location: "+data['city']+"<br />"+"Description :<br /><br /><br />"+data['business_description']
                                    );

                            
                        }
                    });
                });
            });


</script>
<div class="container-fluid " >
        <div  class="row-fluid ">
            <div id ="profile" class ="centering text-center">
                
            </div>
            
        </div>

        <div class="row-fluid">   
         <!--   <button type="button" id="next">Next</button>-->
         <div class ="centering text-center" >
         <button type="button" class="btn btn-danger">No Thanks</button>
         <button type="button" class="btn btn-info">Feedback</button>
            <button type="button"  class="btn btn-success">Match</button>
            <button type="button" id ="next" class="btn btn-info">Next</button>
         </div>
        </div> 
    
</div>

        


    </body>
</html>

