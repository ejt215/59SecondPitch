<?php

include_once "FiftyNineProfile.php";
include_once "EntrepreneurProfile.php";

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

    public function getEntrepreneurProfileFromBusinessID($business_id) {
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

    public function getInvestorContactInfo($fiftynineprofileid) {

        $con = $this->getDBConnection();
        $sql = "SELECT contact_type " .
                "FROM investor " .
                "WHERE 59profileid = " . $fiftynineprofileid;
        $result = $this->executeSQL($sql);
        $row = mysqli_fetch_array($result);
        if ($row['contact_type'] == "either") {
            $sql = "SELECT firstname,lastname,contact_type,email, " .
                    "FROM investor " .
                    "WHERE 59profileid = " . $fiftynineprofileid;
            $result = $this->executeSQL($sql);
            $row = mysqli_fetch_array($result);
        } elseif ($row['contact_type'] == "email") {
            
        } 
        elseif ($row['contact_type'] == "phone") {
            
        } else {
            die("59DAO::getInvestorContactInfo");
        }
        $sql = "SELECT firstname,lastname,contact_type, FROM investor WHERE 59profileid=" . $fiftynineprofileid;
        if (!($result = mysqli_query($con, $sql))) {
            die('Error: ' . mysqli_error($con) . "      " . $sql);
        }

        $row = mysqli_fetch_array($result);
        $investorProfile = new InvestorProfile($row['59profileid'], $row['class'], $row['contact_type'], $row['contact_preferences']);
        return $investorProfile;


        $investorContacts = array();
        $con = $this->getDBConnection();

        //Get all the business_id's that the entrepreneur has
        $business_idSQL = "SELECT business_id " .
                "FROM entrepreneur " .
                "WHERE 59profileid = " . $fiftynineprofileid;

        //Get all investor id's that are matched with any of the business_id's
        $investorSQL = "SELECT distinct 59profileid " .
                "FROM matching " .
                "WHERE business_id IN (" . $business_idSQL . ")";



        $result = $this->executeSQL($investorSQL);
        $i = 0;

        while ($row = mysqli_fetch_array($result)) {
            $individualInvestorSQL = "SELECT * " .
                    "FROM investor " .
                    "WHERE 59profileid = " . $row[$i];

            $individualResult = $this->executeSQL($individualInvestorSQL);
            $individualRow = mysqli_fetch_array($individualResult);

            if ($individualRow['contact_type'] == "Either") {
                die("EITHER");
                $sql = "SELECT firstname,lastname,contact_type,email, " .
                        "FROM investor " .
                        "WHERE 59profileid = " . $individualRow[0];
                $result = $this->executeSQL($sql);
                $row = mysqli_fetch_array($result);
            } elseif ($individualRow['contact_type'] == "Email") {
                $emailContactSQL = "SELECT firstname,lastname,contact_type,email,contact_preferences " .
                        "FROM investor, 59profile " .
                        "WHERE investor.59profileid = " . $row[$i] . " " .
                        "AND 59profile.59profileid = " . $row[$i];

                $emailContactResult = $this->executeSQL($emailContactSQL);
                $emailContactRow = mysqli_fetch_array($emailContactResult);
                // echo $i . " " . $emailContactRow["firstname"] . " " . $emailContactRow["lastname"] . " " . $emailContactRow["contact_type"] . " " . $emailContactRow[3] . " " . $emailContactRow["contact_preferences"];
                $investorContacts[] = $emailContactRow;
                //echo sizeof($investorContacts);
            } elseif ($individualRow['contact_type'] == "Phone") {
                
            } else {
                die("59DAO::getInvestorContactInfo");
            }
            $i++;
        }

        return $investorContacts;

    }

    public function getEntrepreneurProfiles($fiftynineprofileid) {
        $con = $this->getDBConnection();
        $sql = "SELECT * FROM entrepreneur WHERE 59profileid=" . $fiftynineprofileid;
        if (!($result = mysqli_query($con, $sql))) {
            die('Error: ' . mysqli_error($con) . "      " . $sql);
        }

        $profiles = array();
        $index = 1;
        while ($row = mysqli_fetch_array($result)) {
            $profile = new EntrepreneurProfile($row['business_id'], $row['59profileid'], $row['business_type'], $row['business_name'], $row['business_description']);
            $profiles[$index] = $profile;
            $index++;
        }
        return $profiles;
    }

    public function match($profileid, $businessid, $match) {
        $con = $this->getDBConnection();
        $var = $match;
        $sql = "INSERT into matching(59profileid,business_id,matched) values('" . $profileid . "','" . $businessid . "'," . $var . ")";

        $result = mysqli_query($con, $sql);
        if (!$result) {
            die('Error: ' . mysqli_error($con) . "      " . $sql);
        }
    }

    public function track($profileid, $businessid) {
        $con = $this->getDBConnection();

        $sql = "INSERT into tracking(59profileid,business_id) values('" . $profileid . "'," . $businessid . ")";

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

    public function deleteEntrepreneurIdea($business_id) {
        $con = $this->getDBConnection();

        $sql = "DELETE FROM entrepreneur WHERE business_id = " . $business_id;

        $result = mysqli_query($con, $sql);
        if (!$result) {
            die('Error: ' . mysqli_error($con) . "      " . $sql);
        }
    }

    public function insertEntrepreneurIdea($profileID, $workType, $workName, $workDesc) {
        $con = $this->getDBConnection();

        $sql = "INSERT INTO entrepreneur (59profileid,business_type,business_name,business_description)" .
                "VALUES (" . $profileID . ",'" . $workType . "','" . $workName . "','" . $workDesc . "')";
        $result = mysqli_query($con, $sql);
        if (!$result) {
            die('Error: ' . mysqli_error($con) . "      " . $sql);
        }
    }

}

?>
