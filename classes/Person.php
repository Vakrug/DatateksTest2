<?php

use Interfaces\IPopulateableFromStdClass;

class Person implements IPopulateableFromStdClass {
    public $_id;
    public $index;
    public $guid;
    public $isActive;
    public $balance;
    public $picture;
    public $age;
    public $eyeColor;
    
    /**
     * @var PersonName
     */
    public $name;
    public $company;
    public $email;
    public $phone;
    public $address;
    public $about;
    public $registered;
    
    /**
     * @var Friend[]
     */
    public $friends;
    
    public function toXml() {
        $result = '<person>';
        $result .= '<_id>' . $this->_id . '</_id>' .
                '<index>' . $this->index . '</index>' .
                '<guid>' . $this->guid . '</guid>' .
                '<isActive>' . $this->isActive . '</isActive>' .
                '<balance>' . $this->balance . '</balance>' .
                '<picture>' . $this->picture . '</picture>' .
                '<age>' . $this->age . '</age>' .
                '<eyeColor>' . $this->eyeColor . '</eyeColor>' .
                
                $this->name->toXml().
                
                '<company>' . $this->company . '</company>' .
                '<email>' . $this->email . '</email>' .
                '<phone>' . $this->phone . '</phone>' .
                '<address>' . $this->address . '</address>' .
                '<about>' . $this->about . '</about>' .
                '<registered>' . $this->registered . '</registered>';
                
        $result .= '<friends>';
        foreach ($this->friends as $friend) {
            $result .= $friend->toXml();
        }
        $result .= '</friends>';
        
        $result .= '</person>';
        return $result;
    }
    
    public function populateFromStdClass(stdClass $stdClass) {
        $this->_id = $stdClass->_id;
        $this->index = $stdClass->index;
        $this->guid = $stdClass->guid;
        $this->isActive = $stdClass->isActive;
        $this->balance = $stdClass->balance;
        $this->picture = $stdClass->picture;
        $this->age = $stdClass->age;
        $this->eyeColor = $stdClass->eyeColor;
        
        $this->name = new PersonName();
        $this->name->populateFromStdClass($stdClass->name);
        
        $this->company = $stdClass->company;
        $this->email = $stdClass->email;
        $this->phone = $stdClass->phone;
        $this->address = $stdClass->address;
        $this->about = $stdClass->about;
        $this->registered = $stdClass->registered;
        
        $this->friends = [];
        foreach ($stdClass->friends as $stdFriend) {
            $friend = new Friend();
            $friend->populateFromStdClass($stdFriend);
            $this->friends[] = $friend;
        }
    }
}
