<?php
class InvestorProfile {
    public $fiftynineprofileid;
    public $class;
    public $contact_type;
    public $contact_preferences;
    public $phone;
    function __construct($fiftynineprofileid, $class, $contact_type, $contact_preferences, $phone) {
        $this->fiftynineprofileid = $fiftynineprofileid;
        $this->class = $class;
        $this->contact_type = $contact_type;
        $this->contact_preferences = $contact_preferences;
        $this->phone = $phone;
    }
}
?>