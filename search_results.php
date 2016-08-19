<?php


  $current_page = "index";
  require_once('C:\xampp\htdocs\no_mans_sky\includes\db.php');
  require_once('C:\xampp\htdocs\no_mans_sky\includes\db_checking.php');
  include_once('C:\xampp\htdocs\no_mans_sky\includes\bootstrap.php');
  global $conn;
  global $galaxy_limit;
  global $star_system_limit;
  global $planet_limit;
  global $moon_limit;
  global $creature_limit;
  global $flora_limit;
  global $ship_limit;
  
  $mineral_array = array();
  $planet_name_array = array();
  $planet_mineral_array = array();
  $likely_mineral = " ";
  $contains_minerals = false;
  
  
  
  $similarity_level = 60;
  
 $search_string = "none";

if (isset($_GET['search_string'])) {
  $search_string = $_GET['search_string'];}
  $original_search = $search_string;
  
  $search_string = strtolower($search_string);
  
  
  
  
  $first = $search_string[0];
  $length = strlen($search_string);
  $last = $search_string[$length - 1];
  $temp_search_string = preg_split('/\s+/', $search_string);
  $word_count = count($temp_search_string);
  $words = str_word_count($search_string, 1);
  
//debug_to_console("Search String: $search_string //String Length: $length // First: $first // Last: $last // Word Count: $word_count // ");

  $entry_array = $exit_array = array();
  
  




// <editor-fold defaultstate="collapsed" desc="Galaxy Search Loop">
//Galaxy Search Loop
$id = 0;
$limit = $galaxy_limit;
$type = "Galaxy";
$database = "galaxy";
$id_text = "Id";
while($id <= $limit){
    
    $sql = $conn->prepare("SELECT * FROM `$database` WHERE `$id_text` = :id");
              $sql->bindParam('id', $id, PDO::PARAM_INT);
              $sql->execute();

              $result = $sql->fetchObject();
              //check the result is real
              if($result != false){
              //Get the name
              $name = $result->name;
              //Get the ID
              $id = $result->Id;
              //Get number of integers in id
              $id_length = strlen($id);
              $temp_name = strtolower($name);
              similar_text($search_string, $temp_name, $percent);
              
              if($percent >= $similarity_level){
//                 //Put name and type together
                  $name_and_type = $id." ".$database." ".$id_length;
                  
                  $entry_array += [$name_and_type => $percent];
//        echo "$name - $type - $percent <br> ";
              }
    
              }
    
    $id++;
}

// </editor-fold>

// <editor-fold defaultstate="collapsed" desc="Star System Search Loop">
//Galaxy Search Loop
$id = 0;
$limit = $star_system_limit;
$database = "star_systems";
$id_text = "ID";
while($id <= $limit){
    
    $sql = $conn->prepare("SELECT * FROM `$database` WHERE `$id_text` = :id");
              $sql->bindParam('id', $id, PDO::PARAM_INT);
              $sql->execute();

              $result = $sql->fetchObject();
              //check the result is real
              if($result != false){
              //Get the name
              $name = $result->name;
              //Get the ID
              $id = $result->$id_text;
              //Get number of integers in id
              $id_length = strlen($id);
              $temp_name = strtolower($name);
              similar_text($search_string, $temp_name, $percent);
              
              if($percent >= $similarity_level){
//                 //Put name and type together
                  $name_and_type = $id." ".$database." ".$id_length;
                  
                  $entry_array += [$name_and_type => $percent];
//        echo "$name - $type - $percent <br> ";
              }
    
              }
    
    $id++;
}

// </editor-fold>

// <editor-fold defaultstate="collapsed" desc="Planet Search Loop">
//Planet Search Loop
$id = 0;
$limit = $planet_limit;
$database = "planets";
$id_text = "id";
while($id <= $limit){
    
    $sql = $conn->prepare("SELECT * FROM `$database` WHERE `$id_text` = :id");
              $sql->bindParam('id', $id, PDO::PARAM_INT);
              $sql->execute();

              $result = $sql->fetchObject();
              //check the result is real
              if($result != false){
              //Get the name
              $name = $result->name;
              $minerals = $result->minerals;
              //Get the ID
              $id = $result->$id_text;
              //Get number of integers in id
              $id_length = strlen($id);
              $temp_name = strtolower($name);
              
              //Finding Minerals
              $minerals = $minerals." "."//";
              $mineral_length = str_word_count($minerals);
              $minerals = explode("//", $minerals);
              
              
              
              
              if($mineral_length != 0){
                 $iteration_number = 0;
                  while($iteration_number < $mineral_length){
                      
                      
                      
                      $word = $minerals[$iteration_number];
                      
                      
                    //  debug_to_console("Current Planet: $name // Current Mineral: $word // Iteration: $iteration_number // Total Minerals: $mineral_length");
                      similar_text($search_string, $word, $percentage);
                      if($percentage >= $similarity_level){
                          
                          $contains_minerals = true;
                          $likely_mineral = $word;
//                          $mineral_array += [$word => $name];
                          array_push($planet_name_array, $name);
                          array_push($planet_mineral_array, $word);
                          
                          
                      }
                     $iteration_number++; 
                  }
                  
                  
              }
              
              
              
              
              similar_text($search_string, $temp_name, $percent);
              
              if($percent >= $similarity_level){
//                 //Put name and type together
                  $name_and_type = $id." ".$database." ".$id_length;
                  
                  $entry_array += [$name_and_type => $percent];
//        echo "$name - $type - $percent <br> ";
              }
    
              }
    
    $id++;
}

// </editor-fold>

// <editor-fold defaultstate="collapsed" desc="Moon Search Loop">
//Moon Search Loop
$id = 0;
$limit = $moon_limit;
$database = "moons";
$id_text = "id";
while($id <= $limit){
    
    $sql = $conn->prepare("SELECT * FROM `$database` WHERE `$id_text` = :id");
              $sql->bindParam('id', $id, PDO::PARAM_INT);
              $sql->execute();

              $result = $sql->fetchObject();
              //check the result is real
              if($result != false){
              //Get the name
              $name = $result->name;
              
              $minerals = $result->Minerals;
              //Get the ID
              $id = $result->$id_text;
              //Get number of integers in id
              $id_length = strlen($id);
              $temp_name = strtolower($name);
              
              //Finding Minerals
              $minerals = $minerals." "."//";
              $mineral_length = str_word_count($minerals);
              $minerals = explode("//", $minerals);
              
              
              
              
              if($mineral_length != 0){
                 $iteration_number = 0;
                  while($iteration_number < $mineral_length){
                      
                      
                      
                      $word = $minerals[$iteration_number];
                      
                      
                      
                      similar_text($search_string, $word, $percentage);
                      if($percentage >= $similarity_level){
         //                 debug_to_console("Current Planet: $name // Current Mineral: $word // Iteration: $iteration_number // Total Minerals: $mineral_length");
                          
                          $contains_minerals = true;
                          $likely_mineral = $word;
//                          $mineral_array += [$word => $name];
                          array_push($planet_name_array, $name);
                          array_push($planet_mineral_array, $word);
                          
                          
                          
                      }
                     $iteration_number++; 
                  }
                  
                  
              }
              similar_text($search_string, $temp_name, $percent);
              
              if($percent >= $similarity_level){
//                 //Put name and type together
                  $name_and_type = $id." ".$database." ".$id_length;
                  
                  $entry_array += [$name_and_type => $percent];
//        echo "$name - $type - $percent <br> ";
              }
    
              }
    
    $id++;
}

// </editor-fold>

// <editor-fold defaultstate="collapsed" desc="Creature Search Loop">
//Creature Search Loop
$id = 0;
$limit = $creature_limit;
$database = "creatures";
$id_text = "id";
while($id <= $limit){
    
    $sql = $conn->prepare("SELECT * FROM `$database` WHERE `$id_text` = :id");
              $sql->bindParam('id', $id, PDO::PARAM_INT);
              $sql->execute();

              $result = $sql->fetchObject();
              //check the result is real
              if($result != false){
              //Get the name
              $name = $result->name;
              //Get the ID
              $id = $result->$id_text;
              //Get number of integers in id
              $id_length = strlen($id);
              $temp_name = strtolower($name);
              similar_text($search_string, $temp_name, $percent);
              
              if($percent >= $similarity_level){
//                 //Put name and type together
                  $name_and_type = $id." ".$database." ".$id_length;
                  
                  $entry_array += [$name_and_type => $percent];
//        echo "$name - $type - $percent <br> ";
              }
    
              }
    
    $id++;
}

// </editor-fold>

// <editor-fold defaultstate="collapsed" desc="Flora Search Loop">
//Flora Search Loop
$id = 0;
$limit = $flora_limit;
$database = "flora";
$id_text = "id";
while($id <= $limit){
    
    $sql = $conn->prepare("SELECT * FROM `$database` WHERE `$id_text` = :id");
              $sql->bindParam('id', $id, PDO::PARAM_INT);
              $sql->execute();

              $result = $sql->fetchObject();
              //check the result is real
              if($result != false){
              //Get the name
              $name = $result->name;
              //Get the ID
              $id = $result->$id_text;
              //Get number of integers in id
              $id_length = strlen($id);
              $temp_name = strtolower($name);
              similar_text($search_string, $temp_name, $percent);
              
              if($percent >= $similarity_level){
//                 //Put name and type together
                  $name_and_type = $id." ".$database." ".$id_length;
                  
                  $entry_array += [$name_and_type => $percent];
//        echo "$name - $type - $percent <br> ";
              }
    
              }
    
    $id++;
}

// </editor-fold>

// <editor-fold defaultstate="collapsed" desc="Ship Search Loop">
//Ship Search Loop
$id = 0;
$limit = $ship_limit;
$database = "ships";
$id_text = "id";
while($id <= $limit){
    
    $sql = $conn->prepare("SELECT * FROM `$database` WHERE `$id_text` = :id");
              $sql->bindParam('id', $id, PDO::PARAM_INT);
              $sql->execute();

              $result = $sql->fetchObject();
              //check the result is real
              if($result != false){
              //Get the name
              $name = $result->name;
              //Get the ID
              $id = $result->$id_text;
              //Get number of integers in id
              $id_length = strlen($id);
              $temp_name = strtolower($name);
              similar_text($search_string, $temp_name, $percent);
              
              if($percent >= $similarity_level){
//                 //Put name and type together
                  $name_and_type = $id." ".$database." ".$id_length;
                  
                  $entry_array += [$name_and_type => $percent];
//        echo "$name - $type - $percent <br> ";
              }
    
              }
    
    $id++;
}

// </editor-fold>




 
    
    

?>
<html>
    <style>
        body{
        background: url(images/background13.jpg) no-repeat center center fixed; 
/*  -webkit-background-size: cover;*/
/*  -moz-background-size: cover;*/
/*  -o-background-size: cover;
  background-size: cover;*/
    }
    .outline{
    text-shadow:
                    /* Outline */
                    -1px -1px 0 #000000,
                    1px -1px 0 #000000,
                    -1px 1px 0 #000000,
                    1px 1px 0 #000000,  
                    -2px 0 0 #000000,
                    2px 0 0 #000000,
                    0 2px 0 #000000,
                    0 -2px 0 #000000; /* Terminate with a semi-colon */
            }
            
    </style>
    <body>
<div class="container" style="margin-bottom: 30px;">
<?php
  
 

//Exit Loop
//Sort the array in descending order so it will start with the highest match
arsort($entry_array);
$entry_count = count($entry_array);
$minerals_count = count($planet_name_array);
$no_results = $entry_count + $minerals_count;

?>
    <h1 id="outline" style="margin-bottom: 30px; font-family: noMansFont; font-size: 30pt; font-weight: bold; color: white; " > <?= $no_results; ?> Results Found For '<?= $original_search; ?>'</h1>
    <?php

//For each item in the array - Do This
foreach ($entry_array as $key => $val){
    
//    echo "$key = $val\n  <br>";
    $id = "";
    $name_and_type = str_word_count($key, 1);
    //The type is the first word in the array - Numbers do not count as words
    $type = $name_and_type[0];
    //Different labels for different things
    $id_text = "id";
    $image_text = "main_image";
    //Counts the _ as a space in star systems
    if($type == "star"){
        $type = "star_systems";
        $id_text = "ID";
        $image_text = "image";
    }
    //Gets the length of the key string
    $key_length = strlen($key);
    //Gets the length of the id by getting the last number on the key string 
    $id_length = $key[$key_length - 1];
    //Sets the iteration back to 0
    $iteration = 0;
    //Get each digit in the id
    
    while($iteration <= $id_length){
        //Adds the next charachter from the key string in the id variable
        $id = $id . $key[$iteration];
        //adds 1 to the iteration value
        $iteration++;
    }
    //Round the percentage to a whole number
    $percent = round($val);   
    
    $type_display = $type;
if($type == "galaxy"){$type_display = "Galaxy"; $id_text = "Id";}
if($type == "star" OR $type == "star_systems"){$type_display = "Star System";}
if($type == "planets"){$type_display = "Planet";}
if($type == "moons"){$type_display = "Moon";}
if($type == "creatures"){$type_display = "Creature";}
if($type == "flora"){$type_display = "Flora";}
if($type == "ships"){$type_display = "Ship";}
    
    //Get the object from the database
$sql = $conn->prepare("SELECT * FROM `$type` WHERE `$id_text` = :id");
              $sql->bindParam('id', $id, PDO::PARAM_INT);
              $sql->execute();

              $result = $sql->fetchObject();
              //check the result is real
              if($result != false){
              //Get the name
              $name = $result->name;
              if($type == "galaxy"){
                  $image = "galaxy.png";
              }else{
              $image = $result->$image_text;
              }
              
              
}

$image_location = "images/$type/$image";

if($type == "galaxy"){
    $image_location = "images/galaxy.jpg";
}

if($type == "planets" OR $type == "moons"){
    $folder = $name;
    $image_location = "images/$type/$folder/$image";
}

if($image == NULL){
    $image_location = "images/image_not_found.jpg";
}

$mineral_text = NULL;



?>
    
    

<div class="row" style="margin-right: 500px;">
    
    <div class="col-md-5" style="margin-top: 20px;">
    
        <a href="item.php?database_type=<?= $type; ?>&item_id=<?= $id; ?>"><img style="margin-left:auto; display:block;" src="<?= $image_location; ?>" width="323" height="200"/></a>
    
    </div>
    <div class="col-md-6" style="margin-left: 54px;">
        <a href="item.php?database_type=<?= $type; ?>&item_id=<?= $id; ?>" style="color: white;" ><h1 style="font-family: noMansFont;font-size: 40pt; color: white;" ><?= $name; ?></h1></a>
    <h2 style="font-family: noMansFont;font-size: 15pt; color: white;" ><?= $type_display;?> <?= $mineral_text;?></h2>
    <h2 style="font-family: noMansFont;font-size: 10pt; color: white;" ><?= $percent; ?>% Match</h2>
    
    </div>
    
</div>

    



<?php
  
//echo "Name: $name <br> Type: $type <br> Similarity: $percent% <br><br> <br>";
}



if($contains_minerals == true){
    
    
    
    
    
    $mineral_count = count($planet_name_array);
        $iteration_number = 0;
        while($iteration_number < $mineral_count){
        
        
        $planet_name = $planet_name_array[$iteration_number];
        $planet_mineral = $planet_mineral_array[$iteration_number];    
        
            $sql = $conn->prepare("SELECT * FROM `planets` WHERE `name` = :id");
              $sql->bindParam('id', $planet_name, PDO::PARAM_INT);
              $sql->execute();

              $result = $sql->fetchObject();
              //check the result is real
              if($result != false){
                  $type = "planets";
                  $type_display = "Planet";
                  $id = $result->id;
                  $image = $result->main_image;
                  $image_location = "images/planets/$planet_name/$image";
                  
                  $mineral_text = "Contains $planet_mineral";
                  
                  
              
            
        
        ?>
        
        
        <div class="row" style="margin-right: 500px;">
    
    <div class="col-md-5" style="margin-top: 20px;">
    
        <a href="item.php?database_type=<?= $type; ?>&item_id=<?= $id; ?>"><img style="margin-left:auto; display:block;" src="<?= $image_location; ?>" width="323" height="200"/></a>
    
    </div>
    <div class="col-md-6" style="margin-left: 54px;">
        <a href="item.php?database_type=<?= $type; ?>&item_id=<?= $id; ?>" style="color: white;" ><h1 style="font-family: noMansFont;font-size: 40pt; color: white;" ><?= $planet_name; ?></h1></a>
    <h2 style="font-family: noMansFont;font-size: 15pt; color: white;" ><?= $type_display;?></h2>
    <h2 style="font-family: noMansFont;font-size: 15pt; color: white;" ><?= $mineral_text;?></h2>
    
    </div>
    
</div>
    <?php
        
        
               }
   $iteration_number++;}
   
  $iteration_number = 0;
        while($iteration_number < $mineral_count){
        
        
        $planet_name = $planet_name_array[$iteration_number];
        $planet_mineral = $planet_mineral_array[$iteration_number]; 
        
            $sql = $conn->prepare("SELECT * FROM `moons` WHERE `name` = :id");
              $sql->bindParam('id', $planet_name, PDO::PARAM_INT);
              $sql->execute();

              $result = $sql->fetchObject();
              //check the result is real
              if($result != false){
                  $type = "moons";
                  $type_display = "Moon";
                  $id = $result->id;
                  $image = $result->main_image;
                  $image_location = "images/moons/$planet_name/$image";
                  
                  $mineral_text = "Contains $planet_mineral";
                  
                  
              
            
        
        ?>
        
        
        <div class="row" style="margin-right: 500px;">
    
    <div class="col-md-5" style="margin-top: 20px;">
    
        <a href="item.php?database_type=<?= $type; ?>&item_id=<?= $id; ?>"><img style="margin-left:auto; display:block;" src="<?= $image_location; ?>" width="323" height="200"/></a>
    
    </div>
    <div class="col-md-6" style="margin-left: 54px;">
        <a href="item.php?database_type=<?= $type; ?>&item_id=<?= $id; ?>" style="color: white;" ><h1 style="font-family: noMansFont;font-size: 40pt; color: white;" ><?= $planet_name; ?></h1></a>
    <h2 style="font-family: noMansFont;font-size: 15pt; color: white;" ><?= $type_display;?></h2>
    <h2 style="font-family: noMansFont;font-size: 15pt; color: white;" ><?= $mineral_text;?></h2>
    
    </div>
    
</div>
    <?php
        
        
               }
   $iteration_number++;}
    
}



//$name = "test ";
//similar_text($search_string, $name, $percent);
//echo "Similarity: $percent";

?>

</div>
    </body>
</html>


