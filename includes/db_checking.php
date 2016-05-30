<?php
require_once('C:\xampp\htdocs\no_mans_sky\includes\db.php');
global $conn;
global $galaxy_limit;
global $star_system_limit;




//////////////////////  ADDING A GALAXY  ///////////////////////////


function add_galaxy($name){
    //Get the connection to the db
    global $conn;
    //Get the last record
    global $galaxy_limit;
    //get last record of galaxy db
    $sql = $conn->prepare("SELECT * FROM `galaxy` WHERE `Id` = :id");
              $sql->bindParam('id', $galaxy_limit, PDO::PARAM_INT);
              $sql->execute();

              $result = $sql->fetchObject();
              //check the result is real
              if($result != false){
              
              $last_name = $result->name;
              
              if ($last_name != $name){
              
              
                  //Update galaxy limit
              $new_limit = $galaxy_limit + 1;
              //insert the record into the galaxy table
              $sql = "INSERT INTO galaxy (id, name, no_star_systems)
VALUES ('$new_limit', '$name', '0')";

              $conn->exec($sql);

              ////update limit for the new galaxy limit
              $sql = $conn->prepare("UPDATE `limits` SET `galaxy` = '$new_limit' WHERE `id` = '1'");
              $sql->execute();
              echo "<meta http-equiv='refresh' content='0'>";
              }
              else {
                  
              }
              }
              if($result == false){
                  //do same as before, just if the record does not exist but is not same
                            //Update galaxy limit
          $new_limit = $galaxy_limit + 1;

          $sql = "INSERT INTO galaxy (id, name, no_star_systems)
          VALUES ('$new_limit', '$name', '0')";

          $conn->exec($sql);

          $sql = $conn->prepare("UPDATE `limits` SET `galaxy` = '$new_limit' WHERE `id` = '1'");
          $sql->execute();
          echo "<meta http-equiv='refresh' content='0'>";
      }
      
}











//////////////////////// ADDING A STAR SYSTEM  ///////////////////////////////////

function add_star($star_name , $galaxy , $image){
    global $conn;
    global $star_system_limit;
    global $galaxy_limit;
    
    if($star_name != NULL){
    
    $sql = $conn->prepare("SELECT * FROM `star_systems` WHERE `Id` = :id");
              $sql->bindParam('id', $star_system_limit, PDO::PARAM_INT);
              $sql->execute();

              $result = $sql->fetchObject();
              //check the result is real
              if($result != false){
              
              $last_name = $result->name;
              
              if ($last_name != $star_name){
                  //Add to database
                  $current_date = date("d-m-Y");
                  //Update star limit
                  $new_limit = $star_system_limit + 1;
              //insert the record into the galaxy table
                $sql = "INSERT INTO star_systems (ID, name, galaxy, no_planets, image)
                        VALUES ('$new_limit', '$star_name', '$galaxy', '0', '$image[0]')";
    
                $conn->exec($sql);
                
                $sql = $conn->prepare("UPDATE `limits` SET `star_systems` = '$new_limit' WHERE `id` = '1'");
              $sql->execute();
              
              $sql = $conn->prepare("SELECT * FROM `galaxy` WHERE `name` = :id");
              $sql->bindParam('id', $galaxy, PDO::PARAM_INT);
              $sql->execute();
              $result = $sql->fetchObject();
              $number_of_star_systems = $result->no_star_systems;
              $number_of_star_systems = $number_of_star_systems + 1;
              
              $sql = $conn->prepare("UPDATE `galaxy` SET `no_star_systems` = '$number_of_star_systems' WHERE `name` = '$galaxy'");
              $sql->execute();
              
              
              echo "<meta http-equiv='refresh' content='0'>";
              
              }
              else{ //Dont add to database)
                  }
              }
              
              if($result == false && $galaxy_limit != 0){
                  //add to database
                  
                  //Update star limit
                  $new_limit = $star_system_limit + 1;
              //insert the record into the galaxy table
                $sql = "INSERT INTO star_systems (ID, name, galaxy, no_planets, image)
                        VALUES ('$new_limit', '$star_name', '$galaxy', '0', '$image[0]')";
    
                $conn->exec($sql);
                
                $sql = $conn->prepare("UPDATE `limits` SET `star_systems` = '$new_limit' WHERE `id` = '1'");
              $sql->execute();
              
              $sql = $conn->prepare("SELECT * FROM `galaxy` WHERE `name` = :id");
              $sql->bindParam('id', $galaxy, PDO::PARAM_INT);
              $sql->execute();
              $result = $sql->fetchObject();
              $number_of_star_systems = $result->no_star_systems;
              $number_of_star_systems = $number_of_star_systems + 1;
              
              $sql = $conn->prepare("UPDATE `galaxy` SET `no_star_systems` = '$number_of_star_systems' WHERE `name` = '$galaxy'");
              $sql->execute();
              
              
              echo "<meta http-equiv='refresh' content='0'>";
                  
              }
    }
    
    
}


function add_planet($planet_name , $planet_star , $planet_enviroment , $planet_climate , $planet_life , $planet_size , $planet_sentinals , 
                    $planet_minerals , $planet_rating , $planet_image){
    
    global $conn;
    global $star_system_limit;
    global $planet_limit;
    
    if($planet_name != NULL){
    
    $sql = $conn->prepare("SELECT * FROM `planets` WHERE `id` = :id");
              $sql->bindParam('id', $planet_limit, PDO::PARAM_INT);
              $sql->execute();

              $result = $sql->fetchObject();
              //check the result is real
              if($result != false){
              
              $last_name = $result->name;
              
              if ($last_name != $planet_name){
                  //Add to database
                  //Update star limit
                  $new_limit = $planet_limit + 1;
              //insert the record into the galaxy table
                $sql = "INSERT INTO planets (ID, main_image, name, star_system, enviroment, climate, life_type, size, rating, sentinals, minerals, no_moons, extra_image, extra_image2)
                        VALUES ('$new_limit', '$planet_image[0]', '$planet_name', '$planet_star', '$planet_enviroment', '$planet_climate', '$planet_life', '$planet_size', '$planet_rating', '$planet_sentinals', '$planet_minerals', '0', '$planet_image[1]', '$planet_image[2]')";
    
                $conn->exec($sql);
                
                $sql = $conn->prepare("UPDATE `limits` SET `planets` = '$new_limit' WHERE `id` = '1'");
              $sql->execute();
              
              $sql = $conn->prepare("SELECT * FROM `star_systems` WHERE `name` = :id");
              $sql->bindParam('id', $planet_star, PDO::PARAM_INT);
              $sql->execute();
              $result = $sql->fetchObject();
              $number_of_planets = $result->no_planets;
              $number_of_planets = $number_of_planets + 1;
              
              $sql = $conn->prepare("UPDATE `star_systems` SET `no_planets` = '$number_of_planets' WHERE `name` = '$planet_star'");
              $sql->execute();
              
              
              echo "<meta http-equiv='refresh' content='0'>";
              
              }
              else{ //Dont add to database)
                  }
              }
              
              if($result == false && $star_system_limit != 0){
                  //add to database
                  
                  //Update star limit
                  $new_limit = $planet_limit + 1;
              //insert the record into the galaxy table
                $sql = "INSERT INTO planets (ID, main_image, name, star_system, enviroment, climate, life_type, size, rating, sentinals, minerals, no_moons, extra_image, extra_image2)
                        VALUES ('$new_limit', '$planet_image[0]', '$planet_name', '$planet_star', '$planet_enviroment', '$planet_climate', '$planet_life', '$planet_size', '$planet_rating', '$planet_sentinals', '$planet_minerals', '0', '$planet_image[1]', '$planet_image[2]')";
    
                $conn->exec($sql);
                
                $sql = $conn->prepare("UPDATE `limits` SET `planets` = '$new_limit' WHERE `id` = '1'");
              $sql->execute();
              
              $sql = $conn->prepare("SELECT * FROM `star_systems` WHERE `name` = :id");
              $sql->bindParam('id', $planet_star, PDO::PARAM_INT);
              $sql->execute();
              $result = $sql->fetchObject();
              $number_of_planets = $result->no_planets;
              $number_of_planets = $number_of_planets + 1;
              
              $sql = $conn->prepare("UPDATE `star_systems` SET `no_planets` = '$number_of_planets' WHERE `name` = '$planet_star'");
              $sql->execute();
              
              
              echo "<meta http-equiv='refresh' content='0'>";
                  
              }
    }
    
}



function add_moon($moon_name , $moon_star, $moon_parent , $moon_enviroment , $moon_climate , $moon_life , $moon_size , $moon_sentinals , 
                    $moon_minerals , $moon_rating , $moon_image){
    
    global $conn;
    global $planet_limit;
    global $moon_limit;
    
    if($moon_name != NULL){
    
    $sql = $conn->prepare("SELECT * FROM `moons` WHERE `id` = :id");
              $sql->bindParam('id', $moon_limit, PDO::PARAM_INT);
              $sql->execute();

              $result = $sql->fetchObject();
              //check the result is real
              if($result != false){
              
              $last_name = $result->name;
              
              if ($last_name != $moon_name){
                  //Add to database
                  //Update star limit
                  $new_limit = $moon_limit + 1;
              //insert the record into the galaxy table
                $sql = "INSERT INTO moons (id, name, star_system, main_image, enviroment, climate, life_type, size, rating, sentinals, minerals, parent_planet, extra_image1, extra_image2)
                        VALUES ('$new_limit', '$moon_name', '$moon_star', '$moon_image[0]', '$moon_enviroment', '$moon_climate', '$moon_life', '$moon_size', '$moon_rating', '$moon_sentinals', '$moon_minerals', '$moon_parent', '$moon_image[1]', '$moon_image[2]')";
    
                $conn->exec($sql);
                
                $sql = $conn->prepare("UPDATE `limits` SET `moons` = '$new_limit' WHERE `id` = '1'");
              $sql->execute();
              
              $sql = $conn->prepare("SELECT * FROM `planets` WHERE `name` = :id");
              $sql->bindParam('id', $moon_parent, PDO::PARAM_INT);
              $sql->execute();
              $result = $sql->fetchObject();
              $number_of_moons = $result->no_moons;
              $number_of_moons = $number_of_moons + 1;
              
              $sql = $conn->prepare("UPDATE `planets` SET `no_moons` = '$number_of_moons' WHERE `name` = '$moon_parent'");
              $sql->execute();
              
              
              echo "<meta http-equiv='refresh' content='0'>";
              
              }
              else{ //Dont add to database)
                  }
              }
              
              if($result == false && $planet_limit != 0){
                  //add to database
                  
                  //Update star limit
                  $new_limit = $moon_limit + 1;
              //insert the record into the galaxy table
                $sql = "INSERT INTO moons (id, name, star_system, main_image, enviroment, climate, life_type, size, rating, sentinals, minerals, parent_planet, extra_image1, extra_image2)
                        VALUES ('$new_limit', '$moon_name', '$moon_star', '$moon_image[0]', '$moon_enviroment', '$moon_climate', '$moon_life', '$moon_size', '$moon_rating', '$moon_sentinals', '$moon_minerals', '$moon_parent', '$moon_image[1]', '$moon_image[2]')";
    
                $conn->exec($sql);
                
                $sql = $conn->prepare("UPDATE `limits` SET `moons` = '$new_limit' WHERE `id` = '1'");
              $sql->execute();
              
              $sql = $conn->prepare("SELECT * FROM `planets` WHERE `name` = :id");
              $sql->bindParam('id', $moon_parent, PDO::PARAM_INT);
              $sql->execute();
              $result = $sql->fetchObject();
              $number_of_moons = $result->no_moons;
              $number_of_moons = $number_of_moons + 1;
              
              $sql = $conn->prepare("UPDATE `planets` SET `no_moons` = '$number_of_moons' WHERE `name` = '$moon_parent'");
              $sql->execute();
              
              
              echo "<meta http-equiv='refresh' content='0'>";
                  
              }
    }
    
    
    
    
}



////////////////////////// ADD CREATURE  //////////////////////////////////////

function add_creature($creature_name , $creature_planet , $creature_life_type , $creature_size , $creature_diet
        , $creature_rating , $creature_main_image, $moon_or_planet){
    
    global $conn;
    global $planet_limit;
    global $moon_limit;
    global $creature_limit;
    
    
    
    if($creature_name != NULL){
        
        
    
    $sql = $conn->prepare("SELECT * FROM `creatures` WHERE `id` = :id");
              $sql->bindParam('id', $creature_limit, PDO::PARAM_INT);
              $sql->execute();

              $result = $sql->fetchObject();
              //check the result is real
              if($result != false){
                  
              $sql->execute();
              
              $last_name = $result->name;
              
              if ($last_name != $creature_name){
                  //Add to database
                  //Update star limit
                  $new_limit = $creature_limit + 1;
              //insert the record into the galaxy table
                $sql = "INSERT INTO creatures (id, main_image, name, life_type, size, rating, parent_planet, diet)
                        VALUES ('$new_limit', '$creature_main_image', '$creature_name', '$creature_life_type', '$creature_size', '$creature_rating', '$creature_planet', '$creature_diet')";
    
                $conn->exec($sql);
                
                $sql = $conn->prepare("UPDATE `limits` SET `creatures` = '$new_limit' WHERE `id` = '1'");
              $sql->execute();
              
              $sql = $conn->prepare("SELECT * FROM `$moon_or_planet` WHERE `name` = :id");
              $sql->bindParam('id', $creature_planet, PDO::PARAM_INT);
              $sql->execute();
              $result = $sql->fetchObject();
              $number_of_creatures = $result->no_creatures;
              $number_of_creatures = $number_of_creatures + 1;
              
              $sql = $conn->prepare("UPDATE `$moon_or_planet` SET `no_creatures` = '$number_of_creatures' WHERE `name` = '$creature_planet'");
              $sql->execute();
              
              
              echo "<meta http-equiv='refresh' content='0'>";
              
              }
              else{ //Dont add to database)
                  }
              }
              
              if($result == false && $planet_limit != 0){
                  //add to database
                  
                  //Update star limit
                  $new_limit = $creature_limit + 1;
              //insert the record into the galaxy table
                $sql = "INSERT INTO creatures (id, main_image, name, life_type, size, rating, parent_planet, diet)
                        VALUES ('$new_limit', '$creature_main_image', '$creature_name', '$creature_life_type', '$creature_size', '$creature_rating', '$creature_planet', '$creature_diet')";
    
                $conn->exec($sql);
                
                $sql = $conn->prepare("UPDATE `limits` SET `creatures` = '$new_limit' WHERE `id` = '1'");
              $sql->execute();
              
              $sql = $conn->prepare("SELECT * FROM `$moon_or_planet` WHERE `name` = :id");
              $sql->bindParam('id', $creature_planet, PDO::PARAM_INT);
              $sql->execute();
              $result = $sql->fetchObject();
              $number_of_creatures = $result->no_creatures;
              $number_of_creatures = $number_of_creatures + 1;
              
              $sql = $conn->prepare("UPDATE `$moon_or_planet` SET `no_creatures` = '$number_of_creatures' WHERE `name` = '$creature_planet'");
              $sql->execute();
              
              
              echo "<meta http-equiv='refresh' content='0'>";
                  
    }
        }}





/////////////////////////////  ADD SHIP /////////////////////////////////////////////////////

function add_ship($ship_name , $ship_type , $ship_main_image){
    //Get the connection to the db
    global $conn;
    //Get the last record
    global $ship_limit;
    //get last record of galaxy db
    $sql = $conn->prepare("SELECT * FROM `galaxy` WHERE `Id` = :id");
              $sql->bindParam('id', $ship_limit, PDO::PARAM_INT);
              $sql->execute();

              $result = $sql->fetchObject();
              //check the result is real
              if($result != false){
              
              $last_name = $result->name;
              
              if ($last_name != $ship_name){
              
              
                  //Update galaxy limit
              $new_limit = $ship_limit + 1;
              //insert the record into the galaxy table
              $sql = "INSERT INTO ships (id, name, type, main_image)
VALUES ('$new_limit', '$ship_name', '$ship_type', '$ship_main_image')";

              $conn->exec($sql);

              ////update limit for the new galaxy limit
              $sql = $conn->prepare("UPDATE `limits` SET `ships` = '$new_limit' WHERE `id` = '1'");
              $sql->execute();
              echo "<meta http-equiv='refresh' content='0'>";
              }
              else {
                  
              }
              }
              if($result == false){
                  //do same as before, just if the record does not exist but is not same
                            //Update galaxy limit
          $new_limit = $ship_limit + 1;

          $sql = "INSERT INTO ships (id, name, type, main_image)
VALUES ('$new_limit', '$ship_name', '$ship_type', '$ship_main_image')";

          $conn->exec($sql);

          $sql = $conn->prepare("UPDATE `limits` SET `ships` = '$new_limit' WHERE `id` = '1'");
          $sql->execute();
          echo "<meta http-equiv='refresh' content='0'>";
      }
      
}










/////////////////////// SORTING ALGORITHMS ////////////////////////////////////

function sort_table($table , $limit , $id_column , $order_column , $direction){
    global $conn;
    $id = 1;
//    $limit = 7;
    $name = "planet_id";
     $test_array = array();
      $data_array = array();
        while ($id <= $limit){
      //test database unsorted
      $sql = $conn->prepare("SELECT * FROM `$table` WHERE `$id_column` = :id");
              $sql->bindParam('id', $id, PDO::PARAM_INT);
              $sql->execute();

              $result = $sql->fetchObject();
              
              if ($result != false){
              $table_id = $result->$id_column;
              $order_data = $result->$order_column;
              $count = 1;
              //array_push($data_array, $data);
             $test_array += [$table_id => $order_data];
             
              }
              else {}
              
              
              $id++;
     }
     if ($direction == "DESC"){
     arsort($test_array);
     }else{
         asort($test_array);
     }
     print_r($test_array);
     echo "</br>";
     foreach ($test_array as $key => $val) {
    echo "$key = $val\n";
    array_push($data_array, $key);
}
     echo "</br>";
     print_r($data_array);
     return $data_array;
    }
    
    $table = "star_systems";
    $limit = $star_system_limit;
    $id_column = "ID";
    $order_column = "date_logged";
    $direction = "DESC";
    
//    $output = sort_table($table , $limit , $id_column , $order_column , $direction);
//    echo "</br>";
//    echo $output[0];
//    echo "</br>";
//    echo $output[1];
//    echo "</br>";
//    echo $output[2];
//    echo "</br>";
    
