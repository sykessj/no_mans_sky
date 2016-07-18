<?php

  
  require_once('C:\xampp\htdocs\no_mans_sky\includes\db.php');
  require_once('C:\xampp\htdocs\no_mans_sky\includes\db_checking.php');
  
  // <editor-fold defaultstate="collapsed" desc="Delete Galaxy">
  function delete_galaxy($database , $name){
      global $conn;
      global $galaxy_limit;
      global $star_system_limit;
      
      
      
      
      
      $id_type = "Id";
      $name_column = "name";
      
//      rename("C:/xampp/htdocs/no_mans_sky/images/creatures/test", 
//              "C:/xampp/htdocs/no_mans_sky/images/creatures/this_has_worked");
      
                  //Get the info of the star system
      $sql = $conn->prepare("SELECT * FROM `$database` WHERE `$name_column` = :id");
              $sql->bindParam('id', $name, PDO::PARAM_INT);
              $sql->execute();

              $result = $sql->fetchObject();
              //check the result is real
              if($result != false){
                  
              //get the id of the item
              $id = $result->Id;
              }
              
             
              ///////////////////////////////////////////////////////////////////////////////////////////////
              //Delete each Star system that is included in the galaxy
              //Deleting star systems will also delete all assosiated items
              $star_system_id = 0;
             
              while($star_system_id <= $star_system_limit){
              $sql = $conn->prepare("SELECT * FROM `star_systems` WHERE `galaxy` = :id");
              $sql->bindParam('id', $name, PDO::PARAM_INT);
              $sql->execute();
              $result = $sql->fetchObject();
              
              if($result != false){
                  
                  
                  
                  
                  //get the current id for the item
                  $star_system_name = $result->name;
                  
                  $star_system_database = "star_systems";
                  
                  
                  delete_star($star_system_database, $star_system_name);
              } $star_system_id++;
                      
  }

              
              //Galaxy
              
              
  //Deleting the galaxy
  
  $sql = $conn->prepare("DELETE FROM `$database` WHERE `$name_column` = '$name'");
              $sql->execute();
              //add 1 to the id to get the next item
              
              $id = $id + 1;
              
              //While loop that to take 1 from the id until it reaches the current limit
              while($id <= $galaxy_limit){
                  //Get the item info
                  $sql = $conn->prepare("SELECT * FROM `$database` WHERE `$id_type` = :id");
              $sql->bindParam('id', $id, PDO::PARAM_INT);
              $sql->execute();
              $result = $sql->fetchObject();
              //check the result is real
              if($result != false){
                  
                  //get the current id for the item
                  $current_id = $result->Id;
                  
                  
                  
                  //Make the new id to be 1 less than the previous id
                  $new_id = $current_id - 1;
                  
                  //uodate the database: set the id to be the new id where the id is the current id
                  $sql = $conn->prepare("UPDATE `$database` SET `$id_type` = '$new_id' WHERE `$id_type` = '$current_id'");
              $sql->execute();
                  
              }
              //Add 1 to the id and repeat the process
              $id++;
              
              }
              
               // Create the new limit for the database
              $new_limit = $galaxy_limit - 1;
              //Update the limit 
              $sql = $conn->prepare("UPDATE `limits` SET `$database` = '$new_limit' WHERE `id` = '1'");
              $sql->execute();
              
              
              //Refresh to the index page
              echo "<meta http-equiv='refresh' content='0; index.php'>";
  }
   // </editor-fold>
  
    // <editor-fold defaultstate="collapsed" desc="Edit Galaxy">
  function edit_galaxy($name, $object_id){
      global $conn;
      global $star_system_limit;
      
      
      
      
      
      $sql = $conn->prepare("SELECT * FROM `galaxy` WHERE `id` = :id");
              $sql->bindParam('id', $object_id, PDO::PARAM_INT);
              $sql->execute();

              $result = $sql->fetchObject();
              //check the result is real
              if($result != false){
                  
                  $old_name = $result->name;
                  
                  
                  
                  
              }
      
      $sql = $conn->prepare("UPDATE `galaxy` SET `name` = '$name' WHERE `Id` = '$object_id'");
              $sql->execute();
              
              if($name != $old_name){
//                  
                  //The name has been changed
                  
                  //Change Planets parent system
                  //Update Planets
                  $star_system_id = 0;
                  while($star_system_id <= $star_system_limit){
              $sql = $conn->prepare("SELECT * FROM `star_systems` WHERE `galaxy` = :id");
              $sql->bindParam('id', $old_name, PDO::PARAM_INT);
              $sql->execute();
              $result = $sql->fetchObject();
              
              if($result != false){
                  
                  
                  //get the current id for the item
                  $star_system_name = $result->name;
                  
              
              
              $sql = $conn->prepare("UPDATE `star_systems` SET `galaxy` = '$name' WHERE `name` = '$star_system_name'");
              $sql->execute();
              } $star_system_id++;
  }
  
  
      

      
  }}
  // </editor-fold>
  
  
  // <editor-fold defaultstate="collapsed" desc="Delete Star System">
  function delete_star($database , $name){
      
      
      global $conn;
      $limit_id = 1;
      $sql = $conn->prepare("SELECT * FROM `limits` WHERE `id` = :id");
              $sql->bindParam('id', $limit_id, PDO::PARAM_INT);
              $sql->execute();

              $result = $sql->fetchObject();
              
              if($result != false){
              
              $planet_limit = $result->planets;
              $star_system_limit = $result->star_systems;
              
              }
      
      
      
      
      $id_type = "ID";
      $name_column = "name";
      
//      rename("C:/xampp/htdocs/no_mans_sky/images/creatures/test", 
//              "C:/xampp/htdocs/no_mans_sky/images/creatures/this_has_worked");
      
                  //Get the info of the star system
      $sql = $conn->prepare("SELECT * FROM `$database` WHERE `$name_column` = :id");
              $sql->bindParam('id', $name, PDO::PARAM_INT);
              $sql->execute();

              $result = $sql->fetchObject();
              //check the result is real
              if($result != false){
                  
              //get the id of the item
              $id = $result->ID;
              
              //get the parent planet for the flora
              $galaxy = $result->galaxy; 
              
              
              }
              
             
              ///////////////////////////////////////////////////////////////////////////////////////////////
              //Delete each planet that is included in the star system
              //Deleting planets will also delete all assosiated items
              $planet_id = 0;
             
              while($planet_id <= $planet_limit){
              $sql = $conn->prepare("SELECT * FROM `planets` WHERE `star_system` = :id");
              $sql->bindParam('id', $name, PDO::PARAM_INT);
              $sql->execute();
              $result = $sql->fetchObject();
              
              if($result != false){
                  
                  
                  
                  
                  //get the current id for the item
                  $planet_name = $result->name;
                  
                  $planet_database = "planets";
                  
                  
                  delete_planet($planet_database, $planet_name);
              } $planet_id++;
                      
  }

              
              //Galaxy
              
              $sql = $conn->prepare("SELECT * FROM `galaxy` WHERE `name` = :id");
              $sql->bindParam('id', $galaxy, PDO::PARAM_INT);
              $sql->execute();

              $result = $sql->fetchObject();
              //check the result is real
              if($result != false){
                  
              //get the id of the item
              $no_star_systems = $result->no_star_systems;
              $no_star_systems = $no_star_systems - 1;
              
              $sql = $conn->prepare("UPDATE `galaxy` SET `no_star_systems` = '$no_star_systems' WHERE `name` = '$galaxy'");
              $sql->execute();
              }
              
              
              
              
              
              
      
      
  //Deleting the star system
  
  $sql = $conn->prepare("DELETE FROM `$database` WHERE `$name_column` = '$name'");
              $sql->execute();
              //add 1 to the id to get the next item
              
              $id = $id + 1;
              
              //While loop that to take 1 from the id until it reaches the current limit
              while($id <= $star_system_limit){
                  //Get the item info
                  $sql = $conn->prepare("SELECT * FROM `$database` WHERE `$id_type` = :id");
              $sql->bindParam('id', $id, PDO::PARAM_INT);
              $sql->execute();
              $result = $sql->fetchObject();
              //check the result is real
              if($result != false){
                  
                  //get the current id for the item
                  $current_id = $result->ID;
                  
                  
                  
                  //Make the new id to be 1 less than the previous id
                  $new_id = $current_id - 1;
                  
                  //uodate the database: set the id to be the new id where the id is the current id
                  $sql = $conn->prepare("UPDATE `$database` SET `$id_type` = '$new_id' WHERE `$id_type` = '$current_id'");
              $sql->execute();
                  
              }
              //Add 1 to the id and repeat the process
              $id++;
              
              }
              
               // Create the new limit for the database
              $new_limit = $star_system_limit - 1;
              //Update the limit 
              $sql = $conn->prepare("UPDATE `limits` SET `$database` = '$new_limit' WHERE `id` = '1'");
              $sql->execute();
              
              
              //Refresh to the index page
              echo "<meta http-equiv='refresh' content='0; index.php'>";
  }
   // </editor-fold>
  
  // <editor-fold defaultstate="collapsed" desc="Edit Star System">
  function edit_star_system($name, $type, $colour, $image, $object_id){
      global $conn;
      global $planet_limit;
      
      
      
      $sql = $conn->prepare("SELECT * FROM `star_systems` WHERE `id` = :id");
              $sql->bindParam('id', $object_id, PDO::PARAM_INT);
              $sql->execute();

              $result = $sql->fetchObject();
              //check the result is real
              if($result != false){
                  $old_name = $result->name;
                  
                  
                  
              }
      
      $sql = $conn->prepare("UPDATE `star_systems` SET `name` = '$name', `star_type` = '$type', `star_colour` = '$colour', `image` = '$image' WHERE `ID` = '$object_id'");
              $sql->execute();
              
              if($name != $old_name){
//                  
                  //The name has been changed
                  
                  //Change Planets parent system
                  //Update Planets
                  $planet_id = 0;
                  while($planet_id <= $planet_limit){
              $sql = $conn->prepare("SELECT * FROM `planets` WHERE `star_system` = :id");
              $sql->bindParam('id', $old_name, PDO::PARAM_INT);
              $sql->execute();
              $result = $sql->fetchObject();
              
              if($result != false){
                  
                  
                  //get the current id for the item
                  $planet_name = $result->name;
                  
              
              
              $sql = $conn->prepare("UPDATE `planets` SET `star_system` = '$name' WHERE `name` = '$planet_name'");
              $sql->execute();
              } $planet_id++;
  }
  
  $moon_id = 0;
                  while($moon_id <= $moon_limit){
              $sql = $conn->prepare("SELECT * FROM `moons` WHERE `star_system` = :id");
              $sql->bindParam('id', $old_name, PDO::PARAM_INT);
              $sql->execute();
              $result = $sql->fetchObject();
              
              if($result != false){
                  
                  
                  //get the current id for the item
                  $moon_name = $result->name;
                  
              
              
              $sql = $conn->prepare("UPDATE `moons` SET `star_system` = '$name' WHERE `name` = '$moon_name'");
              $sql->execute();
              } $moon_id++;
  }
      

      
  }}
  // </editor-fold>
  
  
  
  // <editor-fold defaultstate="collapsed" desc="Delete Planet">
  function delete_planet($database , $name){
      global $conn;
      $limit_id = 1;
      $sql = $conn->prepare("SELECT * FROM `limits` WHERE `id` = :id");
              $sql->bindParam('id', $limit_id, PDO::PARAM_INT);
              $sql->execute();

              $result = $sql->fetchObject();
              
              if($result != false){
              
              $flora_limit = $result->flora;
              $planet_limit = $result->planets;
              $moon_limit = $result->moons;
              $creature_limit = $result->creatures;
              }
      
      
      
      
      $id_type = "id";
      $name_column = "name";
      
//      rename("C:/xampp/htdocs/no_mans_sky/images/creatures/test", 
//              "C:/xampp/htdocs/no_mans_sky/images/creatures/this_has_worked");
      
                  //Get the info of the item
      $sql = $conn->prepare("SELECT * FROM `$database` WHERE `$name_column` = :id");
              $sql->bindParam('id', $name, PDO::PARAM_INT);
              $sql->execute();

              $result = $sql->fetchObject();
              //check the result is real
              if($result != false){
                  
              //get the id of the item
              $id = $result->id;
              
              //get the parent planet for the flora
              $star_system = $result->star_system; 
              
              
              }
              
              
              ///////////////////////////////////////////////////////////////////////////////////////////////
              //delete moons along with flora and creatures.
              $moon_id = 0;
             
              while($moon_id <= $moon_limit){
              $sql = $conn->prepare("SELECT * FROM `moons` WHERE `parent_planet` = :id");
              $sql->bindParam('id', $name, PDO::PARAM_INT);
              $sql->execute();
              $result = $sql->fetchObject();
              
              if($result != false){
                  
                  
                  
                  
                  //get the current id for the item
                  $moon_name = $result->name;
                  
                  $moon_database = "moons";
                  
                  
                  delete_moon($moon_database, $moon_name);
              } $moon_id++;
                      
  }

              
              
              // //Star systems
              //Galaxy
              
              
              
              
              
              
              
              //Update Star System
      
      $sql = $conn->prepare("SELECT * FROM `star_systems` WHERE `name` = :id");
              $sql->bindParam('id', $star_system, PDO::PARAM_INT);
              $sql->execute();
              $result = $sql->fetchObject();
              
              if($result != false){
                  
                  
                  //get the current id for the item
                  $galaxy = $result->galaxy;
                  
                  
                  $no_planets = $result->no_planets;
                  $no_planets = $no_planets - 1;
              
              
              $sql = $conn->prepare("UPDATE `star_systems` SET `no_planets` = '$no_planets' WHERE `name` = '$star_system'");
              $sql->execute();
      }
              
              //Update Galaxy
      
      $sql = $conn->prepare("SELECT * FROM `galaxy` WHERE `name` = :id");
              $sql->bindParam('id', $galaxy, PDO::PARAM_INT);
              $sql->execute();
              $result = $sql->fetchObject();
              
              if($result != false){
                  
                  
                  //get the current id for the item
                  $no_planets = $result->no_planets;
                  $no_planets = $no_planets - 1;
              
              
              $sql = $conn->prepare("UPDATE `galaxy` SET `no_planets` = '$no_planets' WHERE `name` = '$galaxy'");
              $sql->execute();}
              
              //Find creatures with parent planet
              
              $creature_id = 0;
              
              while($creature_id <= $creature_limit){
              $sql = $conn->prepare("SELECT * FROM `creatures` WHERE `parent_planet` = :id");
              $sql->bindParam('id', $name, PDO::PARAM_INT);
              $sql->execute();
              $result = $sql->fetchObject();
              
              if($result != false){
                  
                  
                  //get the current id for the item
                  $creature_name = $result->name;
                  
              
              
              delete_creature("creatures", $creature_name);
              } $creature_id++;
  }
              //Find flora with parent planet
              
              $flora_id = 0;
              
              while($flora_id <= $flora_limit){
              $sql = $conn->prepare("SELECT * FROM `flora` WHERE `parent_planet` = :id");
              $sql->bindParam('id', $name, PDO::PARAM_INT);
              $sql->execute();
              $result = $sql->fetchObject();
              
              if($result != false){
                  
                  
                  //get the current id for the item
                  $flora_name = $result->name;
                  
              
              
              delete_flora("flora", $flora_name);
              } $flora_id++;
  }
  
  $sql = $conn->prepare("DELETE FROM `$database` WHERE `$name_column` = '$name'");
              $sql->execute();
              //add 1 to the id to get the next item
              $id = $id + 1;
              //While loop that to take 1 from the id until it reaches the current limit
              while($id <= $planet_limit){
                  //Get the item info
                  $sql = $conn->prepare("SELECT * FROM `$database` WHERE `$id_type` = :id");
              $sql->bindParam('id', $id, PDO::PARAM_INT);
              $sql->execute();
              $result = $sql->fetchObject();
              //check the result is real
              if($result != false){
                  //get the current id for the item
                  $current_id = $result->id;
                  
                  
                  
                  //Make the new id to be 1 less than the previous id
                  $new_id = $current_id - 1;
                  
                  //uodate the database: set the id to be the new id where the id is the current id
                  $sql = $conn->prepare("UPDATE `$database` SET `$id_type` = '$new_id' WHERE `$id_type` = '$current_id'");
              $sql->execute();
                  
              }
              //Add 1 to the id and repeat the process
              $id++;
              
              }
              
              // Create the new limit for the database
              
              $new_limit = $planet_limit - 1;
              
              //Update the limit 
              $sql = $conn->prepare("UPDATE `limits` SET `$database` = '$new_limit' WHERE `id` = '1'");
              $sql->execute();
              
              
              
              
              //Refresh to the index page
              echo "<meta http-equiv='refresh' content='0; index.php'>";
  }
   // </editor-fold>
  
  // <editor-fold defaultstate="collapsed" desc="Edit Planet">
  function edit_planet($name, $enviroment, $climate, $life, $size, $sentinals, $minerals, $rating, $image, $extra_image, $extra_image2, $object_id){
      global $conn;
      global $moon_limit;
      global $creature_limit;
      global $flora_limit;
      
      
      $sql = $conn->prepare("SELECT * FROM `planets` WHERE `id` = :id");
              $sql->bindParam('id', $object_id, PDO::PARAM_INT);
              $sql->execute();

              $result = $sql->fetchObject();
              //check the result is real
              if($result != false){
                  $old_name = $result->name;
                  
                  
                  
              }
      
      $sql = $conn->prepare("UPDATE `planets` SET `name` = '$name', `enviroment` = '$enviroment', `climate` = '$climate', `life_type` = '$life', `size` = '$size', `rating` = '$rating', `minerals` = '$minerals', `main_image` = '$image', `extra_image` = '$extra_image', `extra_image2` = '$extra_image2' WHERE `id` = '$object_id'");
              $sql->execute();
              
              if($name != $old_name){
//                 
                  //The name has been changed
                  
                  //Change the name of the folder containing images
                  rename("C:/xampp/htdocs/no_mans_sky/images/planets/$old_name", 
              "C:/xampp/htdocs/no_mans_sky/images/planets/$name");
                  
                  //Change Creatures parent planet
                  //Update Creatures
                  $creature_id = 0;
                  while($creature_id <= $creature_limit){
              $sql = $conn->prepare("SELECT * FROM `creatures` WHERE `parent_planet` = :id");
              $sql->bindParam('id', $old_name, PDO::PARAM_INT);
              $sql->execute();
              $result = $sql->fetchObject();
              
              if($result != false){
                  
                  
                  //get the current id for the item
                  $creature_name = $result->name;
                  
              
              
              $sql = $conn->prepare("UPDATE `creatures` SET `parent_planet` = '$name' WHERE `name` = '$creature_name'");
              $sql->execute();
              } $creature_id++;
  }
  //Update Flora
  $flora_id = 0;
          while ($flora_id <= $flora_limit) {
              $sql = $conn->prepare("SELECT * FROM `flora` WHERE `parent_planet` = :id");
              $sql->bindParam('id', $old_name, PDO::PARAM_INT);
              $sql->execute();
              $result = $sql->fetchObject();

              if ($result != false) {
                  

                  //get the current id for the item
                  $flora_name = $result->name;
                  


                  $sql = $conn->prepare("UPDATE `flora` SET `parent_planet` = '$name' WHERE `name` = '$flora_name'");
                  $sql->execute();
              } $flora_id++;
          }
          
          //Update Moons
          $moon_id = 0;
          while ($moon_id <= $moon_limit) {
              $sql = $conn->prepare("SELECT * FROM `moons` WHERE `parent_planet` = :id");
              $sql->bindParam('id', $old_name, PDO::PARAM_INT);
              $sql->execute();
              $result = $sql->fetchObject();

              if ($result != false) {
                  

                  //get the current id for the item
                  $moon_name = $result->name;
                  


                  $sql = $conn->prepare("UPDATE `moons` SET `parent_planet` = '$name' WHERE `name` = '$moon_name'");
                  $sql->execute();
              } $moon_id++;
          }
      }
              
              
              //If name has been changed:
              //Change folder name to new name
              //change creatures parent planet
              //chang flora parent planet
      
      
  }
  // </editor-fold>
  
  
  
  // <editor-fold defaultstate="collapsed" desc="Edit Moon">
  function edit_moon($name, $enviroment, $climate, $life, $size, $sentinals, $minerals, $rating, $image, $extra_image, $extra_image2, $object_id){
      global $conn;
      global $creature_limit;
      global $flora_limit;
      
//      debug_to_console( "Name: $name, Enviroment: $enviroment, Climate: $climate, Life: $life, Size: $size, Sentinals: $sentinals, Minerals: $minerals,"
//              . " Rating: $rating, Image: $image, Extra_image: $extra_image, Extra_image2: $extra_image2, ID: $object_id " );
      
      $sql = $conn->prepare("SELECT * FROM `moons` WHERE `id` = :id");
              $sql->bindParam('id', $object_id, PDO::PARAM_INT);
              $sql->execute();

              $result = $sql->fetchObject();
              //check the result is real
              if($result != false){
                  $old_name = $result->name;
                  
                  
                  
              }
      
      $sql = $conn->prepare("UPDATE `moons` SET `name` = '$name', `enviroment` = '$enviroment', `climate` = '$climate', `life_type` = '$life', `size` = '$size', `rating` = '$rating', `minerals` = '$minerals', `main_image` = '$image', `extra_image1` = '$extra_image', `extra_image2` = '$extra_image2' WHERE `id` = '$object_id'");
              $sql->execute();
              
              if($name != $old_name){
//                  debug_to_console("You have changed the name!");
                  //The name has been changed
                  
                  //Change the name of the folder containing images
                  rename("C:/xampp/htdocs/no_mans_sky/images/moons/$old_name", 
              "C:/xampp/htdocs/no_mans_sky/images/moons/$name");
                  
                  //Change Creatures parent planet
                  
                  $creature_id = 0;
                  while($creature_id <= $creature_limit){
              $sql = $conn->prepare("SELECT * FROM `creatures` WHERE `parent_planet` = :id");
              $sql->bindParam('id', $old_name, PDO::PARAM_INT);
              $sql->execute();
              $result = $sql->fetchObject();
              
              if($result != false){
                  
                  
                  //get the current id for the item
                  $creature_name = $result->name;
                  
              
              
              $sql = $conn->prepare("UPDATE `creatures` SET `parent_planet` = '$name' WHERE `name` = '$creature_name'");
              $sql->execute();
              } $creature_id++;
  }
  
  $flora_id = 0;
          while ($flora_id <= $flora_limit) {
              $sql = $conn->prepare("SELECT * FROM `flora` WHERE `parent_planet` = :id");
              $sql->bindParam('id', $old_name, PDO::PARAM_INT);
              $sql->execute();
              $result = $sql->fetchObject();

              if ($result != false) {
                  

                  //get the current id for the item
                  $flora_name = $result->name;
                  


                  $sql = $conn->prepare("UPDATE `flora` SET `parent_planet` = '$name' WHERE `name` = '$flora_name'");
                  $sql->execute();
              } $flora_id++;
          }
      }
              
              
              //If name has been changed:
              //Change folder name to new name
              //change creatures parent planet
              //chang flora parent planet
      
      
  }
  // </editor-fold>
   
  // <editor-fold defaultstate="collapsed" desc="Delete Moon">
  function delete_moon($database , $name){
      
      global $conn;
      $limit_id = 1;
      $sql = $conn->prepare("SELECT * FROM `limits` WHERE `id` = :id");
              $sql->bindParam('id', $limit_id, PDO::PARAM_INT);
              $sql->execute();

              $result = $sql->fetchObject();
              
              if($result != false){
              
              $flora_limit = $result->flora;
              $moon_limit = $result->moons;
              $creature_limit = $result->creatures;
              }
      
      
      
      $id_type = "id";
      $name_column = "name";
      
//      rename("C:/xampp/htdocs/no_mans_sky/images/creatures/test", 
//              "C:/xampp/htdocs/no_mans_sky/images/creatures/this_has_worked");
      
                  //Get the info of the item
      $sql = $conn->prepare("SELECT * FROM `$database` WHERE `$name_column` = :id");
              $sql->bindParam('id', $name, PDO::PARAM_INT);
              $sql->execute();

              $result = $sql->fetchObject();
              //check the result is real
              if($result != false){
                  
              //get the id of the item
              $id = $result->id;
              
              //get the parent planet for the flora
              $parent_planet = $result->parent_planet; 
              
              
              }
              
      
              //Delete the item from the database
                
              
              ///////////////////////////////////////////////////////////////////////////////////////////////
              // Update number of moons in
              // //Planet
             
              $sql = $conn->prepare("SELECT * FROM `planets` WHERE `name` = :id");
              $sql->bindParam('id', $parent_planet, PDO::PARAM_INT);
              $sql->execute();
              $result = $sql->fetchObject();
              
              if($result != false){
                  
                  
                  
                  //get the current id for the item
                  $star_system = $result->star_system;
                  
                  
                  
                  $no_moons = $result->no_moons;
                  
                  $no_moons = $no_moons - 1;
                  
              
              
              $sql = $conn->prepare("UPDATE `planets` SET `no_moons` = '$no_moons' WHERE `name` = '$parent_planet'");
              $sql->execute();}
              
              // //Star systems
              //Galaxy
              
              
              
              
              
              
              
              //Update Star System
      
      $sql = $conn->prepare("SELECT * FROM `star_systems` WHERE `name` = :id");
              $sql->bindParam('id', $star_system, PDO::PARAM_INT);
              $sql->execute();
              $result = $sql->fetchObject();
              
              if($result != false){
                 
                  
                  //get the current id for the item
                  $galaxy = $result->galaxy;
                  
                  
                  $no_moons = $result->no_moons;
                  $no_moons = $no_moons - 1;
              
              
              $sql = $conn->prepare("UPDATE `star_systems` SET `no_moons` = '$no_moons' WHERE `name` = '$star_system'");
              $sql->execute();
      }
              
              //Update Galaxy
      
      $sql = $conn->prepare("SELECT * FROM `galaxy` WHERE `name` = :id");
              $sql->bindParam('id', $galaxy, PDO::PARAM_INT);
              $sql->execute();
              $result = $sql->fetchObject();
              
              if($result != false){
                 
                  
                  //get the current id for the item
                  $no_moons = $result->no_moons;
                  $no_moons = $no_moons - 1;
              
              
              $sql = $conn->prepare("UPDATE `galaxy` SET `no_moons` = '$no_moons' WHERE `name` = '$galaxy'");
              $sql->execute();}
              
              //Find creatures with parent moon
              
              $creature_id = 0;
              
              while($creature_id <= $creature_limit){
              $sql = $conn->prepare("SELECT * FROM `creatures` WHERE `parent_planet` = :id");
              $sql->bindParam('id', $name, PDO::PARAM_INT);
              $sql->execute();
              $result = $sql->fetchObject();
              
              if($result != false){
                  
                  
                  //get the current id for the item
                  $creature_name = $result->name;
                  
              
              
              
              
              delete_creature("creatures", $creature_name);
              } $creature_id++;
  }
              //Find flora with parent moon
              
              $flora_id = 0;
              
              while($flora_id <= $flora_limit){
              $sql = $conn->prepare("SELECT * FROM `flora` WHERE `parent_planet` = :id");
              $sql->bindParam('id', $name, PDO::PARAM_INT);
              $sql->execute();
              $result = $sql->fetchObject();
              
              if($result != false){
                  
                  
                  //get the current id for the item
                  $flora_name = $result->name;
                  
              
              
              delete_flora("flora", $flora_name);
              } $flora_id++;
  }
  
  $sql = $conn->prepare("DELETE FROM `$database` WHERE `$name_column` = '$name'");
              $sql->execute();
              //add 1 to the id to get the next item
              $id = $id + 1;
              //While loop that to take 1 from the id until it reaches the current limit
              while($id <= $moon_limit){
                  //Get the item info
                  $sql = $conn->prepare("SELECT * FROM `$database` WHERE `$id_type` = :id");
              $sql->bindParam('id', $id, PDO::PARAM_INT);
              $sql->execute();
              $result = $sql->fetchObject();
              //check the result is real
              if($result != false){
                  //get the current id for the item
                  $current_id = $result->id;
                  
                  
                  
                  //Make the new id to be 1 less than the previous id
                  $new_id = $current_id - 1;
                  
                  //uodate the database: set the id to be the new id where the id is the current id
                  $sql = $conn->prepare("UPDATE `$database` SET `$id_type` = '$new_id' WHERE `$id_type` = '$current_id'");
              $sql->execute();
                  
              }
              //Add 1 to the id and repeat the process
              $id++;
              
              }
              
              // Create the new limit for the database
              
              $new_limit = $moon_limit - 1;
              
              //Update the limit 
              $sql = $conn->prepare("UPDATE `limits` SET `$database` = '$new_limit' WHERE `id` = '1'");
              $sql->execute();
              
              
              //Refresh to the index page
              echo "<meta http-equiv='refresh' content='0; index.php'>";
  }
  // </editor-fold>
  
  
  
    // <editor-fold defaultstate="collapsed" desc="Delete Creature">
  function delete_creature($database , $name){
      global $conn;
      $limit_id = 1;
      $sql = $conn->prepare("SELECT * FROM `limits` WHERE `id` = :id");
              $sql->bindParam('id', $limit_id, PDO::PARAM_INT);
              $sql->execute();

              $result = $sql->fetchObject();
              
              if($result != false){
              
              $creature_limit = $result->creatures;
              }
      
      
      
      
      
      $id_type = "id";
      $name_column = "name";
      
//      rename("C:/xampp/htdocs/no_mans_sky/images/creatures/test", 
//              "C:/xampp/htdocs/no_mans_sky/images/creatures/this_has_worked");
      
                  //Get the info of the item
      $sql = $conn->prepare("SELECT * FROM `$database` WHERE `$name_column` = :id");
              $sql->bindParam('id', $name, PDO::PARAM_INT);
              $sql->execute();

              $result = $sql->fetchObject();
              //check the result is real
              if($result != false){
                  
                  
              //get the id of the item
              $id = $result->id;
              
              
              //get the parent planet for the flora
              $parent_planet = $result->parent_planet;
              
                  
                  //Get the parent type for the flora
                  $parent_type = $result->parent_type;
                  
                  
                  
              }
              
      
              
              
              
              //Update Planet/Moon
              
              if($parent_type == "Planet"){
                  $parent_type = "planets";
              }else{
                  $parent_type = "moons";
              }
              
              
              
              
              $sql = $conn->prepare("SELECT * FROM `$parent_type` WHERE `name` = :id");
              $sql->bindParam('id', $parent_planet, PDO::PARAM_INT);
              $sql->execute();
              $result = $sql->fetchObject();
              
              
              
              if($result != false){
                  
                  
                  
                  //get the current id for the item
                  $star_system = $result->star_system;
                  
                  
                  
                  $no_creatures = $result->no_creatures;
                  
                  $no_creatures = $no_creatures - 1;
                  
              
              
              $sql = $conn->prepare("UPDATE `$parent_type` SET `no_creatures` = '$no_creatures' WHERE `name` = '$parent_planet'");
              $sql->execute();
      }else{
          
      }
              
              
              
              //Update Star System
      
      $sql = $conn->prepare("SELECT * FROM `star_systems` WHERE `name` = :id");
              $sql->bindParam('id', $star_system, PDO::PARAM_INT);
              $sql->execute();
              $result = $sql->fetchObject();
              
              if($result != false){
                  
                  //get the current id for the item
                  $galaxy = $result->galaxy;
                  
                  $no_creatures = $result->no_creatures;
                  $no_creatures = $no_creatures - 1;
              
              
              $sql = $conn->prepare("UPDATE `star_systems` SET `no_creatures` = '$no_creatures' WHERE `name` = '$star_system'");
              $sql->execute();
      }
              
              //Update Galaxy
      
      $sql = $conn->prepare("SELECT * FROM `galaxy` WHERE `name` = :id");
              $sql->bindParam('id', $galaxy, PDO::PARAM_INT);
              $sql->execute();
              $result = $sql->fetchObject();
              
              if($result != false){
                  
                  //get the current id for the item
                  $no_creatures = $result->no_creatures;
                  $no_creatures = $no_creatures - 1;
              
              
              $sql = $conn->prepare("UPDATE `galaxy` SET `no_creatures` = '$no_creatures' WHERE `name` = '$galaxy'");
              $sql->execute();
              }
              //Delete the item from the database
                $sql = $conn->prepare("DELETE FROM `$database` WHERE `$name_column` = '$name'");
              $sql->execute();
              
              //add 1 to the id to get the next item
              $id = $id + 1;
              //While loop that to take 1 from the id until it reaches the current limit
              while($id <= $creature_limit){
                  //Get the item info
                  $sql = $conn->prepare("SELECT * FROM `$database` WHERE `$id_type` = :id");
              $sql->bindParam('id', $id, PDO::PARAM_INT);
              $sql->execute();
              $result = $sql->fetchObject();
              //check the result is real
              if($result != false){
                  //get the current id for the item
                  $current_id = $result->id;
                  
                  
                  
                  //Make the new id to be 1 less than the previous id
                  $new_id = $current_id - 1;
                  
                  //uodate the database: set the id to be the new id where the id is the current id
                  $sql = $conn->prepare("UPDATE `$database` SET `$id_type` = '$new_id' WHERE `$id_type` = '$current_id'");
              $sql->execute();
                  
              }
              //Add 1 to the id and repeat the process
              $id++;
              
              }
              
              // Create the new limit for the database
              $new_limit = $creature_limit - 1;
              
              //Update the limit 
              $sql = $conn->prepare("UPDATE `limits` SET `$database` = '$new_limit' WHERE `id` = '1'");
              $sql->execute();
              
              
              //Refresh to the index page
              echo "<meta http-equiv='refresh' content='0; index.php'>";
  }
  // </editor-fold>
  
   // <editor-fold defaultstate="collapsed" desc="Edit Creature">
  function edit_creature($name, $life_type, $size, $rating, $diet, $image, $object_id){
      global $conn;
      
      
      
      
      
      $sql = $conn->prepare("UPDATE `creatures` SET `name` = '$name', `life_type` = '$life_type', `diet` = '$diet', `size` = '$size', `rating` = '$rating', `main_image` = '$image' WHERE `id` = '$object_id'");
              $sql->execute();
      
  }
  // </editor-fold>
  
  
  
  // <editor-fold defaultstate="collapsed" desc="Delete Flora">
  function delete_flora($database , $name){
      
      global $conn;
      $limit_id = 1;
      $sql = $conn->prepare("SELECT * FROM `limits` WHERE `id` = :id");
              $sql->bindParam('id', $limit_id, PDO::PARAM_INT);
              $sql->execute();

              $result = $sql->fetchObject();
              
              if($result != false){
              
              $flora_limit = $result->flora;
              }
                  
              
      
      
      
      
      $id_type = "id";
      $name_column = "name";
      
//      rename("C:/xampp/htdocs/no_mans_sky/images/creatures/test", 
//              "C:/xampp/htdocs/no_mans_sky/images/creatures/this_has_worked");
      
                  //Get the info of the item
      $sql = $conn->prepare("SELECT * FROM `$database` WHERE `$name_column` = :id");
              $sql->bindParam('id', $name, PDO::PARAM_INT);
              $sql->execute();

              $result = $sql->fetchObject();
              //check the result is real
              if($result != false){
              //get the id of the item
              $id = $result->id;
              //get the parent planet for the flora
              $parent_planet = $result->parent_planet;
                  
                  //Get the parent type for the flora
                  $parent_type = $result->parent_type;
                  
              }
              
      
              
              // Create the new limit for the database
              
              
              
              //Update Planet/Moon
              
              if($parent_type == "Planet"){
                  $parent_type = "planets";
              }else{
                  $parent_type = "moons";
              }
              
              
              
              $sql = $conn->prepare("SELECT * FROM `$parent_type` WHERE `name` = :id");
              $sql->bindParam('id', $parent_planet, PDO::PARAM_INT);
              $sql->execute();
              $result = $sql->fetchObject();
              
              
              
              if($result != false){
                  
                  //get the current id for the item
                  $star_system = $result->star_system;
                  
                  $no_flora = $result->no_flora;
                  
                  $no_flora = $no_flora - 1;
                  
              
              
              $sql = $conn->prepare("UPDATE `$parent_type` SET `no_flora` = '$no_flora' WHERE `name` = '$parent_planet'");
              $sql->execute();
      }else{
          
      }
              
              
              
              //Update Star System
      
      $sql = $conn->prepare("SELECT * FROM `star_systems` WHERE `name` = :id");
              $sql->bindParam('id', $star_system, PDO::PARAM_INT);
              $sql->execute();
              $result = $sql->fetchObject();
              
              if($result != false){
                  //get the current id for the item
                  $galaxy = $result->galaxy;
                  $no_flora = $result->no_flora;
                  $no_flora = $no_flora - 1;
              
              
              $sql = $conn->prepare("UPDATE `star_systems` SET `no_flora` = '$no_flora' WHERE `name` = '$star_system'");
              $sql->execute();
      }
              
              //Update Galaxy
      
      $sql = $conn->prepare("SELECT * FROM `galaxy` WHERE `name` = :id");
              $sql->bindParam('id', $galaxy, PDO::PARAM_INT);
              $sql->execute();
              $result = $sql->fetchObject();
              
              if($result != false){
                  //get the current id for the item
                  $no_flora = $result->no_flora;
                  $no_flora = $no_flora - 1;
              
              
              $sql = $conn->prepare("UPDATE `galaxy` SET `no_flora` = '$no_flora' WHERE `name` = '$galaxy'");
              $sql->execute();
              
              
              //Refresh to the index page
              echo "<meta http-equiv='refresh' content='0; index.php'>";
  }
  
  //Delete the item from the database
                $sql = $conn->prepare("DELETE FROM `$database` WHERE `$name_column` = '$name'");
              $sql->execute();
              //add 1 to the id to get the next item
              $id = $id + 1;
              //While loop that to take 1 from the id until it reaches the current limit
              while($id <= $flora_limit){
                  //Get the item info
                  $sql = $conn->prepare("SELECT * FROM `$database` WHERE `$id_type` = :id");
              $sql->bindParam('id', $id, PDO::PARAM_INT);
              $sql->execute();
              $result = $sql->fetchObject();
              //check the result is real
              if($result != false){
                  //get the current id for the item
                  $current_id = $result->id;
                  
                  
                  
                  //Make the new id to be 1 less than the previous id
                  $new_id = $current_id - 1;
                  
                  //uodate the database: set the id to be the new id where the id is the current id
                  $sql = $conn->prepare("UPDATE `$database` SET `$id_type` = '$new_id' WHERE `$id_type` = '$current_id'");
              $sql->execute();
                  
              }
              //Add 1 to the id and repeat the process
              $id++;
              
              }
              
              $new_limit = $flora_limit - 1;
              
              //Update the limit 
              $sql = $conn->prepare("UPDATE `limits` SET `$database` = '$new_limit' WHERE `id` = '1'");
              $sql->execute();
              }
  // </editor-fold>
  
    // <editor-fold defaultstate="collapsed" desc="Edit Flora">
  function edit_flora($name, $diet, $size, $rating, $image, $object_id){
      global $conn;
      
      
      
      
      $sql = $conn->prepare("UPDATE `flora` SET `name` = '$name', `diet` = '$diet', `size` = '$size', `rating` = '$rating', `main_image` = '$image' WHERE `id` = '$object_id'");
              $sql->execute();
      
  }
  // </editor-fold>
  
  
  // <editor-fold defaultstate="collapsed" desc="Delete Ship">
  function delete_ship($database , $name){
      global $ship_limit;
      global $conn;
      
      
      
      switch($database){
          case "ships":
      $id_type = "id";
      $name_column = "name";
      
//      rename("C:/xampp/htdocs/no_mans_sky/images/creatures/test", 
//              "C:/xampp/htdocs/no_mans_sky/images/creatures/this_has_worked");
      
                  //Get the info of the item
      $sql = $conn->prepare("SELECT * FROM `$database` WHERE `$name_column` = :id");
              $sql->bindParam('id', $name, PDO::PARAM_INT);
              $sql->execute();

              $result = $sql->fetchObject();
              //check the result is real
              if($result != false){
              //get the id of the item
              $id = $result->id;
              
              }
              
      
              //Delete the item from the database
                $sql = $conn->prepare("DELETE FROM `$database` WHERE `$name_column` = '$name'");
              $sql->execute();
              //add 1 to the id to get the next item
              $id = $id + 1;
              //While loop that to take 1 from the id until it reaches the current limit
              while($id <= $ship_limit){
                  //Get the item info
                  $sql = $conn->prepare("SELECT * FROM `$database` WHERE `$id_type` = :id");
              $sql->bindParam('id', $id, PDO::PARAM_INT);
              $sql->execute();
              $result = $sql->fetchObject();
              //check the result is real
              if($result != false){
                  //get the current id for the item
                  $current_id = $result->id;
                  //Make the new id to be 1 less than the previous id
                  $new_id = $current_id - 1;
                  
                  //uodate the database: set the id to be the new id where the id is the current id
                  $sql = $conn->prepare("UPDATE `$database` SET `$id_type` = '$new_id' WHERE `$id_type` = '$current_id'");
              $sql->execute();
                  
              }
              //Add 1 to the id and repeat the process
              $id++;
              
              }
              // Create the new limit for the database
              $new_limit = $ship_limit - 1;
              //Update the limit 
              $sql = $conn->prepare("UPDATE `limits` SET `$database` = '$new_limit' WHERE `id` = '1'");
              $sql->execute();
              
              
              
              
              
              
              
              
              //Refresh to the index page
              echo "<meta http-equiv='refresh' content='0; index.php'>";
              break;
              
              default:
          echo "Item not recognised";
          break;
              
              
      }
      
  }
  // </editor-fold>
  
  // <editor-fold defaultstate="collapsed" desc="Edit Ship">
  function edit_ship($name, $type, $image, $object_id){
      global $conn;
      
      echo "Edit ship has been activated";
      
      $sql = $conn->prepare("UPDATE `ships` SET `name` = '$name', `type` = '$type', `main_image` = '$image' WHERE `id` = '$object_id'");
              $sql->execute();
      
  }
  // </editor-fold>
  
  
  

