<!-- Author: Monkolsophearith Prum -->
<!-- AGL Coding Test -->
<!-- File: model.php -->

<?php

class Model{
    public function getJson($link){
        require_once 'owner.php';
        require_once 'pet.php';
        $ownersArray = array();             //declaring arrays for both objects
        $petsArray = array();
        try {  
            $json_file = file_get_contents($link);              //get json data from link
            $decoded_json = json_decode($json_file, true);      //decode content

            foreach($decoded_json as $key => $value) {          //looping through json data
                $ownerName = $decoded_json[$key]["name"];
                $gender = $decoded_json[$key]["gender"];        //add specific data to variables
                $age = $decoded_json[$key]["age"];
                $pets = $decoded_json[$key]['pets'];
                array_push($ownersArray, New Owner($ownerName, $gender, $age));     //create new object and add to array
                if ($pets){                                                         //if pet exists, then get data
                    foreach($pets as $pet) {
                        $petName = $pet['name'];
                        $type = $pet['type'];
                        array_push($petsArray, New Pet($petName, $type, $ownerName));   //create object and add to array
                    }
                }
            }
        }
        catch (Exception $e) {  
            echo $e->getMessage();      // displays error messages
        }
        return array($ownersArray, $petsArray);     //return data back to controller
    }
}
 
?>