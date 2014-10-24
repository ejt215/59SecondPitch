<?php

class entrepreneurProfile {

    public $business_id;
    public $fiftynineprofileid;
    public $business_type;
    public $business_name;
    public $business_description;

    function __construct($business_id, $fiftynineprofileid, $business_type, $business_name, $business_description) {
        $this->business_id = $business_id;
        $this->fiftynineprofileid = $fiftynineprofileid;
        $this->business_type = $business_type;
        $this->business_name = $business_name;
        $this->business_description = $business_description;
    }
}

?>
