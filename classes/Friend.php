<?php

use Interfaces\IPopulateableFromStdClass;

class Friend implements IPopulateableFromStdClass {
    public $id;
    public $name;
    
    public function toXml() {
        return
            '<friend>' . 
                '<id>' . $this->id . '</id>' .
                '<name>' . $this->name . '</name>' .
            '</friend>';
    }
    
    public function populateFromStdClass(stdClass $stdClass) {
        $this->id = $stdClass->id;
        $this->name = $stdClass->name;
    }
}
