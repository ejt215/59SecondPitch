<?php
class EntrepreneurProfile {
    public $business_id;
    public $fiftynineprofileid;
    public $business_type;
    public $business_name;
    public $business_video;
    function __construct($business_id, $fiftynineprofileid, $business_type, $business_name, $business_video) {
        $this->business_id = $business_id;
        $this->fiftynineprofileid = $fiftynineprofileid;
        $this->business_type = $business_type;
        $this->business_name = $business_name;
        $this->business_video = $business_video;
    }
    function toString()
    {
        return $this->business_id . " " . $this->fiftynineprofileid . " " . $this->business_type . " " . $this->business_name . " " . $this->business_video;
    }
}
?>