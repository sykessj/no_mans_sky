<style>
    
    
    
    

#center_aligned{
        text-align: right;
        block: inline;
        font-family: noMansFont;
    }
    
    #stat {
        font-family: noMansFont;
        font-size: 25pt;
        color: white !important;
    }
    
    body{
        background-image: url("images/background3.jpg");
    }

</style>

<body>

<?php

$current_page = "index";
  require_once('C:\xampp\htdocs\no_mans_sky\includes\db.php');
  require_once('C:\xampp\htdocs\no_mans_sky\includes\db_checking.php');
  include('C:\xampp\htdocs\no_mans_sky\includes\bootstrap.php');
  global $planet_limit;
  global $moon_limit;
  global $creature_limit;
  $test_var = "No Change";
  
  $table = "";
  $id = 0;
  $item_name = "";
  
  
  if (isset($_GET['database_type'])) {
  $table = $_GET['database_type'];}
  
  if (isset($_GET['item_id'])) {
  $id = $_GET['item_id'];}
  
  if (isset($_GET['item_name'])) {
  $item_name = $_GET['item_name'];}
  
  
  
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
  
  switch($table){
      // <editor-fold defaultstate="collapsed" desc="Galaxy Case">
      case "galaxy":
          
              if ($result != false){
                  
                  $name = $result->name;
                  $no_star_systems = $result->no_star_systems;
                  $no_planets = $result->no_planets;
                  $no_moons = $result->no_moons;
                  $no_creatures = $result->no_creatures;
                  $no_flora = $result->no_flora;
                  
                  ?>

                <h1 style="text-align: center; font-family: noMansFont; font-size: 60pt" > <?= $name ?> Galaxy</h1>
                <br>

                <div style="margin-left: auto; margin-right:auto; width: 140px;">    
                <h3 id="center_aligned"> Star Systems: <?= $no_star_systems ?></h3>
                <h3 id="center_aligned"> Planets: <?= $no_planets ?></h3>
                <h3 id="center_aligned"> Moons: <?= $no_moons ?></h3>
                <h3 id="center_aligned"> Creatures: <?= $no_creatures ?></h3>
                <h3 id="center_aligned"> Flora: <?= $no_flora ?></h3>
                
<!--                <img src="<?= ($image_location . $result->img_url); ?>" width="300" height="200"/>-->
                
                </div>
                <img style="margin-left:auto; margin-right: auto; display:block;" src="images/no_mans_sky.png" width="300" height="200"/>

<?php
                  
              }else{echo "Sorry, Could not find this item";}
              
              
              
          break;
      // </editor-fold>
          
      // <editor-fold defaultstate="collapsed" desc="Star Systems Case">
      case "star_systems":
          
          if ($result != false){
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
          $test_var = $planet_count;
                  
                  
                  $find_image = "images/$table/$name/$image";
                  ?>
                
                  <h1 style="text-align: center; font-family: noMansFont; font-size: 60pt; color: white" > <?= $name ?> System</h1>
                  <button class="btn btn-lg btn-success" style="background: url('images/background3.jpg'); float: right; margin-left: 10px; margin-right: 10px;">Edit Record</button>
                  <button class="btn btn-lg btn-success" style="background: url('images/background3.jpg'); float: right;">Delete Record</button>
                  <br>
                  <br>
                  <div style="margin-top: 50px;" class="container">
                      <div class="row">
                          <div class="col-md-8">
                  <img style="margin-left:auto; margin-right: auto; display:block;" src="<?= $find_image ?>" width="700" height="400"/>
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
                          <h1 id="stat"> Galaxy: <?= $galaxy ?> </h1>
                      <h1 id="stat"> Star Type: <?= $star_type ?> </h1>
                      <h1 id="stat"> Star Colour: <?= $star_colour ?> </h1>
                      </div>
                      </div> 
                      
                      
                      </div>
                  <br>
                  <br>
                  
                  
                  <?php
              }else{echo "Sorry, Could not find this item";}
          break;
          
          // </editor-fold>
          
      // <editor-fold defaultstate="collapsed" desc="Planets Case">
      case "planets":
          
          if ($result != false){
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
                  <button class="btn btn-lg btn-success" style="background: url('images/background3.jpg'); float: right; margin-left: 10px; margin-right: 10px;">Delete Record</button>
                  <button class="btn btn-lg btn-success" style="background: url('images/background3.jpg'); float: right;">Edit Record</button>
                  <br>
                  <br>
                  <div style="margin-top: 50px;" class="container">
                      <div class="row">
                          <div class="col-md-8">
                  <img style="margin-left:auto; margin-right: auto; display:block;" src="<?= $find_image ?>" width="700" height="400"/>
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
                  <img style="margin-left: 10px;" src="<?= $find_image1 ?>" width="550" height="340"/>
                  </div>
                          <div class="col-md-6">
                        <img src="<?= $find_image2 ?>" width="550" height="340"/>      
                          
                  </div>
                      </div>
                      
                      
                      </div>
                  <br>
                  <br>
                  
                  
                  <?php
              }else{echo "Sorry, Could not find this item";}
          break;
          
          // </editor-fold>
      
      default:
          echo "You Selected a random case";
          break;
      
          
  }
  ?>
  </body>
  
  

