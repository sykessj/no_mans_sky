<?php
  require_once("../includes/db.php");
  require_once('C:\xampp\htdocs\no_mans_sky\includes\db_checking.php');
  include('C:\xampp\htdocs\no_mans_sky\includes\bootstrap.php');
  global $conn;
  global $galaxy_limit;
  
  //possible global variable or stored in another database
  //limit for different databases
  
  $data_array = array();
  //Inital link id
  $link_id = 1;
  //If another link id has been given in the URL that will become th enew link id
  if (isset($_GET['id'])) {
  $link_id = $_GET['id'];
  }
  echo $link_id;
  

  
  
  
 //If the link id is 1 - the initial id
  
  
  //////////////// TEST sort by id //////////////////
  if ($link_id == 1){
      //Need to get the normal table in an array
      //get by ID
      
      //going to introdce table limits with a database for the highest number in each table.
      $limit = 4;
      $id = 1;
      
      
        while ($id < $limit){
      //test database unsorted
      $sql = $conn->prepare("SELECT * FROM `test` x");
              $sql->bindParam('id', $id, PDO::PARAM_INT);
              $sql->execute();

              $result = $sql->fetchObject();
              
              $data = $result->ID;
              
              array_push($data_array, $data);
              
              $id++;
     }
     
     $array_count = count($data_array);
     $table = "test";
     $field = "ID"; 
  }
  
  
  
  
  
  /////////////////// TEST sort by name /////////////////
  
  if ($link_id == 2){
      echo "2 is the link id";
      $limit = 4;
      $id = 1;
      
      
        while ($id < $limit){
      //test database unsorted
      $sql = $conn->prepare("SELECT * FROM `test` WHERE `id` = :id");
              $sql->bindParam('id', $id, PDO::PARAM_INT);
              $sql->execute();

              $result = $sql->fetchObject();
              
              $data = $result->name;
              
              array_push($data_array, $data);
              
              
              $id++;
     }
     
     sort($data_array);
     $array_count = count($data_array);
     $table = "test";
     $field = "name";
  }
  
  
  
  
  //////////// TEST2 sorted by planet id /////////////////////
  if ($link_id == 3){
     
      //do test2
      
      echo "3 is the link id";
      $limit = 7;
      $id = 1;
      
      
        while ($id < $limit){
      //test database unsorted
      $sql = $conn->prepare("SELECT * FROM `test2` WHERE `planet_id` = :id");
              $sql->bindParam('id', $id, PDO::PARAM_INT);
              $sql->execute();

              $result = $sql->fetchObject();
              
              if($result != false){
              
              $data = $result->planet_id;
              
              array_push($data_array, $data);
              
              }
              else{
                  
              }
              
              
              $id++;
     }
     
     $array_count = count($data_array);
     $table = "test2";
     $field = "planet_id";
    }
    
    
    ///////////////////TEST2 sorted by rating
  if ($link_id == 4){
      $limit = 7;
      $id = 1;
      
      $test_array = array();
      $test_array2 = array();
        while ($id < $limit){
      //test database unsorted
      $sql = $conn->prepare("SELECT * FROM `test2` WHERE `planet_id` = :id");
              $sql->bindParam('id', $id, PDO::PARAM_INT);
              $sql->execute();

              $result = $sql->fetchObject();
              
              if ($result != false){
              $planet_id = $result->planet_id;
              $data = $result->rating;
              $count = 1;
              //array_push($data_array, $data);
             $test_array += [$planet_id => $data];
             
              }
              else {}
              
              
              $id++;
     }
     
     arsort($test_array);
     print_r($test_array);
     foreach ($test_array as $key => $val) {
    echo "$key = $val\n";
    array_push($data_array, $key);
}
     print_r($data_array);
     //sort($data_array);
     $array_count = count($data_array);
     $table = "test2";
     $field = "planet_id";
    }
  
  if ($link_id === 5){
      $limit = 2;
      //do test2 rating 
  }
  if ($link_id === 6){
      $limit = 2;
      //do test2 date
  }
  if ($link_id === 7){
      $limit = 2;
      //do test2 hot
  }
  
  
  
  
  //Link ID first decided which table is going to be used
  //1 = test normal
  //2 = test sorted alphabetically
  //3 = test2 normal
  //4 = test2 sorted by names
  //5  = test2 sorted by rating
  //6 = test2 sorted by date
  //7 = test2 sorted by only hot planets
  
  
  
  
  
  
  
  
  
  
  
  //IDEAS
  
  //Sort link refers to same page with different number in link and therefore does a different function. 
  //OR
  //Gets array originally and sorts array different depending on what link is clicked. Maybe the link
  //runs the same page and differnt number depends on which array sort function is ran.
  
  
     
     
  
  ?>


<style>
    #table1{
        margin-left: auto;
        margin-right: auto;
        width: 1400px;
    }
    
    
</style>




<html>
    
    <table id="table1" class="table">
  <thead>
      <?php
        //// TEST HEADINGS
        if ($link_id < 3){ ?>
    <tr>
      <th>#</th>
      
      <th>
          <a href="table_test.php?id=2">Name</a>
      </th>
      <th>Date Added</th>
      <th>Owner</th>
    </tr>
        <?php } 
        
        
        ////TEST2 HEADINGS
        if ($link_id >= 3){ ?>
    <tr>
      <th>#</th>
      <th>Planet ID</th>
      <th>Image</th>
      <th>Name</th>
      <th>Enviroment</th>
      <th>Life Type</th>
      <th>Size</th>
      <th><a href="table_test.php?id=4">Rating</a></th>
      <th>Sentinals</th>
      <th>Date Discovered</th>
    </tr>
        <?php }?>
  </thead>
  <tbody>
      
      <?php 
  $id = 0;
  $count = 1;
  
  
  $is_record = true;
  
  echo $array_count;
  
  
  
  ////TEST CONTENT
  if ($link_id < 3){
  while ($id < $array_count){
      $id_name = $data_array[$id];
      
  
  
  $sql = $conn->prepare("SELECT * FROM `$table` WHERE `$field` = :id");
              $sql->bindParam('id', $id_name, PDO::PARAM_INT);
              $sql->execute();

              $result = $sql->fetchObject();
              
              if ($result != false){
              
              $name = $result->name;
              $date = $result->date;
              $owner = $result->owner;?>
      <tr>
      <th scope="row"><?= ($count); ?></th>
      <td><?= ($name); ?></td>
      <td><?= ($date); ?></td>
      <td><?= ($owner); ?></td>
      </tr>
              <?php }
              else {
                  
  }
  $id++;
  $count++;
  
              }
              
  }
  
  
  
  
  ///TEST2 CONTENT
      
      if ($link_id >= 3){
  while ($id < $array_count){
      $id_name = $data_array[$id];
      
  
  
  $sql = $conn->prepare("SELECT * FROM `$table` WHERE `$field` = :id");
              $sql->bindParam('id', $id_name, PDO::PARAM_INT);
              $sql->execute();

              $result = $sql->fetchObject();
              
              if ($result != false){
              
              $planet_id = $result->planet_id;    
              $image = $result->image;
              $name = $result->name;
              $enviroment = $result->enviroment;
              $life_type = $result->life_type;
              $size = $result->size;
              $rating = $result->rating;
              $sentinals = $result->sentinels;
              $date_discovered = $result->date_discovered;
              
              ?>
      <tr>
      <th scope="row"><?= ($count); ?></th>
      <td><?= ($planet_id); ?></td>
      <td><?= ($image); ?></td>
      <td><?= ($name); ?></td>
      <td><?= ($enviroment); ?></td>
      <td><?= ($life_type); ?></td>
      <td><?= ($size); ?></td>
      <td><?= ($rating); ?></td>
      <td><?= ($sentinals); ?></td>
      <td><?= ($date_discovered); ?></td>
      </tr>
              <?php }
              else {
                  $is_record = false;
  }
  $id++;
  $count++;
  
              }
      
      
      
      
  }
              ?>
      
  </tbody>
</table>
   
</html>
  

