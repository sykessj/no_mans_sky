<?php

  
  require_once('C:\xampp\htdocs\no_mans_sky\includes\db.php');
  require_once('C:\xampp\htdocs\no_mans_sky\includes\db_checking.php');
  
  
  
  function delete_item($database , $name){
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
  
  function edit_ship($name, $type, $image, $object_id){
      global $conn;
      
      echo "Edit ship has been activated";
      
      $sql = $conn->prepare("UPDATE `ships` SET `name` = '$name', `type` = '$type', `main_image` = '$image' WHERE `id` = '$object_id'");
              $sql->execute();
      
  }

