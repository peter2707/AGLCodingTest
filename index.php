<!-- Author: Monkolsophearith Prum -->
<!-- AGL Coding Test -->
<!-- File: index.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Webpage Title -->
    <title>AGL | JSON Output</title>

</head>

<body>
    <div class="container">
        <?php
            require_once 'controller/controller.php';
            $controller = new Controller();

            $i = 1;
            $ownersArray = array();                 //declare empty arrays
            $petsArray = array();
            try{
                list($ownersArray, $petsArray) = $controller->getJson('http://agl-developer-test.azurewebsites.net/people.json');
                sort($ownersArray);
                sort($petsArray);                               //get data as arrays from controller and sort them alphabetically

                echo "<h1>Female Cat Owners</h1>";
                foreach($petsArray as $pet){                    //loop through both arrays
                    foreach($ownersArray as $owner){            //get only pets that are cats and owned by female and print data
                        if(strcasecmp($pet->type, "cat") == 0 && $pet->owner == $owner->name && strcasecmp($owner->gender, "female") == 0){
                            echo <<< END
                                <h3>$i. Pet's name: $pet->name </h3>
                                <p>Owner: $pet->owner</p>
                                <p>Owner's age: $owner->age</p>
                            END;
                            $i+=1;
                        }
                    }
                }
                $i = 1;
                echo "<h1>Male Cat Owners</h1>";
                foreach($petsArray as $pet){                //loop through both array and get only cats that are owned by male
                    foreach($ownersArray as $owner){        //and print them
                        if(strcasecmp($pet->type, "cat") == 0 && $pet->owner == $owner->name && strcasecmp($owner->gender, "male") == 0){
                            echo <<< END
                                <h3>$i. Pet's name: $pet->name </h3>
                                <p>Owner: $pet->owner</p>
                                <p>Owner's age: $owner->age</p>
                            END;
                            $i+=1;
                        }
                    }
                }
            }catch(Exception $e){
                echo $e->getMessage();      // displays error messages
            }
        ?> 
    </div>
</body>
</html>
