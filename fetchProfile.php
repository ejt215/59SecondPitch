<?php

include_once 'fiftynineDAO.php';



    $dao = new fiftynineDAO();

    $sql = "SELECT * FROM entrepreneur ORDER BY RAND() LIMIT 5";
    $result = $dao->executeSQL($sql);
    $list = array();
    //'1' =>"",'2' =>"",'3'=>"",'4' =>"",'5'=>""
    $count = 1;
    while($row = mysqli_fetch_array($result)){
    $profileid = $row['59profileid'];
    $business_id = $row['business_id'];


    $sql = "SELECT firstname,lastname,almamater,city,business_type,business_name,left(business_description,50) as business_description " .
            "FROM entrepreneur,59profile " .
            "WHERE 59profile.59profileid = " . $profileid .
            " AND business_id = " . $business_id;

    $result2 = $dao->executeSQL($sql);
    $row2 = mysqli_fetch_array($result2);
    $list[''.$count] = array('business_name' => $row2{'business_name'}, 'business_type' => $row2{'business_type'}, 'firstname' => $row2{'firstname'}, 'lastname' => $row2{'lastname'}, 'almamater' => $row2{'almamater'}, 'city' => $row2{'city'}, 'business_description' => $row2{'business_description'});
    
    $count ++;
    }
    
    
    //echo json_encode(array('business_name' => $row{'business_name'}, 'business_type' => $row{'business_type'}, 'firstname' => $row{'firstname'}, 'lastname' => $row{'lastname'}, 'almamater' => $row{'almamater'}, 'city' => $row{'city'}, 'business_description' => $row{'business_description'}));
    echo json_encode($list);
