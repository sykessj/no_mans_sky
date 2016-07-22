<!DOCTYPE html>

<html lang="en">

<style>
    
    
    
    

#center_aligned{
        text-align: right;
        block: inline;
        font-family: noMansFont;
        color: white;
        font-size: 35pt;
    }
    
    #stat {
        font-family: noMansFont;
        font-size: 25pt;
        color: white !important;
    }
    
    body{
        background-image: url("images/background3.jpg");
    }
    
    #button1{
        background-image: url("images/background3.jpg");
    }

</style>

<body>

<?php


  require_once('C:\xampp\htdocs\no_mans_sky\includes\db.php');
  require_once('C:\xampp\htdocs\no_mans_sky\includes\db_checking.php');
  require_once('C:\xampp\htdocs\no_mans_sky\includes\edit_and_delete_functions.php');
  require_once('C:\xampp\htdocs\no_mans_sky\includes\bootstrap.php');
  $current_url = "$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
  global $planet_limit;
  global $moon_limit;
  global $creature_limit;
  $test_var = "No Change";
  
  $table = "none";
  $id = 0;
  $item_name = "none";
  $delete = "false";
  
  
  if (isset($_GET['database_type'])) {
  $table = $_GET['database_type'];}
  
  if (isset($_GET['item_id'])) {
  $id = $_GET['item_id'];}
  
  if (isset($_GET['item_name'])) {
  $item_name = $_GET['item_name'];}
  
  if (isset($_GET['delete'])) {
  $delete = $_GET['delete'];}
  
  
  
 
  
  
  
  
  if($table != "none"){
  if($id != 0){
  $sql = $conn->prepare("SELECT * FROM `$table` WHERE `ID` = :id");
              $sql->bindParam('id', $id, PDO::PARAM_INT);
              $sql->execute();
  }
  else{
      $sql = $conn->prepare("SELECT * FROM `$table` WHERE `name` = :id");
              $sql->bindParam('id', $item_name, PDO::PARAM_INT);
              $sql->execute();
  }
              $result = $sql->fetchObject();
              
  }
  
  switch($table){
      // <editor-fold defaultstate="collapsed" desc="Galaxy Case">
      case "galaxy":
          
              if ($result != false){
                  
                  $object_id = $result->Id;
                  $name = $result->name;
                  $no_star_systems = $result->no_star_systems;
                  $no_planets = $result->no_planets;
                  $no_moons = $result->no_moons;
                  $no_creatures = $result->no_creatures;
                  $no_flora = $result->no_flora;
                  
                  ?>

                <h1 style="color:white; text-align: center; font-family: noMansFont; font-size: 60pt" > <?= $name ?> Galaxy</h1>
                <a data-toggle="modal" data-target="#delete_modal" id="button1" class="btn btn-lg btn-success" style="background: url('images/pw_maze_black_2X.png'); float: right; margin-left: 10px; margin-right: 10px;">Delete</a>
                <a href="item.php?database_type=<?= $table; ?>&item_id=<?= $object_id; ?>&id=10&edit_var1=<?= $name ?>&edit_id=<?= $object_id; ?>&edit_table=<?= $table; ?>" id="button1" class="btn btn-lg btn-success" style="background: url('images/pw_maze_black_2X.png'); float: right; margin-left: 10px; margin-right: 10px;">Edit</a>
                
                <br>

                <div style="margin-left: auto; margin-right:auto; width: 265px;">    
                <h3 id="center_aligned"> Star Systems: <?= $no_star_systems ?></h3>
                <h3 id="center_aligned"> Planets: <?= $no_planets ?></h3>
                <h3 id="center_aligned"> Moons: <?= $no_moons ?></h3>
                <h3 id="center_aligned"> Creatures: <?= $no_creatures ?></h3>
                <h3 id="center_aligned"> Flora: <?= $no_flora ?></h3>
                
             
                
                </div>

<?php
  if($delete == "true"){
      //Check which database type it is
      //take all possible info
      //send through the relevant method.
      delete_galaxy($table , $name);}
                  
              }else{echo "Sorry, Could not find this item";}
              
              
              
          break;
      // </editor-fold>
          
      // <editor-fold defaultstate="collapsed" desc="Star Systems Case">
      case "star_systems":
          
          if ($result != false){
              $object_id = $result->ID;
                  $name = $result->name;
                  $galaxy = $result->galaxy;
                  $star_type = $result->star_type;
                  $star_colour = $result->star_colour;
                  $no_planets = $result->no_planets;
                  $no_moons = $result->no_moons;
                  $no_creatures = $result->no_creatures;
                  $no_flora = $result->no_flora;
                  $image = $result->image;
                  $date_logged = $result->date_logged;
                  $timestamp = strtotime($date_logged);
                        $date_logged = date("H:ia  d/M/Y", $timestamp);
                        
                  
                  $planet_id = 0;   
                  $planet_array = array();
                  $id_array = array();
                  while($planet_id <= $planet_limit){
                      
                  
                  $sql = $conn->prepare("SELECT * FROM `planets` WHERE `id` = :id");
                  $sql->bindParam('id', $planet_id, PDO::PARAM_INT);
                  $sql->execute();
                  
                  $result = $sql->fetchObject();
                  
                  
                  
                  
                  
                  if ($result != false){
                      $planet_system = $result->star_system;
                      $planet_name = $result->name;
                      $planet_id = $result->id;
                      
                      
                      
                      
                      if($planet_system == $name){
                          array_push($planet_array, $planet_name);
                          array_push($id_array, $planet_id);
                          
                          
                          
                          
                      }
                  }
                  $planet_id = $planet_id + 1;
          }
          $planet_count = count($planet_array);
          $sql = $conn->prepare("SELECT * FROM `galaxy` WHERE `name` = :id");
                  $sql->bindParam('id', $galaxy, PDO::PARAM_INT);
                  $sql->execute();
                  
                  $result = $sql->fetchObject();
                  
                  $star_galaxy_id = $result->Id;
          $test_var = $planet_count;
                  
                  
                  $find_image = "images/$table/$image";
                  ?>
                
                  <h1 style="text-align: center; font-family: noMansFont; font-size: 60pt; color: white" > <?= $name ?> System</h1>
                  <a data-toggle="modal" data-target="#delete_modal" id="button1" class="btn btn-lg btn-success" style="background: url('images/pw_maze_black_2X.png'); float: right; margin-left: 10px; margin-right: 10px;">Delete</a>
                  <a href="item.php?database_type=<?= $table; ?>&item_id=<?= $object_id; ?>&id=9&edit_var1=<?= $name ?>&edit_var2=<?= $star_type ?>&edit_var3=<?= $star_colour ?>&edit_var4=<?= $image; ?>&edit_id=<?= $object_id; ?>&edit_table=<?= $table; ?>" id="button1" class="btn btn-lg btn-success" style="background: url('images/pw_maze_black_2X.png'); float: right; margin-left: 10px; margin-right: 10px;">Edit</a>
                  <br>
                  <br>
                  <div style="margin-top: 50px;" class="container">
                      <div class="row">
                          <div class="col-md-8">
                              <a target="_blank" href="display_media.php?media_type=image&media=<?= $image ?>&folder=<?= $table ?>&name=<?= $name ?>"><img style="margin-left:auto; margin-right: auto; display:block;" src="<?= $find_image ?>" width="700" height="400"/></a>
                  </div>
                         <div class="col-md-3"> 
                      <h1 id="stat"> Planets: <?= $no_planets ?> </h1>
                      <h1 id="stat"> Moons: <?= $no_moons ?> </h1>
                      <h1 id="stat"> Creatures: <?= $no_creatures ?> </h1>
                      <h1 id="stat"> Flora: <?= $no_flora ?> </h1>
                      <h1 id="stat"> Date Discovered: <?= $date_logged ?> </h1>
                  </div>
                      </div>
                      
                      <div class="row">
                          <div class="col-md-4" style="text-align: center; margin-top: 90px;">
                          <h1 style="text-align: center; font-family: noMansFont; font-size: 60pt; color: white" > Planets</h1>
                          <?php 
                            if($planet_count == 0){
                                ?>
                            
                                <h1 id="stat"> No Planets discovered </h1>
                                <?php
                            }
                            else{
                                $number = 0;
                                while($number < $planet_count){
                                    
                                ?>
                                <h1 id="stat"><a style="color: white" href="item.php?database_type=planets&item_id=<?= $id_array[$number]; ?>"><?= $planet_array[$number] ?></a></h1>
                                    <?php
                                      $number++;
                                }
                            }
                            ?>
                      </div>
                          <div class="col-md-7" style="text-align: center; margin-top: 90px;">
                              <h1 style="text-align: center; font-family: noMansFont; font-size: 60pt; color: white" > Bio</h1>
                              <h1 id="stat"> Galaxy: <a style="color: white;" href="item.php?database_type=galaxy&item_id=<?= $star_galaxy_id ?>"><?= $galaxy ?> </a></h1>
                      <h1 id="stat"> Star Type: <?= $star_type ?> </h1>
                      <h1 id="stat"> Star Colour: <?= $star_colour ?> </h1>
                      </div>
                      </div> 
                      
                      
                      </div>
                  <br>
                  <br>
                  
                  
                  <?php
                    
                    if($delete == "true"){
      //Check which database type it is
      //take all possible info
      //send through the relevant method.
      delete_star($table , $name);}
                    
                    
              }else{echo "Sorry, Could not find this item";}
          break;
          
          // </editor-fold>
          
      // <editor-fold defaultstate="collapsed" desc="Planets Case">
      case "planets":
          
          if ($result != false){
              $object_id = $result->id;
                  $name = $result->name;
                  $star_system = $result->star_system;
                  $enviroment = $result->enviroment;
                  $climate = $result->climate;
                  $life_type = $result->life_type;
                  $size = $result->size;
                  $rating = $result->rating;
                  $sentinals = $result->sentinals;
                  $minerals = $result->minerals;
                  $no_moons = $result->no_moons;
                  $no_creatures = $result->no_creatures;
                  $no_flora = $result->no_flora;
                  $image = $result->main_image;
                  $extra_image = $result->extra_image;
                  $extra_image2 = $result->extra_image2;
                  $date_logged = $result->date_logged;
                  $timestamp = strtotime($date_logged);
                        $date_logged = date("H:ia  d/M/Y", $timestamp);
                        
                   // <editor-fold defaultstate="collapsed" desc="Moon Id Loop">     
                  //Moon while loop
                  $moon_id = 0;   
                  $moon_array = array();
                  $moon_id_array = array();
                  while($moon_id <= $moon_limit){
                      
                  
                  $sql = $conn->prepare("SELECT * FROM `moons` WHERE `id` = :id");
                  $sql->bindParam('id', $moon_id, PDO::PARAM_INT);
                  $sql->execute();
                  
                  $result = $sql->fetchObject();
                  
                  
                  
                  
                  
                  if ($result != false){
                      $moon_planet = $result->parent_planet;
                      $moon_name = $result->name;
                      $moon_id = $result->id;
                      
                      
                      
                      
                      if($moon_planet == $name){
                          array_push($moon_array, $moon_name);
                          array_push($moon_id_array, $moon_id);
                          
                          
                          
                          
                      }
                  }
                  $moon_id = $moon_id + 1;
          }
          $moon_count = count($moon_array);
          
          // </editor-fold>
          
                   // <editor-fold defaultstate="collapsed" desc="Creature Loop">     
                  //creature while loop
                  $creature_id = 0;   
                  $creature_array = array();
                  $creature_id_array = array();
                  while($creature_id <= $creature_limit){
                      
                  
                  $sql = $conn->prepare("SELECT * FROM `creatures` WHERE `id` = :id");
                  $sql->bindParam('id', $creature_id, PDO::PARAM_INT);
                  $sql->execute();
                  
                  $result = $sql->fetchObject();
                  
                  
                  
                  
                  
                  if ($result != false){
                      $creature_planet = $result->parent_planet;
                      $creature_name = $result->name;
                      $creature_id = $result->id;
                      
                      
                      
                      
                      if($creature_planet == $name){
                          array_push($creature_array, $creature_name);
                          array_push($creature_id_array, $creature_id);
                          
                          
                          
                          
                      }
                  }
                  $creature_id = $creature_id + 1;
          }
          $creature_count = count($creature_array);
          
          // </editor-fold>
          
                  // <editor-fold defaultstate="collapsed" desc="Flora Loop">     
                  //creature while loop
                  $flora_id = 0;   
                  $flora_array = array();
                  $flora_id_array = array();
                  while($flora_id <= $flora_limit){
                      
                  
                  $sql = $conn->prepare("SELECT * FROM `flora` WHERE `id` = :id");
                  $sql->bindParam('id', $flora_id, PDO::PARAM_INT);
                  $sql->execute();
                  
                  $result = $sql->fetchObject();
                  
                  
                  
                  
                  
                  if ($result != false){
                      $flora_planet = $result->parent_planet;
                      $flora_name = $result->name;
                      $flora_id = $result->id;
                      
                      
                      
                      
                      if($flora_planet == $name){
                          array_push($flora_array, $flora_name);
                          array_push($flora_id_array, $flora_id);
                          
                          
                          
                          
                      }
                  }
                  $flora_id = $flora_id + 1;
          }
          $flora_count = count($flora_array);
          
          // </editor-fold>
          $test_var = $moon_count;
          
          $sql = $conn->prepare("SELECT * FROM `star_systems` WHERE `name` = :id");
                  $sql->bindParam('id', $star_system, PDO::PARAM_INT);
                  $sql->execute();
                  
                  $result = $sql->fetchObject();
                  
                  $planet_star_id = $result->ID;
                  $test_var = $star_system;
                  
                  
                  $find_image = "images/$table/$name/$image";
                  $find_image1 = "images/$table/$name/$extra_image";
                  $find_image2 = "images/$table/$name/$extra_image2";
                  ?>
                
                  <h1 style="text-align: center; font-family: noMansFont; font-size: 60pt; color: white" > <?= $name ?></h1>
                  <a data-toggle="modal" data-target="#delete_modal" id="button1" class="btn btn-lg btn-success" style="background: url('images/pw_maze_black_2X.png'); float: right; margin-left: 10px; margin-right: 10px;">Delete</a>
                  <a href="item.php?database_type=<?= $table; ?>&item_id=<?= $object_id; ?>&id=8&edit_var1=<?= $name ?>&edit_var2=<?= $enviroment ?>&edit_var3=<?= $climate ?>&edit_var4=<?= $life_type; ?>&edit_var5=<?= $size; ?>&edit_var6=<?=$sentinals ?>&edit_var7=<?=$minerals ?>&edit_var8=<?=$rating ?>&edit_var9=<?=$image ?>&edit_var10=<?=$extra_image ?>&edit_var11=<?=$extra_image2 ?>&edit_id=<?= $object_id; ?>&edit_table=<?= $table; ?>" id="button1" class="btn btn-lg btn-success" style="background: url('images/pw_maze_black_2X.png'); float: right; margin-left: 10px; margin-right: 10px;">Edit</a>
                  <br>
                  <br>
                  <div style="margin-top: 50px;" class="container">
                      <div class="row">
                          <div class="col-md-8">
                              <a target="_blank" href="display_media.php?media_type=image&media=<?= $image ?>&folder=<?= $table ?>&folder1=<?= $name ?>&name=<?= $name ?>"><img style="margin-left:auto; margin-right: auto; display:block;" src="<?= $find_image ?>" width="700" height="400"/></a>
                  </div>
                         <div class="col-md-3">
                      <h1 id="stat"> Moons: <?= $no_moons ?> </h1>
                      <h1 id="stat"> Creatures: <?= $no_creatures ?> </h1>
                      <h1 id="stat"> Flora: <?= $no_flora ?> </h1>
                      <h1 id="stat"> Date Discovered: <?= $date_logged ?> </h1>
                  </div>
                      </div>
                      
                      <div class="row">
                          <div class="col-md-4" style="text-align: center; margin-top: 30px;">
                          <h1 style="text-align: center; font-family: noMansFont; font-size: 45pt; color: white" > Moons</h1>
                          <?php 
                            if($moon_count == 0){
                                ?>
                            
                                <h1 id="stat"> No Moons discovered </h1>
                                <?php
                            }
                            else{
                                $number = 0;
                                while($number < $moon_count){
                                    
                                ?>
                                <h1 id="stat"><a style="color: white" href="item.php?database_type=moons&item_id=<?= $moon_id_array[$number]; ?>"><?= $moon_array[$number] ?></a></h1>
                                    <?php
                                      $number++;
                                }
                            }
                            ?>
                                <!--////////////////////////////////////////////////////////////////////////////////////////-->
                                
                                <h1 style="text-align: center; font-family: noMansFont; font-size: 45pt; color: white" > Creatures</h1>
                          <?php 
                            if($creature_count == 0){
                                ?>
                            
                                <h1 id="stat"> No Creatures discovered </h1>
                                <?php
                            }
                            else{
                                $number = 0;
                                while($number < $creature_count){
                                    
                                ?>
                                <h1 id="stat"><a style="color: white" href="item.php?database_type=creatures&item_id=<?= $creature_id_array[$number]; ?>"><?= $creature_array[$number] ?></a></h1>
                                    <?php
                                      $number++;
                                }
                            }
                            ?>
                                
                                <!--////////////////////////////////////////////////////////////////////////////////////////-->
                                
                                <h1 style="text-align: center; font-family: noMansFont; font-size: 45pt; color: white"> Flora</h1>
                          <?php 
                            if($flora_count == 0){
                                ?>
                            
                                <h1 id="stat"> No Flora discovered </h1>
                                <?php
                            }
                            else{
                                $number = 0;
                                while($number < $flora_count){
                                    
                                ?>
                                <h1 id="stat"><a style="color: white" href="item.php?database_type=flora&item_id=<?= $flora_id_array[$number]; ?>"><?= $flora_array[$number] ?></a></h1>
                                    <?php
                                      $number++;
                                }
                            }
                            ?>
                      </div>
                          <div class="col-md-7" style="text-align: center; margin-top: 30px;">
                              <h1 style="text-align: center; font-family: noMansFont; font-size: 60pt; color: white" > Bio</h1>
                              <h1 id="stat"> Star System: <a style='color: white;' href='item.php?database_type=star_systems&item_id=<?= $planet_star_id; ?>'><?= $star_system ?></a> </h1>
                      <h1 id="stat"> Enviroment: <?= $enviroment ?> </h1>
                      <h1 id="stat"> Climate: <?= $climate ?> </h1>
                      <h1 id="stat"> Life: <?= $life_type ?> </h1>
                      <h1 id="stat"> Size: <?= $size ?> </h1>
                      <h1 id="stat"> Rating: <?= $rating ?> </h1>
                      <h1 id="stat"> Sentinals: <?= $sentinals ?> </h1>
                      <h1 id="stat" style='color: black !important'> Minerals: <?= $minerals ?> </h1>
                      </div>
                      </div>
                      
                      <div class="row" style='margin-top: 20px;'>
                          <div class="col-md-6">
                              <a target="_blank" href="display_media.php?media_type=image&media=<?= $extra_image ?>&folder=<?= $table ?>&folder1=<?= $name ?>&name=<?= $name ?>"><img style="margin-left: 10px;" src="<?= $find_image1 ?>" width="550" height="340"/></a>
                  </div>
                          <div class="col-md-6">
                              <a target="_blank" href="display_media.php?media_type=image&media=<?= $extra_image2 ?>&folder=<?= $table ?>&folder1=<?= $name ?>&name=<?= $name ?>"><img src="<?= $find_image2 ?>" width="550" height="340"/></a>      
                          
                  </div>
                      </div>
                      
                      
                      </div>
                  <br>
                  <br>
                  
                  
                  <?php
                    
                    if($delete == "true"){
      //Check which database type it is
      //take all possible info
      //send through the relevant method.
      delete_planet($table , $name);}
                    
              }else{echo "Sorry, Could not find this item";}
          break;
          
          // </editor-fold>
          
      // <editor-fold defaultstate="collapsed" desc="Moons Case">
      case "moons":
          
          if ($result != false){
              $object_id = $result->id;
                  $name = $result->name;
                  $star_system = $result->star_system;
                  $enviroment = $result->enviroment;
                  $climate = $result->climate;
                  $life_type = $result->life_type;
                  $size = $result->size;
                  $rating = $result->rating;
                  $sentinals = $result->sentinals;
                  $minerals = $result->Minerals;
                  $no_creatures = $result->no_creatures;
                  $no_flora = $result->no_flora;
                  $parent_planet = $result->parent_planet;
                  $image = $result->main_image;
                  $extra_image = $result->extra_image1;
                  $extra_image2 = $result->extra_image2;
                  $date_logged = $result->date_logged;
                  $timestamp = strtotime($date_logged);
                        $date_logged = date("H:ia  d/M/Y", $timestamp);
          
                   // <editor-fold defaultstate="collapsed" desc="Creature Loop">     
                  //creature while loop
                  $creature_id = 0;   
                  $creature_array = array();
                  $creature_id_array = array();
                  while($creature_id <= $creature_limit){
                      
                  
                  $sql = $conn->prepare("SELECT * FROM `creatures` WHERE `id` = :id");
                  $sql->bindParam('id', $creature_id, PDO::PARAM_INT);
                  $sql->execute();
                  
                  $result = $sql->fetchObject();
                  
                  
                  
                  
                  
                  if ($result != false){
                      $creature_planet = $result->parent_planet;
                      $creature_name = $result->name;
                      $creature_id = $result->id;
                      
                      
                      
                      
                      if($creature_planet == $name){
                          array_push($creature_array, $creature_name);
                          array_push($creature_id_array, $creature_id);
                          
                          
                          
                          
                      }
                  }
                  $creature_id = $creature_id + 1;
          }
          $creature_count = count($creature_array);
          
          // </editor-fold>
          
                  // <editor-fold defaultstate="collapsed" desc="Flora Loop">     
                  //creature while loop
                  $flora_id = 0;   
                  $flora_array = array();
                  $flora_id_array = array();
                  while($flora_id <= $flora_limit){
                      
                  
                  $sql = $conn->prepare("SELECT * FROM `flora` WHERE `id` = :id");
                  $sql->bindParam('id', $flora_id, PDO::PARAM_INT);
                  $sql->execute();
                  
                  $result = $sql->fetchObject();
                  
                  
                  
                  
                  
                  if ($result != false){
                      $flora_planet = $result->parent_planet;
                      $flora_name = $result->name;
                      $flora_id = $result->id;
                      
                      
                      
                      
                      if($flora_planet == $name){
                          array_push($flora_array, $flora_name);
                          array_push($flora_id_array, $flora_id);
                          
                          
                          
                          
                      }
                  }
                  $flora_id = $flora_id + 1;
          }
          $flora_count = count($flora_array);
          
          // </editor-fold>
          
          
          $sql = $conn->prepare("SELECT * FROM `star_systems` WHERE `name` = :id");
                  $sql->bindParam('id', $star_system, PDO::PARAM_INT);
                  $sql->execute();
                  
                  $result = $sql->fetchObject();
                  
                  $planet_star_id = $result->ID;
                  
         $sql = $conn->prepare("SELECT * FROM `planets` WHERE `name` = :id");
                  $sql->bindParam('id', $parent_planet, PDO::PARAM_INT);
                  $sql->execute();
                  
                  $result = $sql->fetchObject();
                  
                  $parent_planet_id = $result->id;
                  
                  
                  $test_var = $star_system;
                  
                  
                  $find_image = "images/$table/$name/$image";
                  $find_image1 = "images/$table/$name/$extra_image";
                  $find_image2 = "images/$table/$name/$extra_image2";
                  ?>
                
                  <h1 style="text-align: center; font-family: noMansFont; font-size: 60pt; color: white" > <?= $name ?></h1>
                  <a data-toggle="modal" data-target="#delete_modal" id="button1" class="btn btn-lg btn-success" style="background: url('images/pw_maze_black_2X.png'); float: right; margin-left: 10px; margin-right: 10px;">Delete</a>
                  <a href="item.php?database_type=<?= $table; ?>&item_id=<?= $object_id; ?>&id=7&edit_var1=<?= $name ?>&edit_var2=<?= $enviroment ?>&edit_var3=<?= $climate ?>&edit_var4=<?= $life_type; ?>&edit_var5=<?= $size; ?>&edit_var6=<?=$sentinals ?>&edit_var7=<?=$minerals ?>&edit_var8=<?=$rating ?>&edit_var9=<?=$image ?>&edit_var10=<?=$extra_image ?>&edit_var11=<?=$extra_image2 ?>&edit_id=<?= $object_id; ?>&edit_table=<?= $table; ?>" id="button1" class="btn btn-lg btn-success" style="background: url('images/pw_maze_black_2X.png'); float: right; margin-left: 10px; margin-right: 10px;">Edit</a>
                  <br>
                  <br>
                  <div style="margin-top: 50px;" class="container">
                      <div class="row">
                          <div class="col-md-8">
                              <a target="_blank" href="display_media.php?media_type=image&media=<?= $image ?>&folder=<?= $table ?>&folder1=<?= $name ?>&name=<?= $name ?>"><img style="margin-left:auto; margin-right: auto; display:block;" src="<?= $find_image ?>" width="700" height="400"/></a>
                  </div>
                         <div class="col-md-3">
                      <h1 id="stat"> Creatures: <?= $no_creatures ?> </h1>
                      <h1 id="stat"> Flora: <?= $no_flora ?> </h1>
                      <h1 id="stat"> Date Discovered: <?= $date_logged ?> </h1>
                  </div>
                      </div>
                      
                      <div class="row">
                          <div class="col-md-4" style="text-align: center; margin-top: 30px;">
                                <h1 style="text-align: center; font-family: noMansFont; font-size: 45pt; color: white" > Creatures</h1>
                          <?php 
                            if($creature_count == 0){
                                ?>
                            
                                <h1 id="stat"> No Creatures discovered </h1>
                                <?php
                            }
                            else{
                                $number = 0;
                                while($number < $creature_count){
                                    
                                ?>
                                <h1 id="stat"><a style="color: white" href="item.php?database_type=creatures&item_id=<?= $creature_id_array[$number]; ?>"><?= $creature_array[$number] ?></a></h1>
                                    <?php
                                      $number++;
                                }
                            }
                            ?>
                                
                                <!--////////////////////////////////////////////////////////////////////////////////////////-->
                                
                                <h1 style="text-align: center; font-family: noMansFont; font-size: 45pt; color: white"> Flora</h1>
                          <?php 
                            if($flora_count == 0){
                                ?>
                            
                                <h1 id="stat"> No Flora discovered </h1>
                                <?php
                            }
                            else{
                                $number = 0;
                                while($number < $flora_count){
                                    
                                ?>
                                <h1 id="stat"><a style="color: white" href="item.php?database_type=flora&item_id=<?= $flora_id_array[$number]; ?>"><?= $flora_array[$number] ?></a></h1>
                                    <?php
                                      $number++;
                                }
                            }
                            ?>
                      </div>
                          <div class="col-md-7" style="text-align: center; margin-top: 30px;">
                              <h1 style="text-align: center; font-family: noMansFont; font-size: 60pt; color: white" > Bio</h1>
                              <h1 id="stat"> Star System: <a style='color: white;' href='item.php?database_type=star_systems&item_id=<?= $planet_star_id; ?>'><?= $star_system ?></a> </h1>
                              <h1 id="stat"> Parent Planet: <a style='color: white;' href='item.php?database_type=planets&item_id=<?= $parent_planet_id; ?>'><?= $parent_planet ?></a> </h1>
                      <h1 id="stat"> Enviroment: <?= $enviroment ?> </h1>
                      <h1 id="stat"> Climate: <?= $climate ?> </h1>
                      <h1 id="stat"> Life: <?= $life_type ?> </h1>
                      <h1 id="stat"> Size: <?= $size ?> </h1>
                      <h1 id="stat"> Rating: <?= $rating ?> </h1>
                      <h1 id="stat"> Sentinals: <?= $sentinals ?> </h1>
                      <h1 id="stat" style='color: black !important'> Minerals: <?= $minerals ?> </h1>
                      </div>
                      </div>
                      
                      <div class="row" style='margin-top: 20px;'>
                          <div class="col-md-6">
                              <a target="_blank" href="display_media.php?media_type=image&media=<?= $extra_image ?>&folder=<?= $table ?>&folder1=<?= $name ?>&name=<?= $name ?>"><img style="margin-left: 10px;" src="<?= $find_image1 ?>" width="550" height="340"/></a>
                  </div>
                          <div class="col-md-6">
                              <a target="_blank" href="display_media.php?media_type=image&media=<?= $extra_image2 ?>&folder=<?= $table ?>&folder1=<?= $name ?>&name=<?= $name ?>"><img src="<?= $find_image2 ?>" width="550" height="340"/></a>      
                          
                  </div>
                      </div>
                      
                      
                      </div>
                  <br>
                  <br>
                  
                  
                  <?php
                    
                    if($delete == "true"){
      //Check which database type it is
      //take all possible info
      //send through the relevant method.
      delete_moon($table , $name);}
              }else{echo "Sorry, Could not find this item";}
          break;
          
          // </editor-fold>
          
      // <editor-fold defaultstate="collapsed" desc="Creatures Case">
      case "creatures":
          
          if ($result != false){
              $object_id = $result->id;
                  $name = $result->name;
                  $life_type = $result->life_type;
                  $size = $result->size;
                  $rating = $result->rating;
                  $parent_planet = $result->parent_planet;
                  $parent_type = $result->parent_type;
                  $diet = $result->diet;
                  $image = $result->main_image;
                  $date_logged = $result->date_logged;
                  $timestamp = strtotime($date_logged);
                        $date_logged = date("H:ia  d/M/Y", $timestamp);
                        
                        if ($parent_type == "Planet"){
                            $parent_type_db = "planets";          
                        }else{
                            $parent_type_db = "moons";
                        }
                        
                        
          //parent type db is so it picks from the correct database - planets or moons
         $sql = $conn->prepare("SELECT * FROM `$parent_type_db` WHERE `name` = :id");
                  $sql->bindParam('id', $parent_planet, PDO::PARAM_INT);
                  $sql->execute();
                  
                  $result = $sql->fetchObject();
                  
                  $parent_planet_id = $result->id;
                  
                  
                  $test_var = $parent_planet_id;
                  
                  
                  $find_image = "images/$table/$image";
                  ?>
                
                  <h1 style="text-align: center; font-family: noMansFont; font-size: 60pt; color: white" > <?= $name ?></h1>
                  <a data-toggle="modal" data-target="#delete_modal" id="button1" class="btn btn-lg btn-success" style="background: url('images/pw_maze_black_2X.png'); float: right; margin-left: 10px; margin-right: 10px;">Delete</a>
                  <a href="item.php?database_type=<?= $table; ?>&item_id=<?= $object_id; ?>&id=6&edit_var1=<?= $name ?>&edit_var2=<?= $life_type ?>&edit_var3=<?= $size ?>&edit_var4=<?= $rating; ?>&edit_var5=<?= $diet; ?>&edit_var6=<?=$image ?>&edit_id=<?= $object_id; ?>&edit_table=<?= $table; ?>" id="button1" class="btn btn-lg btn-success" style="background: url('images/pw_maze_black_2X.png'); float: right; margin-left: 10px; margin-right: 10px;">Edit</a>
                  <br>
                  <br>
                  <div style="margin-top: 50px;" class="container">
                      <div class="row">
                          <div class="col-md-8">
                              <a target="_blank" href="display_media.php?media_type=image&media=<?= $image ?>&folder=<?= $table ?>&name=<?= $name ?>"><img style="margin-left:auto; margin-right: auto; display:block;" src="<?= $find_image ?>" width="700" height="400"/></a>
                  </div>
                         <div class="col-md-3">
                      <h1 id="stat"> Name: <?= $name ?> </h1>
                      <h1 id="stat"> Diet: <?= $diet ?> </h1>
                      <h1 id="stat"> Date Discovered: <?= $date_logged ?> </h1>
                  </div>
                      </div>
                      
                      <div class="row">
                         
                          <div class="col-md-12" style="text-align: center; margin-top: 30px;">
                              <h1 style="text-align: center; font-family: noMansFont; font-size: 60pt; color: white" > Bio</h1>
                              <h1 id="stat"> Parent World: <a style='color: white;' href='item.php?database_type=<?= $parent_type_db; ?>&item_id=<?= $parent_planet_id; ?>'><?= $parent_planet ?></a> </h1>
                      <h1 id="stat"> Parent Type: <?= $parent_type ?> </h1>
                      <h1 id="stat"> Domain: <?= $life_type ?> </h1>
                      <h1 id="stat"> Size: <?= $size ?> </h1>
                      <h1 id="stat"> Rating: <?= $rating ?> </h1>
                      </div>
                      </div>
                      </div>
                  <br>
                  <br>
                  
                  
                  <?php
                    
                    if($delete == "true"){
      //Check which database type it is
      //take all possible info
      //send through the relevant method.
      delete_creature($table , $name);}
              }else{echo "Sorry, Could not find this item";}
          break;
          
          // </editor-fold>
          
      // <editor-fold defaultstate="collapsed" desc="Flora Case">
      case "flora":
          
          if ($result != false){
                  $object_id = $result->id;
                  $name = $result->name;
                  $size = $result->size;
                  $rating = $result->rating;
                  $parent_planet = $result->parent_planet;
                  $parent_type = $result->parent_type;
                  $diet = $result->diet;
                  $image = $result->main_image;
                  $date_logged = $result->date_logged;
                  $timestamp = strtotime($date_logged);
                        $date_logged = date("H:ia  d/M/Y", $timestamp);
                        
                        if ($parent_type == "Planet"){
                            $parent_type_db = "planets";          
                        }else{
                            $parent_type_db = "moons";
                        }
                        
                        
          //parent type db is so it picks from the correct database - planets or moons
         $sql = $conn->prepare("SELECT * FROM `$parent_type_db` WHERE `name` = :id");
                  $sql->bindParam('id', $parent_planet, PDO::PARAM_INT);
                  $sql->execute();
                  
                  $result = $sql->fetchObject();
                  
                  $parent_planet_id = $result->id;
                  
                  
                  $test_var = $parent_planet_id;
                  
                  
                  $find_image = "images/$table/$image";
                  ?>
                
                  <h1 style="text-align: center; font-family: noMansFont; font-size: 60pt; color: white" > <?= $name ?></h1>
                  <a data-toggle="modal" data-target="#delete_modal" id="button1" class="btn btn-lg btn-success" style="background: url('images/pw_maze_black_2X.png'); float: right; margin-left: 10px; margin-right: 10px;">Delete</a>
                  <a href="item.php?database_type=<?= $table; ?>&item_id=<?= $object_id; ?>&id=5&edit_var1=<?= $name ?>&edit_var2=<?= $diet ?>&edit_var3=<?= $size ?>&edit_var4=<?= $rating; ?>&edit_var5=<?= $image; ?>&edit_id=<?= $object_id; ?>&edit_table=<?= $table; ?>" id="button1" class="btn btn-lg btn-success" style="background: url('images/pw_maze_black_2X.png'); float: right; margin-left: 10px; margin-right: 10px;">Edit</a>
                  <br>
                  <br>
                  <div style="margin-top: 50px;" class="container">
                      <div class="row">
                          <div class="col-md-8">
                              <a target="_blank" href="display_media.php?media_type=image&media=<?= $image ?>&folder=<?= $table ?>&name=<?= $name ?>"><img style="margin-left:auto; margin-right: auto; display:block;" src="<?= $find_image ?>" width="700" height="400"/></a>
                  </div>
                         <div class="col-md-3">
                      <h1 id="stat"> Name: <?= $name ?> </h1>
                      <h1 id="stat"> Diet: <?= $diet ?> </h1>
                      <h1 id="stat"> Date Discovered: <?= $date_logged ?> </h1>
                  </div>
                      </div>
                      
                      <div class="row">
                         
                          <div class="col-md-12" style="text-align: center; margin-top: 30px;">
                              <h1 style="text-align: center; font-family: noMansFont; font-size: 60pt; color: white" > Bio</h1>
                              <h1 id="stat"> Parent World: <a style='color: white;' href='item.php?database_type=<?= $parent_type_db; ?>&item_id=<?= $parent_planet_id; ?>'><?= $parent_planet ?></a> </h1>
                      <h1 id="stat"> Parent Type: <?= $parent_type ?> </h1>
                      <h1 id="stat"> Size: <?= $size ?> </h1>
                      <h1 id="stat"> Rating: <?= $rating ?> </h1>
                      </div>
                      </div>
                      </div>
                  <br>
                  <br>
                  
                  
                  <?php
                    if($delete == "true"){
      //Check which database type it is
      //take all possible info
      //send through the relevant method.
                    delete_flora($table , $name);}
                    
                    
              }else{echo "Sorry, Could not find this item";}
          break;
          
          // </editor-fold>
          
      // <editor-fold defaultstate="collapsed" desc="Ships Case">
      case "ships":
          
          if ($result != false){
              $object_id = $result->id;
                  $name = $result->name;
                  $type = $result->type;
                  $image = $result->main_image;
//                  $date_logged = $result->date_logged;
//                  $timestamp = strtotime($date_logged);
//                        $date_logged = date("H:ia  d/M/Y", $timestamp);
                        
                        
                        
                        
          //parent type db is so it picks from the correct database - planets or moons
         
                  
                  
                  $find_image = "images/$table/$image";
                  ?>
                
                  <h1 style="text-align: center; font-family: noMansFont; font-size: 60pt; color: white" > <?= $name ?></h1>
                  <a data-toggle="modal" data-target="#delete_modal" id="button1" class="btn btn-lg btn-success" style="background: url('images/pw_maze_black_2X.png'); float: right; margin-left: 10px; margin-right: 10px;">Delete</a>
                  <a href="item.php?database_type=<?= $table; ?>&item_id=<?= $object_id; ?>&id=4&edit_var1=<?= $name ?>&edit_var2=<?= $type ?>&edit_var3=<?= $image ?>&edit_id=<?= $object_id; ?>&edit_table=<?= $table; ?>" id="button1" class="btn btn-lg btn-success" style="background: url('images/pw_maze_black_2X.png'); float: right; margin-left: 10px; margin-right: 10px;">Edit</a>
                  <br>
                  <br>
                  <div style="margin-top: 50px;" class="container">
                      <div class="row">
                          <div class="col-md-8">
                              <a target="_blank" href="display_media.php?media_type=image&media=<?= $image ?>&folder=<?= $table ?>&name=<?= $name ?>"><img style="margin-left:auto; margin-right: auto; display:block;" src="<?= $find_image ?>" width="700" height="400"/></a>
                  </div>
                         <div class="col-md-3">
                             <h1 id="stat"> Name: <?= $name ?></h1>
                      <h1 id="stat"> Type: <?= $type ?> </h1>
                      <h1 id="stat"> Date Issued: Coming Soon</h1>
                      
                  </div>
                      </div>
                      
                   
                      </div>
                  <br>
                  <br>
                  
                  
                  <?php
                    
                    if($delete == "true"){
      //Check which database type it is
      //take all possible info
      //send through the relevant method.
      delete_ship($table , $name);
      
      
      
  }
            
            
              }else{echo "Sorry, Could not find this item";}
          break;
          
          // </editor-fold>
      
      default:
          echo "You Selected a random case";
          break;
      
          
  }
  
  
  // <editor-fold defaultstate="collapsed" desc="Delete Modal">
  
  ?>
                  
                  <!--////////////////////////////// DELETE MODAL ////////////////////////////// -->
                  <div class="modal fade" style="margin-top:200px;" id="delete_modal" tabindex="-1" role="dialog"
             aria-labelledby="myModalLabel5" aria-hidden="true">
            <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                   
                     
                         <div class="modal-content">
<!--        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <p1>Delete?</p1>
        </div>-->
        <div class="modal-body">
            <p1>Are you sure you want to delete this item?</p1>
            <p2>This will delete all assosiated items</p2>
        </div>
        <div class="modal-footer">
            <a href="item.php?database_type=<?= $table; ?>&item_id=<?= $id; ?>&delete=true" type="button" class="btn btn-danger">Delete</a>
            
            <button type="button" class="btn btn-success" data-dismiss="modal">Cancel</button>
          
          
        </div>
      </div>
                    
                    </div>
                </div>
            </div>
                  
                  
                  <?php
                    // </editor-fold>
                    
                    
                    
                    
                    ?>
  </body>
  
</html>

  

