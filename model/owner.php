<!-- Author: Monkolsophearith Prum -->
<!-- AGL Coding Test -->
<!-- File: owner.php -->

<?php

class Owner{
    public function __construct($name, $gender, $age) {     //constructor for owner object
        $this->name = $name;
        $this->gender = $gender;
        $this->age = $age;
    }
}

?>