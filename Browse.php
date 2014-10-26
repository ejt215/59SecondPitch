<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php 

session_start() 
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <script src="http://code.jquery.com/jquery.js"></script>
        <script src="JS/bootstrap.min.js"></script>

        <?php
        if (isset($_POST['action'])) {
            loadNextProfile();
        }

        function loadNextProfile() {
            $con = mysqli_connect("128.180.177.4:3307", "guest", "pitch", "59secondpitch");

            if (mysqli_connect_errno()) {
                echo "Failed to connect to MySQL: " . mysqli_connect_error();
            }


            $sql1 = "select business_id from entrepreneur;";

            $result1 = mysqli_query($con, $sql1);
            $total = mysqli_num_rows($result1);
            $random = rand(2, $total);
            $sql2 = "select firstname,lastname,almamater,city,business_type,business_name,business_description
from entrepreneur inner join 59Profile on entrepreneur.59profileid = 59profile.59profileid
where business_id = '" . $random . "'";
            $result2 = mysqli_query($con, $sql2);
           
            while ($row = mysqli_fetch_array($result2)) {
                /*echo "<h1> " . $row{'business_name'} . " </h1><br>";
                echo $row{'business_type'} . "<br>";
                echo "Creator: " . $row{'firstname'} . " " . $row{'lastname'} . "<br>";
                echo "Almamater: " . $row{'almamater'} . "<br>";
                echo "Location: " . $row{'city'} . "<br><br><br>";
                echo "Description: <br><br>";
                echo $row{'business_description'};*/
                $return['business_name'] = $row{'business_name'};
                $return['business_type'] = $row{'business_type'};
                $return['firstname'] = $row{'firstname'};
                $return['lastname'] =$row{'lastname'};
                $return['almamater'] = $row{'almamater'};
                $return['city'] = $row{'city'};
                $return['business_description'] = $row{'business_description'};
                //$return["json"] = json_encode($return);
                echo json_encode($return);
            }
            mysqli_close($con);
        }
        ?>
        
        
        <div id = "profile">
            
        </div>

        <div>   
            <button type="button" id="next">Next</button>
        </div> 

        <script>
            $(document).ready(function () {
                $("#next").click(function () {
                    var clickBtnValue = $(this).val();
                    
                    data = {'action': clickBtnValue};
                            
                    data = $(this).serialize() + "&" + $.param(data);
                    $.ajax({
                        type: "POST",
                        dataType: "json",
                        url: "Browse.php", 
                        data: data,
                        success: function (data) {
                            $("#profile").html(
                                    "<h1> " + data["business_name"] + "</h1><br />Business type: " + data["business_type"] + "<br />Creator: " + data["firstname"]+" "+data["lastname"] + "<br /> " +
                                    "Almamater: "+data['almamater']+"<br />Location: "+data['city']+"<br />"+"Description :<br /><br /><br />"+data['business_description']
                                    );

                            //alert("Form submitted successfully.\nReturned json: " + data["json"]);
                        }
                    });
                });
            });

        </script>





    </body>
</html>
