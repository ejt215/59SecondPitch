<?php
/* Name: fetchProfile
 * Authors: Maxwell Smith & Eric Thornton
 * Description: Returns entrepreneur ventures for investors to browse
 */
include_once 'FiftyNineDAO.php';
session_start();
$profileID = $_SESSION['profileid'];

$dao = new FiftyNineDAO();

$info = $dao->getInvestorAC($profileID);
//Select profiles whose alma mater or location is same as investor
$sql1 = "SELECT  59profileid,business_id 
from entrepreneur 
where 59profileid in(select 59profileid from 59profile where almamater = '" . $info[0] . "' or city = '" . $info[1] . "') 
and business_id not in (select business_id from matching where 59profileid=" . $profileID . ") 
and business_id not in (select business_id from tracking where 59profileid=" . $profileID . ")
order by rand() limit 5";
$result = $dao->executeSQL($sql1);


$list = array();
$count = 1;
while ($row = mysqli_fetch_array($result)) {
    $profileid = $row['59profileid'];
    $business_id = $row['business_id'];

    $sql = "SELECT firstname,lastname,almamater,city,business_type,business_name , profilepicture, business_video " .
            "FROM entrepreneur,59profile " .
            "WHERE 59profile.59profileid = " . $profileid .
            " AND business_id = " . $business_id;

    $result2 = $dao->executeSQL($sql);
    $row2 = mysqli_fetch_array($result2);
    $list['' . $count] = array('profileid' => $profileid, 'business_id' => $business_id, 'business_name' => $row2{'business_name'}, 'business_type' => $row2{'business_type'}, 'firstname' => $row2{'firstname'}, 'lastname' => $row2{'lastname'}, 'almamater' => $row2{'almamater'}, 'city' => $row2{'city'}, 'profilepicture' => $row2{'profilepicture'}, 'business_video' => $row2{'business_video'});
    $count ++;
}//if there are less than 5 profiles with same info as investor
if ($count < 5) {

    $newsql = "SELECT  59profileid,business_id from entrepreneur where business_id not in(select business_id from matching where 59profileid=" . $profileID . ")"
            . " and business_id not in (select business_id from tracking where 59profileid=" . $profileID . ")"
            . "and 59profileid not in(select 59profileid from 59profile where almamater = '" . $info[0] . "' or city = '" . $info[1] . "')"
            . "order by rand()";
    $result = $dao->executeSQL($newsql);
    while ($row = mysqli_fetch_array($result)) {
        $profileid1 = $row['59profileid'];
        $business_id1 = $row['business_id'];

        $sql = "SELECT firstname,lastname,almamater,city,business_type,business_name , profilepicture, business_video " .
                "FROM entrepreneur,59profile " .
                "WHERE 59profile.59profileid = " . $profileid1 .
                " AND business_id = " . $business_id1;

        $result2 = $dao->executeSQL($sql);
        $row2 = mysqli_fetch_array($result2);
        $list['' . $count] = array('business_id' => $business_id1, 'business_name' => $row2{'business_name'}, 'business_type' => $row2{'business_type'}, 'firstname' => $row2{'firstname'}, 'lastname' => $row2{'lastname'}, 'almamater' => $row2{'almamater'}, 'city' => $row2{'city'}, 'profilepicture' => $row2{'profilepicture'}, 'business_video' => $row2{'business_video'});
        if ($count == 5) {
            break;
        }
        $count ++;
    }
}
echo json_encode($list);


