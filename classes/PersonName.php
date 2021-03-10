<?php

use Interfaces\IPopulateableFromStdClass;

class PersonName implements IPopulateableFromStdClass {
    public $first;
    public $last;
    
    public function toXml() {
        return
            '<name>' . 
                '<first>' . $this->first . '</first>' .
                '<last>' . $this->last . '</last>' .
            '</name>';
    }
    
    public function populateFromStdClass(stdClass $stdClass) {
        $this->first = $stdClass->first;
        $this->last = $stdClass->last;
    }
}
