
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
        <div id = "profile">
            
        </div>

        <div>   
            <button type="button" id="next">Next</button>
        </div> 

        


    </body>
</html>

