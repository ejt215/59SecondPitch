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
        <div>
            <?php
// define variables and set to empty values
$firstnameErr =$lastnameErr= $emailErr =$passwordErr =$repasswordErr =  "";
$name = $email = $password = $lastname = $firstname = $repassword = $age=$almamater = $city = $username = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["firstname"])) {
    $firstnameErr = "Firstname is required";
  } else{
      $firstname = $_POST["firstname"];
  if (!preg_match("/^[a-zA-Z ]*$/",$firstname)) {
  $firstnameErr = "Only letters and white space allowed"; 
}
  }

  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = $_POST["email"];
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  $emailErr = "Invalid email format"; 
}
  }

  if (empty($_POST["password"])) {
    $passwordErr = "Password is required";
  } else {
    $password = $_POST["password"];
  }

  if (empty($_POST["lastname"])) {
    $lastnameErr = "Last name is required";
  } else{
      $lastname = $_POST["lastname"];
  if (!preg_match("/^[a-zA-Z ]*$/",$lastname)) {
  $lastnameErr = "Only letters and white space allowed"; 
}
  }
  $age = $_POST["age"];
  $almamater = $_POST["almamater"];
  $city = $_POST["city"];
  $repassword = $_POST["repassword"];
  $username=  $_POST["username"];
}
?>
      
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
            Username: <input type="text" name="username" value = "<?php echo $username;?>"><br>
            
            Password: <input type="text" name="password"value = "<?php echo $password;?>">
            <span class="error">* <?php echo $passwordErr;?></span><br>
            Re-enter Password: <input type="text" name="repassword" value = "<?php echo $repassword;?>"><br>
            Email: <input type="text" name="email" value ="<?php echo $email;?>">
            <span class="error">* <?php echo $emailErr;?></span><br>
            First Name: <input type="text" name="firstname" value = "<?php echo $firstname;?>">
            <span class="error">* <?php echo $firstnameErr;?></span><br>
            Last Name: <input type="text" name="lastname" value ="<?php echo $lastname;?>">
            <span class="error">* <?php echo $lastnameErr;?></span><br>
            Age: <input type="text" name="age" value ="<?php echo $age;?>"><br>
            University/Alma Mater: <input type="text" name="almamater" value ="<?php echo $almamater;?>"><br>
            City/Metro Area: <input type="text" name="city" value ="<?php echo $city;?>"><br>
            <input type="submit">
        </form>
</div>


</form>
    </body>
</html>
