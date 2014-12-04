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
        $sql = "SELECT 59profileid FROM 59profile WHERE email='" . mysqli_real_escape_string($con, $email) . "'";
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
        $sql = "SELECT * FROM 59profile WHERE email='" . mysqli_real_escape_string($con, $email) . "'";
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
        $entrepreneurProfile = new EntrepreneurProfile($row['business_id'], $row['fiftynineprofileid'], $row['business_name'], $row['business_type'], $row['business_description'],$row['business_video']);
        return $entrepreneurProfile;
    }

    public function getInvestorProfile($fiftynineprofileid) {
        $con = $this->getDBConnection();
        $sql = "SELECT * FROM investor WHERE 59profileid=" . $fiftynineprofileid;
        if (!($result = mysqli_query($con, $sql))) {
            die('Error: ' . mysqli_error($con) . "      " . $sql);
        }

        $row = mysqli_fetch_array($result);
        $investorProfile = new InvestorProfile($row['59profileid'], $row['class'], $row['contact_type'], $row['contact_preferences'],$row['business_video']);
        return $investorProfile;
    }

    public function getInvestorContactInfo($fiftynineprofileid) {

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
        //$i = 0;

        while ($row = mysqli_fetch_array($result)) {
            $individualInvestorSQL = "SELECT * " .
                    "FROM investor " .
                    "WHERE 59profileid = " . $row[0];

            $individualResult = $this->executeSQL($individualInvestorSQL);
            $individualRow = mysqli_fetch_array($individualResult);

            if ($individualRow['contact_type'] == "Either") {
                $eitherContactSQL = "SELECT firstname,lastname,class,age,almamater,city,contact_type,phone,email,contact_preferences,profilepicture " .
                        "FROM investor, 59profile " .
                        "WHERE investor.59profileid = " . $row[0] . " " .
                        "AND 59profile.59profileid = " . $row[0];
                $eitherContactResult = $this->executeSQL($eitherContactSQL);
                $eitherContactRow = mysqli_fetch_array($eitherContactResult);
                $investorContacts[] = $eitherContactRow;
            } elseif ($individualRow['contact_type'] == "Email") {
                $emailContactSQL = "SELECT firstname,lastname,class,age,almamater,city,contact_type,email,contact_preferences,profilepicture " .
                        "FROM investor, 59profile " .
                        "WHERE investor.59profileid = " . $row[0] . " " .
                        "AND 59profile.59profileid = " . $row[0];

                $emailContactResult = $this->executeSQL($emailContactSQL);
                $emailContactRow = mysqli_fetch_array($emailContactResult);
                // echo $i . " " . $emailContactRow["firstname"] . " " . $emailContactRow["lastname"] . " " . $emailContactRow["contact_type"] . " " . $emailContactRow[3] . " " . $emailContactRow["contact_preferences"];
                $investorContacts[] = $emailContactRow;
                //echo sizeof($investorContacts);
            } elseif ($individualRow['contact_type'] == "Phone") {
                $phoneContactSQL = "SELECT firstname,lastname,class,age,almamater,city,contact_type,phone,contact_preferences,profilepicture " .
                        "FROM investor, 59profile " .
                        "WHERE investor.59profileid = " . $row[0] . " " .
                        "AND 59profile.59profileid = " . $row[0];

                $phoneContactResult = $this->executeSQL($phoneContactSQL);
                $phoneContactRow = mysqli_fetch_array($phoneContactResult);
                // echo $i . " " . $emailContactRow["firstname"] . " " . $emailContactRow["lastname"] . " " . $emailContactRow["contact_type"] . " " . $emailContactRow[3] . " " . $emailContactRow["contact_preferences"];
                $investorContacts[] = $phoneContactRow;
                //echo sizeof($investorContacts);               
            } else {
                die("59DAO::getInvestorContactInfo");
            }
            //$i++;
        }

        return $investorContacts;
    }
    
    public function getInvestorFavorites($fiftynineprofileid){
    $con = $this->getDBConnection();
    $sql = "SELECT business_id FROM matching WHERE matched = 1 and 59profileid=" . $fiftynineprofileid;
    if (!($result = mysqli_query($con, $sql))) {
            die('Error: ' . mysqli_error($con) . "      " . $sql);
        }
        
        $business_id;
        $profiles = array();
        $index = 0;
        while ($row = mysqli_fetch_array($result)) {
            $business_id = $row['business_id'];
        $sql2 = "SELECT * FROM 59secondpitch.59profile inner join entrepreneur on 59profile.59profileid=entrepreneur.59profileid WHERE entrepreneur.business_id=" . $business_id;
        if (!($result2 = mysqli_query($con, $sql2))) {
            die('Error: ' . mysqli_error($con) . "      " . $sql2);
        }

        
        
       $row2 = mysqli_fetch_array($result2);
            //$profile = new EntrepreneurProfile($row2['business_id'], $row2['59profileid'], $row2['business_type'], $row2['business_name'], $row2['business_description'],$row2['business_video']);
            $profile=$row2;
       $profiles[$index] = $profile;
            $index++;
        
        
        }
        return $profiles;
        
    
    }
    public function getInvestorTracks($fiftynineprofileid){
        $con = $this->getDBConnection();
    $sql = "SELECT business_id FROM tracking WHERE 59profileid=" . $fiftynineprofileid;
    if (!($result = mysqli_query($con, $sql))) {
            die('Error: ' . mysqli_error($con) . "      " . $sql);
        }
        
        $business_id;
        $profiles = array();
        $index = 0;
        while ($row = mysqli_fetch_array($result)) {
            $business_id = $row['business_id'];
        $sql2 = "SELECT * FROM 59secondpitch.59profile inner join entrepreneur on 59profile.59profileid=entrepreneur.59profileid WHERE entrepreneur.business_id=" . $business_id;
        if (!($result2 = mysqli_query($con, $sql2))) {
            die('Error: ' . mysqli_error($con) . "      " . $sql2);
        }

        
        
       $row2 = mysqli_fetch_array($result2);
            $profile = $row2;
            $profiles[$index] = $profile;
            $index++;
        
        
        }
        return $profiles;
    }
    public function getInvestorAC($fiftynineprofileid){
        $con = $this->getDBConnection();
        $sql = "SELECT almamater,city FROM 59Profile WHERE 59profileid=" . $fiftynineprofileid;
        if (!($result = mysqli_query($con, $sql))) {
            die('Error: ' . mysqli_error($con) . "      " . $sql);
        }
        $row = mysqli_fetch_array($result);
        $info = array();
        $info[0]=$row['almamater'];
        $info[1] = $row['city'];
        return $info;
        
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
            $profile = new EntrepreneurProfile($row['business_id'], $row['59profileid'], $row['business_type'], $row['business_name'], $row['business_description'],$row['business_video']);
            $profiles[$index] = $profile;
            $index++;
        }
        return $profiles;
    }
    public function feedback($businessid,$regular,$other){
        $con = $this->getDBConnection();
        
        $sql = "INSERT into feedback(business_id,regular,other) values('" . $businessid. "','" . mysqli_real_escape_string($con,$regular) . "','" . mysqli_real_escape_string($con,$other) . "')";

        $result = mysqli_query($con, $sql);
        if (!$result) {
            die('Error: ' . mysqli_error($con) . "      " . $sql);
        }
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
                WHERE email = '" . mysqli_real_escape_string($con, $email) . "' 
                AND password = '" . mysqli_real_escape_string($con, $pass) . "'";

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

    public function insertEntrepreneurIdea($profileID, $workType, $workName, $workDesc, $business_video) {
        $con = $this->getDBConnection();

        $sql = "INSERT INTO entrepreneur (59profileid,business_type,business_name,business_description, business_video)" .
                "VALUES (" . $profileID . ",'" . $workType . "','" . mysqli_real_escape_string($con, $workName) . "','" . mysqli_real_escape_string($con, $workDesc) . "','" . mysqli_real_escape_string($con, $business_video) . "')";
        $result = mysqli_query($con, $sql);
        if (!$result) {
            die('Error: ' . mysqli_error($con) . "      " . $sql);
        }
    }

    public function updateEntrepreneurIdea($profileID, $business_id, $workType, $workName, $workDesc, $business_video) {
        $con = $this->getDBConnection();

        $sql = "UPDATE entrepreneur " .
            "SET business_type = '" . mysqli_real_escape_string($con, $workType) . "'," .
            "business_name = '" . mysqli_real_escape_string($con, $workName) . "'," .
            "business_description = '" . mysqli_real_escape_string($con, $workDesc) . "'," . 
            "business_video = '" . mysqli_real_escape_string($con, $business_video) . "' " .
            "WHERE 59profileid = " . $profileID . " " .
            "AND business_id = " . $business_id;
        $this->executeSQL($sql);
    }
    
    public function insertInvestorProfile($profileID, $class, $contact_type, $contact_preferences, $phoneNumber) {
        $con = $this->getDBConnection();
        if (!$phoneNumber) {
            $sql = "INSERT INTO investor (59profileid,class,contact_type,contact_preferences)" .
                    "VALUES ('$profileID','$class','$contact_type','" . mysqli_real_escape_string($con, $contact_preferences) . "')";
        } else {
            $sql = "INSERT INTO investor (59profileid,class,contact_type,contact_preferences,phone)" .
                    "VALUES ('$profileID','$class','$contact_type','" . mysqli_real_escape_string($con, $contact_preferences) . "','$phoneNumber')";
        }

        $this->executeSQL($sql);
    }

    public function getStatistics($fiftynineprofileid) {
        $statistics = array();
        $con = $this->getDBConnection();

        //Get all the business_id's that the entrepreneur has
        $business_idSQL = "SELECT business_id " .
                "FROM entrepreneur " .
                "WHERE 59profileid = " . $fiftynineprofileid;

        $result = $this->executeSQL($business_idSQL);

        while ($row = mysqli_fetch_array($result)) {

            $nameSQL = "SELECT business_name " .
                    "FROM entrepreneur " .
                    "WHERE business_id = " . $row[0];
            
            $matchSQL = "SELECT count(*) " .
                    "FROM matching " .
                    "WHERE business_id = " . $row[0] . " " .
                    "AND matched = 1";

            $noMatchSQL = "SELECT count(*) " .
                    "FROM matching " .
                    "WHERE business_id = " . $row[0] . " " .
                    "AND matched = 0";
            $feedbackSQL = "SELECT regular,other " .
                    "FROM feedback " .
                    "WHERE business_id = " . $row[0];

            $matchResult = $this->executeSQL($matchSQL);
            $noMatchResult = $this->executeSQL($noMatchSQL);
            $nameResult = $this->executeSQL($nameSQL);
            $feedbackResult = $this->executeSQL($feedbackSQL);
            
            $matchRow = mysqli_fetch_array($matchResult);
            $noMatchRow = mysqli_fetch_array($noMatchResult);
            $nameRow = mysqli_fetch_array($nameResult);
            $feedbackRow = mysqli_fetch_array($feedbackResult);
                      
            $statistics[] = [$nameRow[0],$matchRow[0],$noMatchRow[0],$feedbackRow['regular'],$feedbackRow['other']];
        }

        return $statistics;
    }
}


?>
