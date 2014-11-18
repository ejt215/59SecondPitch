<?php
class FiftyNineProfile {
    public $fiftynineprofileid;
    public $password;
    public $email;
    public $firstname;
    public $lastname;
    public $age;
    public $almamater;
    public $city;
    function __construct($fiftynineprofileid,$password,$email,$firstname,$lastname,$age,$almamater,$city) {        
        $this->fiftynineprofileid = $fiftynineprofileid;
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