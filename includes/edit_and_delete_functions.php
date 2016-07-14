<?php

  
  require_once('C:\xampp\htdocs\no_mans_sky\includes\db.php');
  require_once('C:\xampp\htdocs\no_mans_sky\includes\db_checking.php');
  
  
  
  // <editor-fold defaultstate="collapsed" desc="Delete Flora">
  function delete_flora($database , $name){
      global $flora_limit;
      global $conn;
      
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
              // Create the new limit for the database
              $new_limit = $flora_limit - 1;
              //Update the limit 
              $sql = $conn->prepare("UPDATE `limits` SET `$database` = '$new_limit' WHERE `id` = '1'");
              $sql->execute();
              
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
  }}
  // </editor-fold>
  
    // <editor-fold defaultstate="collapsed" desc="Edit Flora">
  function edit_flora($name, $diet, $size, $rating, $image, $object_id){
      global $conn;
      
      
      debug_to_console( "Name: $name, Diet: $diet, Size: $size, Rating: $rating, Image: $image, ID: $object_id");
      
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
  
  
  

