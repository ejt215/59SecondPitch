<?php

include_once "FiftyNineProfile.php";

class FiftyNineDAO {

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
        } else {

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
        //die($row['59profileid'] . $row['password'] . $row['email'] . $row['firstname'] . $row['lastname'] . $row['age'] . $row['almamater'] . $row['city']);
        $fiftynineprofile = new FiftyNineProfile($row['59profileid'], $row['password'], $row['email'], $row['firstname'], $row['lastname'], $row['age'], $row['almamater'], $row['city']);
        return $fiftynineprofile;
    }

    public function getEntrepreneurProfile($business_id) {
        $con = $this->getDBConnection();
        $sql = "SELECT * FROM entrepreneur WHERE business_id=" . $business_id;
        if (!($result = mysqli_query($con, $sql))) {
            die('Error: ' . mysqli_error($con) . "      " . $sql);
        }

        $row = mysqli_fetch_array($result);
        $entrepreneurProfile = new EntrepreneurProfile($row['business_id'], $row['fiftynineprofileid'], $row['business_name'], $row['business_type'], $row['business_description']);
        return $entrepreneurProfile;
    }

    public function getInvestorProfile($fiftynineprofileid) {
        $con = $this->getDBConnection();
        $sql = "SELECT * FROM investor WHERE 59profileid=" . $fiftynineprofileid;
        if (!($result = mysqli_query($con, $sql))) {
            die('Error: ' . mysqli_error($con) . "      " . $sql);
        }

        $row = mysqli_fetch_array($result);
        $investorProfile = new InvestorProfile($row['59profileid'], $row['class'], $row['contact_type'], $row['contact_preferences']);
        return $investorProfile;
    }

    public function match($profileid, $businessid,$match) {
        $con = $this->getDBConnection();
        $var = $match;
        $sql = "INSERT into matching(59profileid,business_id,matched) values('" . $profileid . "','" . $businessid . "'," . $var . ")";

        $result = mysqli_query($con, $sql);
        if (!$result) {
            die('Error: ' . mysqli_error($con) . "      " . $sql);
        }
    }

    public function verify($email, $pass) {
        $con = $this->getDBConnection();
        $sql = "SELECT * 
                FROM 59profile
                WHERE email = '" . $email . "' 
                AND password = '" . $pass . "'";

        $result = mysqli_query($con, $sql);
        if (!$result) {
            die('Error: ' . mysqli_error($con) . "      " . $sql);
        } else {
            $rowcount = mysqli_num_rows($result);
            if ($rowcount == 0) {
                return false;
            } elseif ($rowcount == 1) {
                return true;
            } else {
                die("Verify-Rowcount returned more than one record.  Check for primary key conflicts");
            }
        }
    }

}

?>
