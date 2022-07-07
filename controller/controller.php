<!-- Author: Monkolsophearith Prum -->
<!-- AGL Coding Test -->
<!-- File: controller.php -->

<?php

class Controller{
    public function getJson($link){         //getting json link from view
        require_once 'model/model.php';
        $model = new Model();               //declaring model object
        return $model->getJson($link);      //passing data to and from model
    }
}

?> 