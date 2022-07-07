<!-- Author: Monkolsophearith Prum -->
<!-- AGL Coding Test -->
<!-- File: pet.php -->

<?php

class Pet{
    public function __construct($name, $type, $owner) {     //constructor for pet object
        $this->name = $name;
        $this->type = $type;
        $this->owner = $owner;
    }
}

?>