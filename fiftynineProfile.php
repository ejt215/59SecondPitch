<?php

class fiftynineProfile {
    public $fiftynineprofileid;
    public $username;
    public $password;
    public $email;
    public $firstname;
    public $lastname;
    public $age;
    public $almamater;
    public $city;

    function __construct($fiftynineprofileid,$username,$password,$email,$age,$almamater,$city) {        
        $this->fiftynineprofileid = $fiftynineprofileid;
        $this->username = $username;
        $this->password = $password;
        $this->email = $email;
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->age = $age;
        $this->almamater = $almamater;
        $this->city = $city; 
    }  
}
?>