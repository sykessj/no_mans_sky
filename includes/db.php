<?php

   session_start();

   $server = "localhost";
   $username = "root";
   $password = "";
   $database = "no_man_sky";

   try {
      $conn = new PDO("mysql:host=$server;dbname=$database", $username,
	      $password, array(
//		causes the connection to be persistent.		
	  PDO::ATTR_PERSISTENT => true
      ));
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   } catch (Exception $ex) {
      $ex->getTrace();
   }
   
   $id = 1;
   $sql = $conn->prepare("SELECT * FROM `limits` WHERE `id` = :id");
              $sql->bindParam('id', $id, PDO::PARAM_INT);
              $sql->execute();

              $result = $sql->fetchObject();
              
              $galaxy_limit = $result->galaxy;
              $star_system_limit = $result->star_systems;
              $planet_limit = $result->planets;
              $moon_limit = $result->moons;
              $creature_limit = $result->creatures;
              $flora_limit = $result->flora;
              $ship_limit = $result->ships;
              $media_limit = $result->media;
              
 
    
      //information about planets        
              
    $planet_info_array = array();
    $complex = 0;
    $baron = 0;
    $extreme_heat = 0;
    $extreme_cold = 0;
    $toxic = 0;
    $huge = 0;
    $tiny = 0;
    $perfect_rating = 0;
    $radioactive = 0;
    
    $id = 0;
    global $planet_limit;
    global $moon_limit;
    $switch = 0;
    
//    echo '<script>alert("hello");</script>';
    while($id <= ($planet_limit + $moon_limit)){
    
        if($switch == 0){
        $database = "planets";
    $current_limit = $planet_limit;
        }
    
       if($id == ($planet_limit + 1) && $switch == 0){
           $database = "moons";
           $current_limit = $moon_limit;
           $id = 0;
           $switch = 1;
       } 
    
    

    $sql = $conn->prepare("SELECT * FROM `$database` WHERE `id` = :id");
              $sql->bindParam('id', $id, PDO::PARAM_INT);
              $sql->execute();

              $result = $sql->fetchObject();
              //check the result is real
              if($result != false){
                  $name = $result->name;
                  
                  $enviroment = $result->enviroment;
                  $life_type = $result->life_type;
                  $size = $result->size;
                  $rating = $result->rating;
                  
                  
                  if($enviroment == "Toxic"){
                      $toxic++;
                      
                  }
                  if($enviroment == "Extreme Heat"){
                      $extreme_heat++;
                  }
                  if($enviroment == "Extreme Cold"){
                      $extreme_cold++;
                  }
                  
                  if($enviroment == "Radioactive"){
                      $radioactive++;
                  }
                  if($life_type == "Abundant"){
                      $complex++;
                  }
                  if($life_type == "None"){
                      $baron++;
                  }
                  if($size == "Huge"){
                      $huge++;
                  }
                  if($size == "Tiny"){
                      $tiny++;
                  }
                  if($rating == 10){
                      $perfect_rating++;
                  }
                  
                  
                  
    }
    $id++;
    
}

array_push($planet_info_array, $toxic, $extreme_heat, $extreme_cold, $complex, $baron, $huge, $tiny, $perfect_rating, $radioactive);



                  
              

