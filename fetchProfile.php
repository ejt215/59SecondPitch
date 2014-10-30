<?php

include_once 'fiftynineDAO.php';


//if (isset($_POST['action'])) {
    $dao = new fiftynineDAO();

    $sql = "SELECT * FROM entrepreneur ORDER BY RAND() LIMIT 1";
    $result = $dao->executeSQL($sql);
    $row = mysqli_fetch_array($result);
    $profileid = $row['59profileid'];
    $business_id = $row['business_id'];


    $sql = "SELECT firstname,lastname,almamater,city,business_type,business_name,business_description " .
            "FROM entrepreneur,59profile " .
            "WHERE 59profile.59profileid = " . $profileid .
            " AND business_id = " . $business_id;

    $result = $dao->executeSQL($sql);
    $row = mysqli_fetch_array($result);


    
    
    echo json_encode(array('business_name' => $row{'business_name'}, 'business_type' => $row{'business_type'}, 'firstname' => $row{'firstname'}, 'lastname' => $row{'lastname'}, 'almamater' => $row{'almamater'}, 'city' => $row{'city'}, 'business_description' => $row{'business_description'}));
//}
?>