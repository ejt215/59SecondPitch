<?php

//include 'S59Profile.php';

class fiftynineDAO {

    private $_mysqli;

    function __construct() {
        
    }

    function __destruct() {
        
    }

    private function getDBConnection() {
        if (!isset($_mysqli)) {
            $_mysqli = new mysqli("128.180.177.4:3307", "guest", "pitch", "59secondpitch");
            if ($_mysqli->errno) {
                printf("Unable to connect: %s", $_mysqli->error);
                exit();
            }
        }
        return $_mysqli;
    }

    public function executeSQL($sql) {
        $con = $this->getDBConnection();
        if (!$result = mysqli_query($con, $sql)) {
            die('Error: ' . mysqli_error($con) . "      " . $sql);
        }
        else{
           return $result;
        }
    }

    public function get59ProfileIDFromEmail($email) {
        $con = $this->getDBConnection();
        $sql = "SELECT 59profileid FROM 59profile WHERE email='" . $email . "'";
        if (!($result = mysqli_query($con, $sql))) {
            die('Error: ' . mysqli_error($con) . "      " . $sql);
        }

        $row = mysqli_fetch_array($result);
        $fiftynineprofileid = $row['59profileid'];
        return $fiftynineprofileid;
    }

    public function get59ProfileIDFromBusinessID($business_id) {
        $con = $this->getDBConnection();
        $sql = "SELECT 59profileid FROM entrepreneur WHERE business_id=" . $business_id;
        if (!($result = mysqli_query($con, $sql))) {
            die('Error: ' . mysqli_error($con) . "      " . $sql);
        }

        $row = mysqli_fetch_array($result);
        $fiftynineprofileid = $row['59profileid'];
        return $fiftynineprofileid;
    }

    public function get59Profile($email) {
        $con = $this->getDBConnection();
        $sql = "SELECT * FROM 59profile WHERE email='" . $email . "'";
        if (!($result = mysqli_query($con, $sql))) {
            die('Error: ' . mysqli_error($con) . "      " . $sql);
        }

        $row = mysqli_fetch_array($result);
        $fiftynineprofile = new fiftynineProfile($row['fiftynineprofileid'], $row['username'], $row['password'], $row['email'], $row['firstname'], $row['lastname'], $row['age'], $row['almamater'], $row['city']);
        return $fiftynineprofile;
    }

    public function getEntrepreneurProfile($business_id) {
        $con = $this->getDBConnection();
        $sql = "SELECT * FROM entrepreneur WHERE business_id=" . $business_id;
        if (!($result = mysqli_query($con, $sql))) {
            die('Error: ' . mysqli_error($con) . "      " . $sql);
        }

        $row = mysqli_fetch_array($result);
        $entrepreneurProfile = new entrepreneurProfile($row['business_id'], $row['fiftynineprofileid'], $row['business_name'], $row['business_type'], $row['business_description']);
        return $entrepreneurProfile;
    }

    public function getRandomBrowseProfile() {
        $con = $this->getDBConnection();
        $sql = "SELECT * FROM entrepreneur ORDER BY RAND() LIMIT 1";
        if (!($result = mysqli_query($con, $sql))) {
            die('Error: ' . mysqli_error($con) . "      " . $sql);
        }
        $row = mysqli_fetch_array($result);
        $profileid = $row['59profileid'];
        $business_id = $row['business_id'];


        $sql = "SELECT firstname,lastname,almamater,city,business_type,business_name,business_description " .
                "FROM entrepreneur,59profile " .
                "WHERE 59profile.59profileid = ".$profileid.
                " AND business_id = " . $business_id;

        if (!($result = mysqli_query($con, $sql))) {
            die('Error: ' . mysqli_error($con) . "      " . $sql);
        }
        $row = mysqli_fetch_array($result);


        /*echo "<h1> " . $row{'business_name'} . " </h1><br>";
        echo $row{'business_type'} . "<br>";
        echo "Creator: " . $row{'firstname'} . " " . $row{'lastname'} . "<br>";
        echo "Almamater: " . $row{'almamater'} . "<br>";
        echo "Location: " . $row{'city'} . "<br><br><br>";
        echo "Description: <br><br>";
        echo $row{'business_description'};*/
       // echo json_encode(array('status' => 'error','message'=> 'The group has not been removed')); 
        if(isset($_POST['action'])){
        /*$return['business_name'] = $row{'business_name'};
          $return['business_type'] = $row{'business_type'};
          $return['firstname'] = $row{'firstname'};
          $return['lastname'] = $row{'lastname'};
          $return['almamater'] = $row{'almamater'};
          $return['city'] = $row{'city'};
          $return['business_description'] = $row{'business_description'
          };
          $return["json"] = json_encode($return);*/
          echo json_encode(array('business_name' =>$row{'business_name'},'business_type' =>$row{'business_type'},'firstname' =>$row{'firstname'},'lastname' =>$row{'lastname'},'almamater' =>$row{'almamater'},'city' =>$row{'city'},'business_description'=>$row{'business_description'}));
          
         
         }
    }

    public function getInvestorProfile($fiftynineprofileid) {
        $con = $this->getDBConnection();
        $sql = "SELECT * FROM investor WHERE 59profileid=" . $fiftynineprofileid;
        if (!($result = mysqli_query($con, $sql))) {
            die('Error: ' . mysqli_error($con) . "      " . $sql);
        }

        $row = mysqli_fetch_array($result);
        $investorProfile = new investorProfile($row['59profileid'], $row['class'], $row['contact_type'], $row['contact_preferences']);
        return $investorProfile;
    }

    public function verify($email,$pass){
        $con = $this->getDBConnection();
        $sql = "SELECT * 
                FROM 59profile
                WHERE email = '" . $email . "' 
                AND password = '" . $pass . "'";
        
        $result = mysqli_query($con, $sql);
        if (!$result) {
            die('Error: ' . mysqli_error($con) . "      " . $sql);
        } 
        else {
             $rowcount=mysqli_num_rows($result);
             if ($rowcount == 0){
                 return false;
             }
             elseif ($rowcount == 1){
                 return true;
             }
             else {
                 die("Verify-Rowcount returned more than one record.  Check for primary key conflicts");
             } 
        }
    }
}

?>
