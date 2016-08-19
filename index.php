<!DOCTYPE html>
<?php
  $current_page = "index";
  require_once('C:\xampp\htdocs\no_mans_sky\includes\db.php');
  require_once('C:\xampp\htdocs\no_mans_sky\includes\db_checking.php');
  include_once('C:\xampp\htdocs\no_mans_sky\includes\bootstrap.php');
  global $conn;
  global $planet_limit;
  global $moon_limit;
  date_default_timezone_set("Europe/London"); 
  
  //TESTING SAVE DATABASE
  
//  backup_tables('localhost','root','','no_man_sky');
  
  //Get the fact 
  $fact_number = mt_rand(1,18);
  $fact = get_fact($fact_number);
  
  //Get the randomly Discovered Item
  
  
  
  //Get the latest discovered world.
  //Check the planet limit is above 0
  if($planet_limit >= 6){
      
      $limit = $planet_limit - 2;
      $world_array = array();
      $id = $planet_limit;
      $type = "P";
      while($id >= $limit){
       $sql = $conn->prepare("SELECT * FROM `planets` WHERE `id` = :id");
              $sql->bindParam('id', $id, PDO::PARAM_INT);
              $sql->execute();

              $result = $sql->fetchObject();
              //check the result is real
              if($result != false){
                  
                  $object_id = $result->id;
                  $id_length = strlen($object_id);
                  $id_and_type = $object_id." ".$type." ".$id_length;
                  $date = $result->date_logged;
                  $date = time() - strtotime($date);
                  
                  $world_array += [$id_and_type => $date];
                  
              }$id--;
              
              
      }
      
      
      $limit = $moon_limit - 2;
      
      $id = $moon_limit;
      $type = "M";
      while($id >= $limit){
       $sql = $conn->prepare("SELECT * FROM `moons` WHERE `id` = :id");
              $sql->bindParam('id', $id, PDO::PARAM_INT);
              $sql->execute();

              $result = $sql->fetchObject();
              //check the result is real
              if($result != false){
                  
                  $object_id = $result->id;
                  $id_length = strlen($object_id);
                  $id_and_type = $object_id." ".$type." ".$id_length;
                  $date = $result->date_logged;
                  $date = time() - strtotime($date);
                  
                  $world_array += [$id_and_type => $date];
                  
              }$id--;
              
              
      }
              
  
  
  //Deciphering result
  asort($world_array);
  $no_results = count($world_array);
  
  $key = array_keys($world_array);
  $val = array_values($world_array);
  
  
//  debug_to_console("KEY-0: $key[0] // VAL-0: $val[0]");
  
  
  $image_array = $name_array = $caption_array = $id_array = $type_array =  array();
  
  
 
  
  $id = 0;
  while($id <= 2){
      $final_id = "";
      
      $current_key = $key[$id];
      $current_val = $val[$id];
      $type = str_word_count($current_key, 1);
      
      //Get and change the type
      if($type[0] == "P"){
          $type = "Planet";
          $type_table = "planets";
      }else{
          $type = "Moon";
          $type_table = "moons";
      }
      $key_length = strlen($current_key);
      
      $id_length = $current_key[$key_length - 1];
      
      
      $iteration = 0;
    //Get each digit in the id
      
      
    
    while($iteration <= $id_length){
        //Adds the next charachter from the key string in the id variable
        $final_id = $final_id . $current_key[$iteration];
        
        //adds 1 to the iteration value
        $iteration++;
    }
    
    $sql = $conn->prepare("SELECT * FROM `$type_table` WHERE `id` = :id");
              $sql->bindParam('id', $final_id, PDO::PARAM_INT);
              $sql->execute();

              $result = $sql->fetchObject();
              //check the result is real
              if($result != false){
                  $image_number = mt_rand(1,3);
                  
                  if($image_number == 1){
                      $image = $result->main_image;
                  }
                  else if($image_number == 2){
                      $image = $result->extra_image2;
                  }
                  else if($image_number == 3){
                      if($type_table == "planets"){
                          $image = $result->extra_image;
                      }
                      else{
                          $image = $result->extra_image1;
                      }
                  }
                  
                  $name = $result->name;
                  
                  $star_system = $result->star_system;
              }
              $image = "images/$type_table/$name/$image";
              $seconds = $current_val;
              
//              debug_to_console("Seconds: $seconds");
              if($seconds < 60){
                  //Time in seconds
                  if($seconds == 1){
                      $verb = "Second Ago";
                  }else{
                      $verb = "Seconds Ago";
                  }
                  
                  $time = "$seconds $verb";
                  
              }
              else if($seconds < 3600){
                  //Time in minutes
                  
                  
                  $minutes = floor($seconds / 60);
                  if($minutes == 1){
                      $verb = "Minute Ago";
                  }else{
                      $verb = "Minutes Ago";
                  }
                  
                  $time = "$minutes $verb";
                  
                  
              }
              else if($seconds < 86400){
                  //Time in Hours
                  
                  
                  $hours = floor(($seconds / 60) / 60);
                  if($hours == 1){
                      $verb = "Hour Ago";
                  }else{
                      $verb = "Hours Ago";
                  }
                  $time = "$hours $verb";
              }
              else if($seconds < 172800){
                  //Time Yesterday
                  
                  $time = "Yesterday";
              }
              else if($seconds < 604800){
                  //Time in days
                  
                  
                  $days = floor((($seconds / 60) / 60) / 24);
                  $time = "$days Days Ago";
              }
              else if($seconds < 2419200){
                  //Time in Weeks
                  
                  
                  $weeks = floor(((($seconds / 60) / 60) / 24) / 7);
                  if($weeks == 1){
                      $verb = "Week Ago";
                  }else{
                      $verb = "Weeks Ago";
                  }
                  
                  $time = "$weeks $verb";
              }
              else{
                  //Time in Months
                  
                  
                  $months = floor((((($seconds / 60) / 60) / 24) / 7) / 4);
                  if($months == 1){
                      $verb = "Month Ago";
                  }else{
                      $verb = "Months Ago";
                  }
                  $time = "$months $verb";
              }
              
              
              $caption = "$type Discovered $time in the $star_system System";
              
              array_push($name_array, $name);
              array_push($image_array, $image);
              array_push($caption_array, $caption);
              array_push($id_array, $final_id);
              array_push($type_array, $type_table);
    
    
    
    $seconds = $current_val;
    $minutes = $seconds / 60;
    $hours = $minutes / 60;
    
    $id++;
    
    
    
//      debug_to_console("Key: $current_key, Type: $type, ID: $final_id, Hours: $hours");
      
  }
  }
  
 // debug_to_console("Name: $name_array[0], Image: $image_array[0], Caption: $caption_array[0] // Name: $name_array[1], Image: $image_array[1], Caption: $caption_array[1] // Name: $name_array[2], Image: $image_array[2], Caption: $caption_array[2]");

  
  
  //Create a fact function in db checking
  //Randomise a number and enter it into the fact function to return a random fact
  //Display the fact
  
  //Create a save database function
  
  //Create a random discovery function
  //A function that based off a number will return a random id and database. 
  ?>

<style>
    body{
        background: url(images/background14.jpg) no-repeat center center fixed; 
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
    }
    
    .carousel .item {
  height: 500px;
}

#captions{
    font-family: noMansFont;
     
    text-shadow:
                    /* Outline */
                    -1px -1px 0 #000000,
                    1px -1px 0 #000000,
                    -1px 1px 0 #000000,
                    1px 1px 0 #000000,  
                    -2px 0 0 #000000,
                    2px 0 0 #000000,
                    0 2px 0 #000000,
                    0 -2px 0 #000000;
}
    
    
</style>

<body>
   
   <?php
     
     //Also have a save to database button
     //Random Fact
     ?>
    
    <div class="container-fluid">
        
        <div class="col-md-10">
            
            <?php
              if($planet_limit < 6){
                  
                  //Do the welcome bit
              ?>
            
            <h1 style="color: black; font-family: noMansFont; font-size: 40pt; text-align: center; font-weight: bold;">W E L C O M E</h1>
      <p style="color: black; font-family: noMansFont; font-size: 25pt; margin-top: 20px; font-weight: bold;">Joe Mans Sky is a tool to log your progress across the unverse. From entire galaxies to a small plant
      - anything you come across can be logged. Just click on the ✚ symbol in the top right to start logging. 
      When something is logged it will immediately become available to view and compare. </p>
            <?php
              }
              else{
                  //Do the carousel
                  ?>
      
      <div style="height: 500px; width: 1050px; margin-left: auto; margin-right: auto;" id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
        <div class="item active">
          <img src="<?= $image_array[0];?>" alt="item1" width="1050" height="500">
        <div class="carousel-caption">
            <a style="color: white;" href="item.php?database_type=<?= $type_array[0]; ?>&item_id=<?= $id_array[0];?>"><h3 id="captions" style="font-size: 25pt;"><?= $name_array[0];?></h3>
                <p id="captions" style="font-size: 17pt;"><?= $caption_array[0];?></p></a>
        </div>
      </div>

      <div class="item">
        <img src="<?= $image_array[1];?>" alt="item2" width="1050" height="100">
        <div class="carousel-caption">
          <a style="color: white;" href="item.php?database_type=<?= $type_array[1]; ?>&item_id=<?= $id_array[1];?>"><h3 id="captions" style="font-size: 25pt;"><?= $name_array[1];?></h3>
              <p id="captions" style="font-size: 17pt;"><?= $caption_array[1];?></p></a>
        </div>
      </div>
    
      <div class="item">
        <img src="<?= $image_array[2];?>" alt="item3" width="1050" height="100">
        <div class="carousel-caption">
          <a style="color: white;" href="item.php?database_type=<?= $type_array[2]; ?>&item_id=<?= $id_array[2];?>"><h3 id="captions" style="font-size: 25pt;"><?= $name_array[2];?></h3>
              <p id="captions" style="font-size: 17pt;"><?= $caption_array[2];?></p></a>
        </div>
      </div>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
</div>
      
      <?php
                  
                  
              }
              
              ?>
              
              
            
        </div>
        
        <div class="col-md-2 card card-inverse" style="background-color: #333; border-color: #333;">
  <div class="card-block">
    <h3 style="color: white; text-align: center;" class="card-title">Periodic Table</h3>
    <p style="color: white; text-align: center;" class="card-text">View all of the elements in the no mans sky database and their galactic value.</p>
    <a style="margin-bottom: 20px; margin-left: auto; margin-right: auto; display: block;" href="periodic_table.php" class="btn btn-success">View Table</a>
  </div>
</div>
        
        <div class="col-md-2 card card-inverse" style="background-color: #333; border-color: #333; margin-top: 50px;">
  <div class="card-block">
    <h3 style="color: white; text-align: center;" class="card-title">Random Discovery</h3>
    <p style="color: white; text-align: center;" class="card-text">Go to a discovery at random. This can be anything from a star
    to a ship.</p>
    <a style="margin-bottom: 20px; margin-left: auto; margin-right: auto; display: block;" href="item.php?database_type=<?= $item_array[0]; ?>&item_id=<?= $item_array[1]; ?>" class="btn btn-primary">Let's Go</a>
  </div>
</div>
    </div>
    
<div class="card" style="background-color: #333; border-color: #333; margin-top: 50px; width: 500px;  margin-left: auto; margin-right: auto; margin-bottom: 30px;">
  <div class="card-block">
    <h3 style="color: white; text-align: center; padding-top: 15px; font-family: noMansFont; font-size: 20pt; font-weight: bold;" class="card-title">F A C T!</h3>
    <p style="color: white; text-align: center; padding-bottom: 15px; padding-left: 10px; padding-right: 10px; font-family: noMansFont; font-size: 20pt;" class="card-text"><?= $fact; ?></p>
  </div>
</div>
    
    
    
</body>

<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

