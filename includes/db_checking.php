<?php
require_once('C:\xampp\htdocs\no_mans_sky\includes\db.php');
global $conn;
global $galaxy_limit;
global $star_system_limit;



// <editor-fold defaultstate="collapsed" desc="Add Galaxy">
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
              $sql = "INSERT INTO galaxy (id, name)
VALUES ('$new_limit', '$name')";

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

          $sql = "INSERT INTO galaxy (id, name)
          VALUES ('$new_limit', '$name')";

          $conn->exec($sql);

          $sql = $conn->prepare("UPDATE `limits` SET `galaxy` = '$new_limit' WHERE `id` = '1'");
          $sql->execute();
          echo "<meta http-equiv='refresh' content='0; index.php'>";
      }   
      
}
// </editor-fold>

// <editor-fold defaultstate="collapsed" desc="Add a star system">

//////////////////////// ADDING A STAR SYSTEM  ///////////////////////////////////

function add_star($star_name, $star_type, $star_colour, $galaxy ,  $image){
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
                $sql = "INSERT INTO star_systems (ID, name, galaxy, star_type, star_colour, image)
                        VALUES ('$new_limit', '$star_name', '$galaxy', '$star_type', '$star_colour', '$image[0]')";
    
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
                $sql = "INSERT INTO star_systems (ID, name, galaxy, star_type, star_colour, image)
                        VALUES ('$new_limit', '$star_name', '$galaxy', '$star_type', '$star_colour', '$image[0]')";
    
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
                  
              } echo "<meta http-equiv='refresh' content='0; index.php'>"; 
    }
    
    
}

// </editor-fold>

// <editor-fold defaultstate="collapsed" desc="Add a Planet">
// 
//////////////////////// ADDING A PLANET  ///////////////////////////////////
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
              
              $planet_galaxy = $result->galaxy;
              
              $sql = $conn->prepare("SELECT * FROM `galaxy` WHERE `name` = :id");
              $sql->bindParam('id', $planet_galaxy, PDO::PARAM_INT);
              $sql->execute();
              $result = $sql->fetchObject();
              $number_of_planets = $result->no_planets;
              $number_of_planets = $number_of_planets + 1;
              
              $sql = $conn->prepare("UPDATE `galaxy` SET `no_planets` = '$number_of_planets' WHERE `name` = '$planet_galaxy'");
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
              
              $planet_galaxy = $result->galaxy;
              
              $sql = $conn->prepare("SELECT * FROM `galaxy` WHERE `name` = :id");
              $sql->bindParam('id', $planet_galaxy, PDO::PARAM_INT);
              $sql->execute();
              $result = $sql->fetchObject();
              $number_of_planets = $result->no_planets;
              $number_of_planets = $number_of_planets + 1;
              
              $sql = $conn->prepare("UPDATE `galaxy` SET `no_planets` = '$number_of_planets' WHERE `name` = '$planet_galaxy'");
              $sql->execute();
              
              
              echo "<meta http-equiv='refresh' content='0'>";
                  
              } echo "<meta http-equiv='refresh' content='0; index.php'>"; 
    }
    
}
// </editor-fold>

// <editor-fold defaultstate="collapsed" desc="Add a Moon">
//////////////////////// ADDING A MOON  ///////////////////////////////////
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
              
              $sql = $conn->prepare("SELECT * FROM `star_systems` WHERE `name` = :id");
              $sql->bindParam('id', $moon_star, PDO::PARAM_INT);
              $sql->execute();
              $result = $sql->fetchObject();
              $number_of_moons = $result->no_moons;
              $number_of_moons = $number_of_moons + 1;
              
              $sql = $conn->prepare("UPDATE `star_systems` SET `no_moons` = '$number_of_moons' WHERE `name` = '$moon_star'");
              $sql->execute();
              
              $moon_galaxy = $result->galaxy;
              
              $sql = $conn->prepare("SELECT * FROM `galaxy` WHERE `name` = :id");
              $sql->bindParam('id', $moon_galaxy, PDO::PARAM_INT);
              $sql->execute();
              $result = $sql->fetchObject();
              $number_of_moons = $result->no_moons;
              $number_of_moons = $number_of_moons + 1;
              
              $sql = $conn->prepare("UPDATE `galaxy` SET `no_moons` = '$number_of_moons' WHERE `name` = '$moon_galaxy'");
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
              
              $sql = $conn->prepare("SELECT * FROM `star_systems` WHERE `name` = :id");
              $sql->bindParam('id', $moon_star, PDO::PARAM_INT);
              $sql->execute();
              $result = $sql->fetchObject();
              $number_of_moons = $result->no_moons;
              $number_of_moons = $number_of_moons + 1;
              
              $sql = $conn->prepare("UPDATE `star_systems` SET `no_moons` = '$number_of_moons' WHERE `name` = '$moon_star'");
              $sql->execute();
              
              $moon_galaxy = $result->galaxy;
              
              $sql = $conn->prepare("SELECT * FROM `galaxy` WHERE `name` = :id");
              $sql->bindParam('id', $moon_galaxy, PDO::PARAM_INT);
              $sql->execute();
              $result = $sql->fetchObject();
              $number_of_moons = $result->no_moons;
              $number_of_moons = $number_of_moons + 1;
              
              $sql = $conn->prepare("UPDATE `galaxy` SET `no_moons` = '$number_of_moons' WHERE `name` = '$moon_galaxy'");
              $sql->execute();
              
              
              echo "<meta http-equiv='refresh' content='0'>";
                  
              } echo "<meta http-equiv='refresh' content='0; index.php'>"; 
    }
    
    
    
    
}
// </editor-fold>

// <editor-fold defaultstate="collapsed" desc="Add a Creature">

////////////////////////// ADD CREATURE  //////////////////////////////////////

function add_creature($creature_name , $creature_planet , $creature_life_type , $creature_size , $creature_diet
        , $creature_rating , $creature_main_image, $moon_or_planet, $creature_star){
    
    global $conn;
    global $planet_limit;
    global $moon_limit;
    global $creature_limit;
    
    if($moon_or_planet == "planets"){
        $parent_type = "Planet";
    } else{
        $parent_type = "Moon";
    }
    
    
    
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
                $sql = "INSERT INTO creatures (id, main_image, name, life_type, size, rating, parent_planet, parent_type, diet)
                        VALUES ('$new_limit', '$creature_main_image', '$creature_name', '$creature_life_type', '$creature_size', '$creature_rating', '$creature_planet', '$parent_type', '$creature_diet')";
    
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
              
              $sql = $conn->prepare("SELECT * FROM `star_systems` WHERE `name` = :id");
              $sql->bindParam('id', $creature_star, PDO::PARAM_INT);
              $sql->execute();
              $result = $sql->fetchObject();
              $number_of_creatures = $result->no_creatures;
              $number_of_creatures = $number_of_creatures + 1;
              
              $sql = $conn->prepare("UPDATE `star_systems` SET `no_creatures` = '$number_of_creatures' WHERE `name` = '$creature_star'");
              $sql->execute();
              
              $creature_galaxy = $result->galaxy;
              
              $sql = $conn->prepare("SELECT * FROM `galaxy` WHERE `name` = :id");
              $sql->bindParam('id', $creature_galaxy, PDO::PARAM_INT);
              $sql->execute();
              $result = $sql->fetchObject();
              $number_of_creatures = $result->no_creatures;
              $number_of_creatures = $number_of_creatures + 1;
              
              $sql = $conn->prepare("UPDATE `galaxy` SET `no_creatures` = '$number_of_creatures' WHERE `name` = '$creature_galaxy'");
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
                $sql = "INSERT INTO creatures (id, main_image, name, life_type, size, rating, parent_planet, parent_type, diet)
                        VALUES ('$new_limit', '$creature_main_image', '$creature_name', '$creature_life_type', '$creature_size', '$creature_rating', '$creature_planet', '$parent_type', '$creature_diet')";
    
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
              
              $sql = $conn->prepare("SELECT * FROM `star_systems` WHERE `name` = :id");
              $sql->bindParam('id', $creature_star, PDO::PARAM_INT);
              $sql->execute();
              $result = $sql->fetchObject();
              $number_of_creatures = $result->no_creatures;
              $number_of_creatures = $number_of_creatures + 1;
              
              $sql = $conn->prepare("UPDATE `star_systems` SET `no_creatures` = '$number_of_creatures' WHERE `name` = '$creature_star'");
              $sql->execute();
              
              $creature_galaxy = $result->galaxy;
              
              $sql = $conn->prepare("SELECT * FROM `galaxy` WHERE `name` = :id");
              $sql->bindParam('id', $creature_galaxy, PDO::PARAM_INT);
              $sql->execute();
              $result = $sql->fetchObject();
              $number_of_creatures = $result->no_creatures;
              $number_of_creatures = $number_of_creatures + 1;
              
              $sql = $conn->prepare("UPDATE `galaxy` SET `no_creatures` = '$number_of_creatures' WHERE `name` = '$creature_galaxy'");
              $sql->execute();
              
              
              echo "<meta http-equiv='refresh' content='0'>";
                  
    } echo "<meta http-equiv='refresh' content='0; index.php'>"; 
        }}
        // </editor-fold>

// <editor-fold defaultstate="collapsed" desc="Add a Flora">
//////////////////////// ADDING A FLORA  ///////////////////////////////////

function add_flora($flora_name , $flora_planet , $flora_size , $flora_diet
        , $flora_rating , $flora_main_image, $moon_or_planet, $flora_star){
    
    global $conn;
    global $planet_limit;
    global $moon_limit;
    global $flora_limit;
    
    if($moon_or_planet == "planets"){
        $parent_type = "Planet";
    } else{
        $parent_type = "Moon";
    }
    
    
    
    if($flora_name != NULL){
        
        
    
    $sql = $conn->prepare("SELECT * FROM `flora` WHERE `id` = :id");
              $sql->bindParam('id', $flora_limit, PDO::PARAM_INT);
              $sql->execute();

              $result = $sql->fetchObject();
              //check the result is real
              if($result != false){
                  
              $sql->execute();
              
              $last_name = $result->name;
              
              if ($last_name != $flora_name){
                  //Add to database
                  //Update star limit
                  $new_limit = $flora_limit + 1;
              //insert the record into the galaxy table
                $sql = "INSERT INTO flora (id, name, diet, size, rating, parent_planet, parent_type, main_image)
                        VALUES ('$new_limit', '$flora_name', '$flora_diet', '$flora_size', '$flora_rating', '$flora_planet', '$parent_type', '$flora_main_image')";
    
                $conn->exec($sql);
                
                $sql = $conn->prepare("UPDATE `limits` SET `flora` = '$new_limit' WHERE `id` = '1'");
              $sql->execute();
              
              $sql = $conn->prepare("SELECT * FROM `$moon_or_planet` WHERE `name` = :id");
              $sql->bindParam('id', $flora_planet, PDO::PARAM_INT);
              $sql->execute();
              $result = $sql->fetchObject();
              $number_of_flora = $result->no_flora;
              $number_of_flora = $number_of_flora + 1;
              
              $sql = $conn->prepare("UPDATE `$moon_or_planet` SET `no_flora` = '$number_of_flora' WHERE `name` = '$flora_planet'");
              $sql->execute();
              
              $sql = $conn->prepare("SELECT * FROM `star_systems` WHERE `name` = :id");
              $sql->bindParam('id', $flora_star, PDO::PARAM_INT);
              $sql->execute();
              $result = $sql->fetchObject();
              $number_of_flora = $result->no_flora;
              $number_of_flora = $number_of_flora + 1;
              
              $sql = $conn->prepare("UPDATE `star_systems` SET `no_flora` = '$number_of_flora' WHERE `name` = '$flora_star'");
              $sql->execute();
              
              $flora_galaxy = $result->galaxy;
              
              $sql = $conn->prepare("SELECT * FROM `galaxy` WHERE `name` = :id");
              $sql->bindParam('id', $flora_galaxy, PDO::PARAM_INT);
              $sql->execute();
              $result = $sql->fetchObject();
              $number_of_flora = $result->no_flora;
              $number_of_flora = $number_of_flora + 1;
              
              $sql = $conn->prepare("UPDATE `galaxy` SET `no_flora` = '$number_of_flora' WHERE `name` = '$flora_galaxy'");
              $sql->execute();
              
              
              echo "<meta http-equiv='refresh' content='0'>";
              
              }
              else{ //Dont add to database)
                  }
              }
              
              if($result == false && $planet_limit != 0){
                  //add to database
                  
                  //Update star limit
                  $new_limit = $flora_limit + 1;
              //insert the record into the galaxy table
                $sql = "INSERT INTO flora (id, name, diet, size, rating, parent_planet, parent_type, main_image)
                        VALUES ('$new_limit', '$flora_name', '$flora_diet', '$flora_size', '$flora_rating', '$flora_planet', '$parent_type', '$flora_main_image')";
    
                $conn->exec($sql);
                
                $sql = $conn->prepare("UPDATE `limits` SET `flora` = '$new_limit' WHERE `id` = '1'");
              $sql->execute();
              
              $sql = $conn->prepare("SELECT * FROM `$moon_or_planet` WHERE `name` = :id");
              $sql->bindParam('id', $flora_planet, PDO::PARAM_INT);
              $sql->execute();
              $result = $sql->fetchObject();
              $number_of_flora = $result->no_flora;
              $number_of_flora = $number_of_flora + 1;
              
              $sql = $conn->prepare("UPDATE `$moon_or_planet` SET `no_flora` = '$number_of_flora' WHERE `name` = '$flora_planet'");
              $sql->execute();
              
              $sql = $conn->prepare("SELECT * FROM `star_systems` WHERE `name` = :id");
              $sql->bindParam('id', $flora_star, PDO::PARAM_INT);
              $sql->execute();
              $result = $sql->fetchObject();
              $number_of_flora = $result->no_flora;
              $number_of_flora = $number_of_flora + 1;
              
              $sql = $conn->prepare("UPDATE `star_systems` SET `no_flora` = '$number_of_flora' WHERE `name` = '$flora_star'");
              $sql->execute();
              
              $flora_galaxy = $result->galaxy;
              
              $sql = $conn->prepare("SELECT * FROM `galaxy` WHERE `name` = :id");
              $sql->bindParam('id', $flora_galaxy, PDO::PARAM_INT);
              $sql->execute();
              $result = $sql->fetchObject();
              $number_of_flora = $result->no_flora;
              $number_of_flora = $number_of_flora + 1;
              
              $sql = $conn->prepare("UPDATE `galaxy` SET `no_flora` = '$number_of_flora' WHERE `name` = '$flora_galaxy'");
              $sql->execute();
              
              
              
                  
    } echo "<meta http-equiv='refresh' content='0; index.php'>"; 
        }}
        // </editor-fold>
           
// <editor-fold defaultstate="collapsed" desc="Add a Ship">
        
/////////////////////////////  ADD SHIP /////////////////////////////////////////////////////

function add_ship($ship_name, $ship_type, $ship_main_image){
    
    global $conn;
    global $planet_limit;
    global $galaxy_limit;
    global $ship_limit;
    
    
    if($ship_name != NULL){
    
    $sql = $conn->prepare("SELECT * FROM `ships` WHERE `id` = :id");
              $sql->bindParam('id', $moon_limit, PDO::PARAM_INT);
              $sql->execute();

              $result = $sql->fetchObject();
              //check the result is real
              if($result != false){
              
              $last_name = $result->name;
              
              if ($last_name != $moon_name){
                  //Add to database
                  //Update star limit
                  $new_limit = $ship_limit + 1;
              //insert the record into the galaxy table
                $sql = "INSERT INTO ships (id, name, type, main_image)
                        VALUES ('$new_limit', '$ship_name', '$ship_type', '$ship_main_image')";
    
                $conn->exec($sql);
                
                $sql = $conn->prepare("UPDATE `limits` SET `ships` = '$new_limit' WHERE `id` = '1'");
              $sql->execute();

              echo "<meta http-equiv='refresh' content='0'>";
              
              }
              else{ //Dont add to database)
                  }
              }
              
              if($result == false && $galaxy_limit != 0){
                  //add to database
                  
                  //Update star limit
                  $new_limit = $ship_limit + 1;
              //insert the record into the galaxy table
                $sql = "INSERT INTO ships (id, name, type, main_image)
                        VALUES ('$new_limit', '$ship_name', '$ship_type', '$ship_main_image')";
    
                $conn->exec($sql);
                
                $sql = $conn->prepare("UPDATE `limits` SET `ships` = '$new_limit' WHERE `id` = '1'");
              $sql->execute();
              
              
              
              
                  
              } echo "<meta http-equiv='refresh' content='0; index.php'>"; 
}}

// </editor-fold>

// <editor-fold defaultstate="collapsed" desc="Add Media">
        
/////////////////////////////  ADD Media /////////////////////////////////////////////////////

function add_media($media_name, $media_type, $media_file){
    
    global $conn;
    global $media_limit;
    
    
    
    
    
    
    if($media_name != NULL){
    
    $sql = $conn->prepare("SELECT * FROM `media` WHERE `id` = :id");
              $sql->bindParam('id', $media_limit, PDO::PARAM_INT);
              $sql->execute();

              $result = $sql->fetchObject();
              //check the result is real
              if($result != false){
              
              $last_name = $result->name;
              
              if ($last_name != $media_name){
                  //Add to database
                  //Update star limit
                  
              //insert the record into the galaxy table
                  
                  $new_limit = $media_limit + 1;
                $sql = "INSERT INTO media (name, type, file)
                        VALUES ('$media_name', '$media_type', '$media_file')";
    
                $conn->exec($sql);
                
                $sql = $conn->prepare("UPDATE `limits` SET `media` = '$new_limit' WHERE `id` = '1'");
              $sql->execute();

              
              
              }
              else{ //Dont add to database)
                  }
              }
              
              if($result == false){
                  //add to database
                  
                  //Update star limit
                  $new_limit = $media_limit + 1;
              //insert the record into the galaxy table
                $sql = "INSERT INTO media (name, type, file)
                        VALUES ('$media_name', '$media_type', '$media_file')";
    
                $conn->exec($sql);
                
                $sql = $conn->prepare("UPDATE `limits` SET `media` = '$new_limit' WHERE `id` = '1'");
              $sql->execute();
              
              
              
              
              
              
                  
              }

           echo "<meta http-equiv='refresh' content='0; index.php'>";   
              }
              
              }

// </editor-fold>
    
// <editor-fold defaultstate="collapsed" desc="Sort Table">
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
//     print_r($test_array);
//     echo "</br>";
     foreach ($test_array as $key => $val) {
//    echo "$key = $val\n";
    array_push($data_array, $key);
}
//     echo "</br>";
//     print_r($data_array);
     return $data_array;
    }
    
    function add_many(){
        global $conn;
        $id = 400;
        $limit = 1000;
        
        while ($id < $limit){
        
        $name = "Name " + $id;
        $attr_one = "Attr " + $id;
        $attr_two = "Attr " + $id;
        
        $sql = "INSERT INTO testing (name, attr_one, attr_two)
                        VALUES ('$name', '$attr_one', '$attr_two')";
    
                $conn->exec($sql);
                $id++;
        }
        
        
    }
    
    
    // </editor-fold>
    
    function debug_to_console( $data ) {

    if ( is_array( $data ) )
        $output = "<script>alert( 'Debug Objects: " . implode( ',', $data) . "' );</script>";
    else
        $output = "<script>alert( 'Debug Objects: " . $data . "' );</script>";

    echo $output;
}

function get_stat($stat_number){
    global $conn;
    global $galaxy_limit;
    global $star_system_limit;
    global $planet_limit;
    global $moon_limit;
    global $creature_limit;
    global $flora_limit;
    global $ship_limit;
    
    $total_discoveries = $galaxy_limit + $star_system_limit + $planet_limit + $moon_limit + $creature_limit + $flora_limit + $ship_limit;
    
    $stat_array = array();
    $stat_name = "nothing found";
    $stat_value = "nothing found";
    switch($stat_number){
        
        case "1": $stat_name = "Total Discoveries"; $stat_value = $total_discoveries; break;
        case "2": $stat_name = " "; $stat_value = " "; break;
        case "3": $stat_name = "Galaxies"; $stat_value = $galaxy_limit; break;
        case "4": $stat_name = "Star Systems"; $stat_value = $star_system_limit; break;
        case "5": $stat_name = "Celestial Bodies"; $stat_value = $planet_limit + $moon_limit; break;
        case "6": $stat_name = "Planets"; $stat_value = $planet_limit; break;
        case "7": $stat_name = "Moons"; $stat_value = $moon_limit; break;
        case "8": $stat_name = "Creatures"; $stat_value = $creature_limit; break;
        case "9": $stat_name = "Flora"; $stat_value = $flora_limit; break;
        case "10": $stat_name = "Ships"; $stat_value = $ship_limit; break;
        
        
        
        default:
            echo "Stat not found";
    }
    
    array_push($stat_array, $stat_name, $stat_value);
    
    return $stat_array;
}

function get_progress($stat_number){
    global $conn;
    global $galaxy_limit;
    global $star_system_limit;
    global $planet_limit;
    global $moon_limit;
    global $creature_limit;
    global $flora_limit;
    global $ship_limit;
    
    $total_worlds = $planet_limit + $moon_limit;
    
    global $planet_info_array;
    
    
    $total_discoveries = $galaxy_limit + $star_system_limit + $planet_limit + $moon_limit + $creature_limit + $flora_limit + $ship_limit;
    
    $stat_array = array();
    $stat_name = "nothing found";
    $stat_value = 0;
    $stat_goal = 0;
    switch($stat_number){
        
        case "1": $stat_name = "Discover 50 Worlds"; $stat_value = $total_worlds; $stat_goal = 50; break;
        case "2": $stat_name = "Discover 500 Worlds"; $stat_value = $total_worlds; $stat_goal = 500; break;
        case "3": $stat_name = "Discover 1000 Worlds"; $stat_value = $total_worlds; $stat_goal = 1000; break;
        case "4": $stat_name = "break"; $stat_value = 10; $stat_goal = 100; break;
        case "5": $stat_name = "break"; $stat_value = 10; $stat_goal = 100; break;
        case "6": $stat_name = "Discover 30 Creatures"; $stat_value = $creature_limit; $stat_goal = 30; break;
        case "7": $stat_name = "Discover 300 Creatures"; $stat_value = $creature_limit; $stat_goal = 300; break;
        case "8": $stat_name = "Discover 1000 Creatures"; $stat_value = $creature_limit; $stat_goal = 1000; break;
        case "9": $stat_name = "break"; $stat_value = 10; $stat_goal = 100; break;
        case "10": $stat_name = "break"; $stat_value = 10; $stat_goal = 100; break;
        case "11": $stat_name = "Discover 20 Flora"; $stat_value = $flora_limit; $stat_goal = 20; break;
        case "12": $stat_name = "Discover 200 Flora"; $stat_value = $flora_limit; $stat_goal = 200; break;
        case "13": $stat_name = "Discover 1000 Flora"; $stat_value = $flora_limit; $stat_goal = 1000; break;
        case "14": $stat_name = "break"; $stat_value = 10; $stat_goal = 100; break;
        case "15": $stat_name = "break"; $stat_value = 10; $stat_goal = 100; break;
        case "16": $stat_name = "Discover 2 Galaxies"; $stat_value = $galaxy_limit; $stat_goal = 2; break;
        case "17": $stat_name = "Discover 20 Star Systems"; $stat_value = $star_system_limit; $stat_goal = 20; break;
        case "18": $stat_name = "Issue 10 Ships"; $stat_value = $ship_limit; $stat_goal = 10; break;
        case "19": $stat_name = "break"; $stat_value = 10; $stat_goal = 100; break;
        case "20": $stat_name = "break"; $stat_value = 10; $stat_goal = 100; break;
        case "21": $stat_name = "Discover 20 Baron Worlds"; $stat_value = $planet_info_array[4]; $stat_goal = 20; break;
        case "22": $stat_name = "Discover 20 Worlds with Complex Life"; $stat_value = $planet_info_array[3]; $stat_goal = 20; break;
        case "23": $stat_name = "break"; $stat_value = 10; $stat_goal = 100; break;
        case "23": $stat_name = "break"; $stat_value = 10; $stat_goal = 100; break;
        case "24": $stat_name = "Discover 20 Toxic Atmospheres"; $stat_value = $planet_info_array[0]; $stat_goal = 20; break;
        case "25": $stat_name = "Discover 20 Extreme Heat Atmospheres"; $stat_value = $planet_info_array[1]; $stat_goal = 20; break;
        case "26": $stat_name = "Discover 20 Extreme Cold Atmospheres"; $stat_value = $planet_info_array[2]; $stat_goal = 20; break;
        case "27": $stat_name = "break"; $stat_value = 10; $stat_goal = 100; break;
        case "28": $stat_name = "break"; $stat_value = 10; $stat_goal = 100; break;
        case "29": $stat_name = "Discover 20 Huge Worlds"; $stat_value = $planet_info_array[5]; $stat_goal = 20; break;
        case "30": $stat_name = "Discover 20 Tiny Worlds"; $stat_value = $planet_info_array[6]; $stat_goal = 20; break;
        case "31": $stat_name = "Discover 5 Worlds Rated 10/10"; $stat_value = $planet_info_array[7]; $stat_goal = 5; break;
        
        
        
        default:
            echo "Stat not found";
    }
    
    array_push($stat_array, $stat_name, $stat_value, $stat_goal);
    
    return $stat_array;
}




// debug_to_console( "Variable is: $variable" );
    
    
