<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <script src="http://code.jquery.com/jquery.js"></script>
        <script src="JS/bootstrap.min.js"></script>
        <script>
    $(document).ready(function(){        
    $("next").click(function(){
        var clickBtnValue = $(this).val();
        var url = 'Browse.php',
        data =  {'action': clickBtnValue};
        $.post(ajaxurl, data, function (response) {
            
        });
            });
        });
            
            </script>
        <?php
        if(isset($_POST['action'])){
            
        }
        function loadNextProfile(){
            $con=mysqli_connect("128.180.177.4:3307","guest","pitch","59secondpitch");
//$con=mysqli_connect("162.242.219.56","59App","AppAppDevDev?","59App");

if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }
        
        
        $sql = "select business_id from entrepreneur;";
        
   $result = mysqli_query($con,$sql);
   $total = mysqli_num_rows($result);
   $random = rand(1,total);
   $sql = "select firstname,lastname,almamater,city,business_type,business_name,business_description
from entrepreneur inner join 59Profile on entrepreneur.59profileid = 59profile.59profileid
where business_id = '".$random."'";
   $result = mysqli_query($con,$sql);
while ($row = mysqli_fetch_array($result)) {
   //echo "Hello ".$row{'firstname'}." your almamater is ".$row{'almamater'};
    echo "<h1> ".$row{'business_name'}." </h1><br>";
    echo $row{'business_type'}."<br>";
    echo "Creator: ".$row{'firstname'}." ".$row{'lastname'}."<br>";
    echo "Almamater: ".$row{'almamater'}."<br>";
    echo "Location: ".$row{'city'}."<br><br><br>";
    echo "Description: <br><br>";
    echo $row{'business_description'};
    
} 
   
}

mysqli_close($con);

        ?>
            <div>   
    <intput type="button" value ="Next" id ="next"></intput>
    
    </div> 
  
    
    
        
    </body>
</html>
