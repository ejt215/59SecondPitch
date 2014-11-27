<?php
class InvestorProfile {
    public $fiftynineprofileid;
    public $class;
    public $contact_type;
    public $contact_preferences;
    function __construct($fiftynineprofileid, $class, $contact_type, $contact_preferences) {
        $this->fiftynineprofileid = $fiftynineprofileid;
        $this->class = $class;
        $this->contact_type = $contact_type;
        $this->contact_preferences = $contact_preferences;
    }
}
?>