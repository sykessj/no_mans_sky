
  

  <style>
    #table1{
        margin-left: auto;
        margin-right: auto;
        width: 1400px;
        text-align: center;
    }
    
    #table1 thead{
        text-align: center;
        vertical-align: middle;
    }
    
    #column_name{
        text-align: center;
    }
    
    #center_aligned{
        display: block;
        width: 70px;
        margin-left: auto;
        margin-right: auto;
    }
    
    #collapseOne{
        text-align: center;
    }
    
    #form_css{
        margin: 20px;
        display: inline;
        width: 200px;
    }
    
    #button_filter{
        width: 70px;
        display: inline;
        margin-right: 200px;
        margin-top: 45px;
    }
    
    #form_css1{
        margin: 20px;
        display: inline;
    }
    
    
    
    
</style>

<?php

$current_page = "index";
  require_once('C:\xampp\htdocs\no_mans_sky\includes\db.php');
  require_once('C:\xampp\htdocs\no_mans_sky\includes\db_checking.php');
  include('C:\xampp\htdocs\no_mans_sky\includes\bootstrap.php');
  global $conn;
  global $planet_limit;
  global $moon_limit;
  global $creature_limit;
  global $flora_limit;
  global $ship_limit;
  
  
  // <editor-fold defaultstate="collapsed" desc="Variables and Get from URL Functions">
  global $galaxy_limit;
  global $star_system_limit;
  $items_per_page = 10;
  $offical_items_per_page = $items_per_page;
  
  $id = 0;
  $table = "default"; 
  $order_id = "";
  $filters = false;
  
  $column1 = $column2 = 
          $column3 = $column4 = 
          $column5 = $column6 = 
          $column7 = $column8 = 
          $column9 = $column10 = 
          $column11 = $column12 = 
          $column13 =  "DESC";
  
  $column1_filter = $column2_filter = 
          $column3_filter = $column4_filter = 
          $column5_filter = $column6_filter = 
          $column7_filter = $column8_filter = 
          $column9_filter = $column10_filter = 
          $column11_filter = $column12_filter = 
          $column13_filter ="none";
  
  
  if (isset($_GET['table_type'])) {
  $table = $_GET['table_type'];}
  
  if (isset($_GET['column'])) {
  $column = $_GET['column'];}
  
  if (isset($_GET['order'])) {
  $order = $_GET['order'];}
  
  if (isset($_GET['items_per_page'])) {
  $items_per_page = $_GET['items_per_page'];}
  
  $page = $items_per_page;
  
  if (isset($_GET['page'])) {
  $page = $_GET['page'];}
  
  if (isset($_GET['current_id'])) {
  $id = $_GET['current_id'];}
  
  if (isset($_GET['order_id'])) {
  $order_id = $_GET['order_id'];}
  
  
  
  if (isset($_GET['column1_filter'])) {
  $column1_filter = $_GET['column1_filter'];}
  
  if (isset($_GET['column2_filter'])) {
  $column2_filter = $_GET['column2_filter'];}
  
  if (isset($_GET['column3_filter'])) {
  $column3_filter = $_GET['column3_filter'];}
  
  if (isset($_GET['column4_filter'])) {
  $column4_filter = $_GET['column4_filter'];}
  
  if (isset($_GET['column5_filter'])) {
  $column5_filter = $_GET['column5_filter'];}
  
  if (isset($_GET['column6_filter'])) {
  $column6_filter = $_GET['column6_filter'];}
  
  if (isset($_GET['column7_filter'])) {
  $column7_filter = $_GET['column7_filter'];}
  
  if (isset($_GET['column8_filter'])) {
  $column8_filter = $_GET['column8_filter'];}
  
  if (isset($_GET['column9_filter'])) {
  $column9_filter = $_GET['column9_filter'];}
  
  if (isset($_GET['column10_filter'])) {
  $column10_filter = $_GET['column10_filter'];}
  
  if (isset($_GET['column11_filter'])) {
  $column11_filter = $_GET['column11_filter'];}
  
  if (isset($_GET['column12_filter'])) {
  $column12_filter = $_GET['column12_filter'];}
  
  if (isset($_GET['column13_filter'])) {
  $column13_filter = $_GET['column13_filter'];}
  
  
  
  /////////////////////////////////////////////////////////////////////////////
  
  if($order_id == "column1_DESC"){
      $column1 = "ASC";
  }
  
  if($order_id == "column2_DESC"){
      $column2 = "ASC";
  }
  
  if($order_id == "column3_DESC"){
      $column3 = "ASC";
  }
  
  if($order_id == "column4_DESC"){
      $column4 = "ASC";
  }
  
  if($order_id == "column5_DESC"){
      $column5 = "ASC";
  }
  
  if($order_id == "column6_DESC"){
      $column6 = "ASC";
  }
  
  if($order_id == "column7_DESC"){
      $column7 = "ASC";
  }
  
  if($order_id == "column8_DESC"){
      $column8 = "ASC";
  }
  
  if($order_id == "column9_DESC"){
      $column9 = "ASC";
  }
  
  if($order_id == "column10_DESC"){
      $column10 = "ASC";
  }
  
  if($order_id == "column11_DESC"){
      $column11 = "ASC";
  }
  
  if($order_id == "column12_DESC"){
      $column12 = "ASC";
  }
  
  if($order_id == "column13_DESC"){
      $column13 = "ASC";
  }
  // </editor-fold>

  
  
  switch($table){
      // <editor-fold defaultstate="collapsed" desc="Galaxy Case">
      case "galaxy":
//          echo "This is the Galaxy Case";
          
          ?>

          

              <br>
              <h1 id="column_name" style="font-family: noMansFont; font-size: 40pt;">Galaxies</h1>
              <br>
              <?php
          $limit = $galaxy_limit;
          $data_array = sort_table($table , $galaxy_limit , "Id" , $column , $order );
          $total_limit = count($data_array);
          
          
          
          ?>
          
          <html>
    
    <table id="table1" class="table">
        <col width="10">
        <col width="160">
        <col width="240">
  <thead>
      <tr>
          <th>#</th>
          <th id="column_name"><a href="table.php?table_type=<?= $table; ?>&column=name&order=<?= $column1; ?>&order_id=<?= "column1_" . $column1; ?>">Name</a></th>
          <th id="column_name"><a href="table.php?table_type=<?= $table; ?>&column=no_star_systems&order=<?= $column2; ?>&order_id=<?= "column2_" . $column2; ?>">Star Systems</a></th>
          <th id="column_name"><a href="table.php?table_type=<?= $table; ?>&column=no_planets&order=<?= $column3; ?>&order_id=<?= "column3_" . $column3; ?>">Planets</a></th>
          <th id="column_name"><a href="table.php?table_type=<?= $table; ?>&column=no_moons&order=<?= $column4; ?>&order_id=<?= "column4_" . $column4; ?>">Moons</a></th>
          <th id="column_name"><a href="table.php?table_type=<?= $table; ?>&column=no_creatures&order=<?= $column5; ?>&order_id=<?= "column5_" . $column5; ?>">Creatures</a></th>
          <th id="column_name"><a href="table.php?table_type=<?= $table; ?>&column=no_flora&order=<?= $column6; ?>&order_id=<?= "column6_" . $column6; ?>">Flora</a></th>
 
      </tr>
  </thead>
  <tbody>
      <?php
        
        
        // <editor-fold defaultstate="collapsed" desc="ID Loop">
      while ($id < $galaxy_limit){
          
          $sql = $conn->prepare("SELECT * FROM `$table` WHERE `Id` = :id");
              $sql->bindParam('id', $data_array[$id], PDO::PARAM_INT);
              $sql->execute();

              $result = $sql->fetchObject();
              
              if ($result != false){
              $current_id = $result->Id;
              $name = $result->name;
              $no_star_systems = $result->no_star_systems;
              $no_planets = $result->no_planets;
              $no_moons = $result->no_moons;
              $no_creatures = $result->no_creatures;
              $no_flora = $result->no_flora;
              ?>
      <tr>
          <th scope="row"><?= ($id + 1); ?></th>
          <td><a href="item.php?database_type=<?= $table; ?>&item_id=<?= $current_id; ?>"><?= $name; ?></a></td>
          <td><?= $no_star_systems; ?></td>
          <td text-align="center"><?= $no_planets; ?></td>
          <td><?= $no_moons; ?></td>
          <td><?= $no_creatures; ?></td>
          <td><?= $no_flora; ?></td>
      </tr>
      <?php
              }
              $id++;
          }
          // </editor-fold>
          
          
          ?>
  </tbody>
    </table>
              <?php
          
          
          break;
          // </editor-fold>
       
      // <editor-fold defaultstate="collapsed" desc="Star Systems Case">
      case "star_systems":
//          echo "This is the star system case";
          ?>
              
              <br>
              
              <h1 id="column_name" style="font-family: noMansFont; font-size: 40pt;">Star Systems</h1>
              <br>
              <?php
          
          $limit = 1100;
          $data_array = sort_table("$table" , $star_system_limit , "ID" , "$column" , "$order" );
          $total_limit = count($data_array);
           ?>
          
          <html>
    
    <table id="table1" class="table">
        <col width="10">
        <col width="160">
        <col width="240">
  <thead>
      <tr>
          <th>#</th>
          <th id="column_name"><a href="table.php?table_type=<?= $table; ?>&column=name&order=<?= $column1; ?>&order_id=<?= "column1_" . $column1; ?>"> Name </a></th>
          <th id="column_name"><a href="table.php?table_type=<?= $table; ?>&column=galaxy&order=<?= $column2; ?>&order_id=<?= "column2_" . $column2; ?>">Galaxy</a></th>
          <th id="column_name"><a href="table.php?table_type=<?= $table; ?>&column=star_type&order=<?= $column3; ?>&order_id=<?= "column3_" . $column3; ?>">Star Type</a></th>
          <th id="column_name"><a href="table.php?table_type=<?= $table; ?>&column=star_colour&order=<?= $column4; ?>&order_id=<?= "column4_" . $column4; ?>">Star Colour</a></th>
          <th id="column_name"><a href="table.php?table_type=<?= $table; ?>&column=no_planets&order=<?= $column5; ?>&order_id=<?= "column5_" . $column5; ?>">Planets</a></th>
          <th id="column_name"><a href="table.php?table_type=<?= $table; ?>&column=no_moons&order=<?= $column6; ?>&order_id=<?= "column6_" . $column6; ?>">Moons</a></th>
          <th id="column_name"><a href="table.php?table_type=<?= $table; ?>&column=no_creatures&order=<?= $column7; ?>&order_id=<?= "column7_" . $column7; ?>">Creatures</a></th>
          <th id="column_name"><a href="table.php?table_type=<?= $table; ?>&column=no_flora&order=<?= $column8; ?>&order_id=<?= "column8_" . $column8; ?>">Flora</a></th>
          <th id="column_name"><a href="table.php?table_type=<?= $table; ?>&column=date_logged&order=<?= $column9; ?>&order_id=<?= "column9_" . $column9; ?>">Date Discovered</a></th>
 
      </tr>
  </thead>
  <tbody>
      <?php
        
         while ($id < $page){
          
          $sql = $conn->prepare("SELECT * FROM `$table` WHERE `ID` = :id");
              $sql->bindParam('id', $data_array[$id], PDO::PARAM_INT);
              $sql->execute();

              $result = $sql->fetchObject();
              
              if ($result != false){
                  
//                  $disable = "enabled";
              
              $current_id = $result->ID;
              $name = $result->name;
              $galaxy = $result->galaxy;
              $star_type = $result->star_type;
              $star_colour = $result->star_colour;
              $no_planets = $result->no_planets;
              $no_moons = $result->no_moons;
              $no_creatures = $result->no_creatures;
              $no_flora = $result->no_flora;
              $date_logged = $result->date_logged;
    
              $timestamp = strtotime($date_logged);
                        $date_logged = date("H:ia  d/M/y", $timestamp);
                        
                        if($column1_filter != "none"){
                            if($column1_filter != $star_type){
                                $filters = true;
                            }else{}
                        }
                        
                        if($column2_filter != "none"){
                            if($column2_filter != $star_colour){
                                $filters = true;
                            }else{}
                        }
                        
                        if($filters == false){
                        ?>
      <tr>
          <th scope="row"><?= $id + 1; ?></th>
          <td><a href="item.php?database_type=<?= $table; ?>&item_id=<?= $current_id; ?>"><?= $name; ?></a></td>
          <td><a href="item.php?database_type=galaxy&item_name=<?= $galaxy; ?>"><?= $galaxy; ?></a></td>
          <td><?= $star_type; ?></td>
          <td><?= $star_colour; ?></td>
          <td><?= $no_planets; ?></td>
          <td><?= $no_moons; ?></td>
          <td><?= $no_creatures; ?></td>
          <td><?= $no_flora; ?></td>
          <td><?= $date_logged; ?></td>
      </tr>
      <?php
                        }else{}
              }else {
                  $id = $page;
//                  echo "No more results found";
                  $disable = "disabled";
              }
              $filters = false;
              $id++;
  }
          ?>
          
          
  <ul class="pager">
      <?php
        if($id >= $total_limit){
       $number1 = $id / $items_per_page;
       $number1 = round($number1, 0, PHP_ROUND_HALF_UP);
       $number1 = $items_per_page * $number1;
       $id = $number1;
   }
   
        if($id > $items_per_page){ ?>
    <li><a href="table.php?table_type=<?= $table; ?>&column=<?= $column; ?>&order=<?= $order; ?>&current_id=<?= ($id - ($items_per_page * 2)); ?>&page=<?= ($page - $items_per_page); ?>&items_per_page=<?= $offical_items_per_page; ?>">Previous</a></li>
        <?php }
    if($id < $total_limit){
        ?>
   <li><a href="table.php?table_type=<?= $table; ?>&column=<?= $column; ?>&order=<?= $order; ?>&current_id=<?= $id; ?>&page=<?= ($page + $items_per_page); ?>&items_per_page=<?= $offical_items_per_page; ?>">Next</a></li>
   
   
   <?php
  }
    ?>
   
   <br>
   <br>
   <br>
   <!-- ////////////////////////////////// FILTERS /////////////////////////////////////////////-->
  <p>
  <a class="btn btn-primary" data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
    Filters ▼
  </a>
</p>
<div class="collapse" id="collapseExample">
  <div class="container-fluid">
      
      <?php
        $star_type_filter = "none";
        $star_colour_filter = "none";
                          if (isset($_POST['filter_star'])) {
                              //save what is entered
                              $star_type_filter = $_POST['star_type_filter'];
                              $star_colour_filter = $_POST['star_colour_filter'];
                              if($star_type_filter == "none" && $star_colour_filter == "none"){
                                  echo "<meta http-equiv='refresh' content='0; table.php?table_type=$table&column=$column&order=$order&column1_filter=$star_type_filter&column2_filter=$star_colour_filter&items_per_page=$offical_items_per_page'>";
                              }else{
                              echo "<meta http-equiv='refresh' content='0; table.php?table_type=$table&column=$column&order=$order&column1_filter=$star_type_filter&column2_filter=$star_colour_filter&items_per_page=500'>";
                              }
                              
                              }
                              ?>
      
      <form class="form-inline" method="post" action="">
          
              <div class="row-fluid">
                <div class="col-md-3">
              
            <h4> Star Type:
                            <select name="star_type_filter" class="form-control" id="form_css">
                            <option value="none">No Filter</option> 
                            <option value="Binary">Binary</option>
                            <option value="Dwarf">Dwarf</option>
                            <option value="Giant">Giant</option>
                            <option value="Neutron">Neutron</option>
                            <option value="Pulsar">Pulsar</option>
                            <option value="Supergiant">Supergiant</option>
                                    
                            </select>
                </div>
              
            <div class="col-md-3">
              
            <h4> Star Colour:
                            <select name="star_colour_filter" class="form-control" id="form_css">
                            <option value="none">No Filter</option>    
                            <option value="Red">Red</option>
                            <option value="Orange">Orange</option>
                            <option value="Yellow">Yellow</option>
                            <option value="White">White</option>
                            <option value="Blue">Blue</option>
                                    
                            </select>
                
            </div>
                  
                  
              
                
          <div style="margin-right: 326px;" class="col-md-3">
            <input class="btn btn-success" id="button_filter" type="submit" name="filter_star" value="Filter">
            </div>  
                  
                  </div>
      
    </form>
    </div>
  </div>
</div>
   
  <?php
          
          
          
          
          break;
          
          // </editor-fold>
          
      // <editor-fold defaultstate="collapsed" desc="Planets Case">
      case "planets":
//          echo "This is the planets case";
          ?>
              
              <br>
              
              <h1 id="column_name" style="font-family: noMansFont; font-size: 40pt;">Planets</h1>
              <br>
              <?php
          
          $limit = 1100;
          $data_array = sort_table("$table" , $planet_limit , "id" , "$column" , "$order" );
          $total_limit = count($data_array);
           ?>
          
          <html>
    
    <table id="table1" class="table">
        <col width="10">
        <col width="160">
        <col width="240">
  <thead>
      <tr>
          <th>#</th>
          <th id="column_name"><a href="table.php?table_type=<?= $table; ?>&column=name&order=<?= $column1; ?>&order_id=<?= "column1_" . $column1; ?>"> Name </a></th>
          <th id="column_name"><a href="table.php?table_type=<?= $table; ?>&column=star_system&order=<?= $column2; ?>&order_id=<?= "column2_" . $column2; ?>">Star System</a></th>
          <th id="column_name"><a href="table.php?table_type=<?= $table; ?>&column=enviroment&order=<?= $column4; ?>&order_id=<?= "column4_" . $column4; ?>">Atmosphere</a></th>
          <th id="column_name"><a href="table.php?table_type=<?= $table; ?>&column=climate&order=<?= $column5; ?>&order_id=<?= "column5_" . $column5; ?>">Climate</a></th>
          <th id="column_name"><a href="table.php?table_type=<?= $table; ?>&column=life_type&order=<?= $column6; ?>&order_id=<?= "column6_" . $column6; ?>">Life</a></th>
          <th id="column_name"><a href="table.php?table_type=<?= $table; ?>&column=size&order=<?= $column7; ?>&order_id=<?= "column7_" . $column7; ?>">Size</a></th>
          <th id="column_name"><a href="table.php?table_type=<?= $table; ?>&column=sentinals&order=<?= $column8; ?>&order_id=<?= "column8_" . $column8; ?>">Sentinals</a></th>
          <th id="column_name"><a href="table.php?table_type=<?= $table; ?>&column=rating&order=<?= $column9; ?>&order_id=<?= "column9_" . $column9; ?>">Rating</a></th>
          <th id="column_name"><a href="table.php?table_type=<?= $table; ?>&column=no_moons&order=<?= $column10; ?>&order_id=<?= "column10_" . $column10; ?>">Moons</a></th>
          <th id="column_name"><a href="table.php?table_type=<?= $table; ?>&column=no_creatures&order=<?= $column11; ?>&order_id=<?= "column11_" . $column11; ?>">Creatures</a></th>
          <th id="column_name"><a href="table.php?table_type=<?= $table; ?>&column=no_flora&order=<?= $column12; ?>&order_id=<?= "column12_" . $column12; ?>">Flora</a></th>
          <th id="column_name"><a href="table.php?table_type=<?= $table; ?>&column=date_logged&order=<?= $column13; ?>&order_id=<?= "column13_" . $column13; ?>">Date Discovered</a></th>
 
      </tr>
  </thead>
  <tbody>
      <?php
        
         while ($id < $page){
          
          $sql = $conn->prepare("SELECT * FROM `$table` WHERE `ID` = :id");
              $sql->bindParam('id', $data_array[$id], PDO::PARAM_INT);
              $sql->execute();

              $result = $sql->fetchObject();
              
              if ($result != false){
                  
//                  $disable = "enabled";
              
              $object_id = $result->id;
              $planet_name = $result->name;
              $planet_star_system = $result->star_system;
              $planet_enviroment = $result->enviroment;
              $planet_climate = $result->climate;
              $planet_life_type = $result->life_type;
              $planet_size = $result->size;
              $planet_sentinals = $result->sentinals;
              $planet_rating = $result->rating;
              $planet_no_moons = $result->no_moons;
              $planet_no_creatures = $result->no_creatures;
              $planet_no_flora = $result->no_flora;
              $date_logged = $result->date_logged;
    
              $timestamp = strtotime($date_logged);
                        $date_logged = date("H:ia  d/M/y", $timestamp);
                        
                        if($column1_filter != "none"){
                            if($column1_filter != $planet_enviroment){
                                $filters = true;
                            }else{}
                        }
                        
                        if($column2_filter != "none"){
                            if($column2_filter != $planet_climate){
                                $filters = true;
                            }else{}
                        }
                        
                        if($column3_filter != "none"){
                            if($column3_filter != $planet_life_type){
                                $filters = true;
                            }else{}
                        }
                        
                        if($column4_filter != "none"){
                            if($column4_filter != $planet_size){
                                $filters = true;
                            }else{}
                        }
                        
                        if($column5_filter != "none"){
                            if($column5_filter != $planet_sentinals){
                                $filters = true;
                            }else{}
                        }
                        
                        if($filters == false){
                        ?>
      <tr>
          <th scope="row"><?= $id + 1; ?></th>
          <td><a href="item.php?database_type=<?= $table; ?>&item_id=<?= $object_id; ?>"><?= $planet_name; ?></a></td>
          <td><a href="item.php?database_type=star_systems&item_name=<?= $planet_star_system; ?>"><?= $planet_star_system; ?></a></td>
          <td><?= $planet_enviroment; ?></td>
          <td><?= $planet_climate; ?></td>
          <td><?= $planet_life_type; ?></td>
          <td><?= $planet_size; ?></td>
          <td><?= $planet_sentinals; ?></td>
          <td><?= $planet_rating; ?></td>
          <td><?= $planet_no_moons; ?></td>
          <td><?= $planet_no_creatures; ?></td>
          <td><?= $planet_no_flora; ?></td>
          <td><?= $date_logged; ?></td>
      </tr>
      <?php
                        }else{}
              }else {
                  $id = $page;
//                  echo "No more results found";
                  $disable = "disabled";
              }
              $filters = false;
              $id++;
  }
          ?>
          
          
  <ul class="pager">
      <?php
        if($id >= $total_limit){
       $number1 = $id / $items_per_page;
       $number1 = round($number1, 0, PHP_ROUND_HALF_UP);
       $number1 = $items_per_page * $number1;
       $id = $number1;
   }
   
        if($id > $items_per_page){ ?>
    <li><a href="table.php?table_type=<?= $table; ?>&column=<?= $column; ?>&order=<?= $order; ?>&current_id=<?= ($id - ($items_per_page * 2)); ?>&page=<?= ($page - $items_per_page); ?>&items_per_page=<?= $offical_items_per_page; ?>">Previous</a></li>
        <?php }
    if($id < $total_limit){
        ?>
   <li><a href="table.php?table_type=<?= $table; ?>&column=<?= $column; ?>&order=<?= $order; ?>&current_id=<?= $id; ?>&page=<?= ($page + $items_per_page); ?>&items_per_page=<?= $offical_items_per_page; ?>">Next</a></li>
   
   
   <?php
  }
    ?>
   
   <br>
   <br>
   
   <!-- ////////////////////////////////// FILTERS /////////////////////////////////////////////-->
  <p>
  <a class="btn btn-primary" data-toggle="collapse" href="#collapsePlanet" aria-expanded="false" aria-controls="collapsePlanet">
    Filters ▼
  </a>
</p>
<div class="collapse" id="collapsePlanet">
  <div class="container-fluid">
      
      <?php
        $planet_enviroment_filter = "none";
        $planet_climate_filter = "none";
                          if (isset($_POST['filter_planet'])) {
                              //save what is entered
                              $planet_enviroment_filter = $_POST['planet_enviroment_filter'];
                              $planet_climate_filter = $_POST['planet_climate_filter'];
                              $planet_life_type_filter = $_POST['planet_life_type_filter'];
                              $planet_size_filter = $_POST['planet_size_filter'];
                              $planet_sentinals_filter = $_POST['planet_sentinals_filter'];
                              if($planet_enviroment_filter == "none" && $planet_climate_filter == "none" 
                                      && $planet_life_type_filter == "none" && $planet_size_filter == "none" 
                                      && $planet_sentinals_filter == "none"){
                                  echo "<meta http-equiv='refresh' content='0; table.php?table_type=$table&column=$column&order=$order&column1_filter=$planet_enviroment_filter"
                                          . "&column2_filter=$planet_climate_filter"
                                          . "&column3_filter=$planet_life_type_filter"
                                          . "&column4_filter=$planet_size_filter"
                                          . "&column5_filter=$planet_sentinals_filter&items_per_page=$offical_items_per_page'>";
                              }else{
                              echo "<meta http-equiv='refresh' content='0; table.php?table_type=$table&column=$column&order=$order&column1_filter=$planet_enviroment_filter"
                                      . "&column2_filter=$planet_climate_filter"
                                      . "&column3_filter=$planet_life_type_filter"
                                      . "&column4_filter=$planet_size_filter"
                                      . "&column5_filter=$planet_sentinals_filter&items_per_page=500'>";
                              }
                              
                              }
                              ?>
      
      <form class="form-inline" method="post" action="">
          
              <div class="row-fluid">
                <div class="col-md-2">
              
            <h4> Atmosphere:
                            <select name="planet_enviroment_filter" class="form-control" id="form_css">
                            <option value="none">No Filter</option> 
                            <option value="Normal">Normal</option>
                            <option value="Extreme Heat">Extreme Heat</option>
                            <option value="Extreme Cold">Extreme Cold</option>
                            <option value="Toxic">Toxic</option>
                            
                                    
                            </select>
                </div>
              
            <div class="col-md-2">
              
            <h4> Climate:
                            <select name="planet_climate_filter" class="form-control" id="form_css">
                            <option value="none">No Filter</option>    
                            <option value="Tropical">Tropical</option>
                            <option value="Savannah">Savannah</option>
                            <option value="Dessert">Dessert</option>
                            <option value="Mediterranean">Mediterranean</option>
                            <option value="Humid Subtropical">Humid Subtropical</option>
                            <option value="Temperate">Temperate</option>
                            <option value="Highland">Highland</option>
                            <option value="Sub Arctic">Sub Arctic</option>
                            <option value="Sub Zero">Sub Zero</option>
                                    
                            </select>
                
            </div>
                  
                  <div class="col-md-2">
              
            <h4> Life:
                            <select name="planet_life_type_filter" class="form-control" id="form_css">
                            <option value="none">No Filter</option>    
                            <option value="None">None</option>
                            <option value="Bacterial">Bacterial</option>
                            <option value="Basic">Basic</option>
                            <option value="Complex">Complex</option>
                                    
                            </select>
                
            </div>
                  
                  <div class="col-md-2">
              
            <h4> Size:
                            <select name="planet_size_filter" class="form-control" id="form_css">
                            <option value="none">No Filter</option>    
                            <option value="Tiny">Tiny</option>
                            <option value="Small">Small</option>
                            <option value="Medium">Medium</option>
                            <option value="Large">Large</option>
                            <option value="Huge">Huge</option>
                                    
                            </select>
                
            </div>
                  
                  <div class="col-md-2">
              
            <h4> Sentinals:
                            <select name="planet_sentinals_filter" class="form-control" id="form_css">
                            <option value="none">No Filter</option>    
                            <option value="None">None</option>
                            <option value="Small Waves">Small Waves</option>
                            <option value="Medium Waves">Medium Waves</option>
                            <option value="Large Waves">Large Waves</option>
                            <option value="Huge Waves">Huge Waves</option>
                                    
                            </select>
                
            </div>
                  
                  
              
                
          <div style="margin-left: 620px; margin-bottom: 30px;" class="col-md-2">
            <input class="btn btn-success" id="button_filter" type="submit" name="filter_planet" value="Filter">
            </div>  
                  
                  </div>
      
    </form>
    </div>
  </div>
   
</div>
   
  <?php
          
          
          
          
          break;
          
          // </editor-fold>
          
      // <editor-fold defaultstate="collapsed" desc="Moons Case">
      case "moons":
//          echo "This is the planets case";
          ?>
              
              <br>
              
              <h1 id="column_name" style="font-family: noMansFont; font-size: 40pt;">Moons</h1>
              <br>
              <?php
          
          $limit = 1100;
          $data_array = sort_table("$table" , $moon_limit , "id" , "$column" , "$order" );
          $total_limit = count($data_array);
           ?>
          
          <html>
    
    <table id="table1" class="table">
        <col width="10">
        <col width="160">
        <col width="240">
  <thead>
      <tr>
          <th>#</th>
          <th id="column_name"><a href="table.php?table_type=<?= $table; ?>&column=name&order=<?= $column1; ?>&order_id=<?= "column1_" . $column1; ?>"> Name </a></th>
          <th id="column_name"><a href="table.php?table_type=<?= $table; ?>&column=star_system&order=<?= $column2; ?>&order_id=<?= "column2_" . $column2; ?>">Star System</a></th>
          <th id="column_name"><a href="table.php?table_type=<?= $table; ?>&column=enviroment&order=<?= $column4; ?>&order_id=<?= "column4_" . $column4; ?>">Atmosphere</a></th>
          <th id="column_name"><a href="table.php?table_type=<?= $table; ?>&column=climate&order=<?= $column5; ?>&order_id=<?= "column5_" . $column5; ?>">Climate</a></th>
          <th id="column_name"><a href="table.php?table_type=<?= $table; ?>&column=life_type&order=<?= $column6; ?>&order_id=<?= "column6_" . $column6; ?>">Life</a></th>
          <th id="column_name"><a href="table.php?table_type=<?= $table; ?>&column=size&order=<?= $column7; ?>&order_id=<?= "column7_" . $column7; ?>">Size</a></th>
          <th id="column_name"><a href="table.php?table_type=<?= $table; ?>&column=sentinals&order=<?= $column8; ?>&order_id=<?= "column8_" . $column8; ?>">Sentinals</a></th>
          <th id="column_name"><a href="table.php?table_type=<?= $table; ?>&column=rating&order=<?= $column9; ?>&order_id=<?= "column9_" . $column9; ?>">Rating</a></th>
          <th id="column_name"><a href="table.php?table_type=<?= $table; ?>&column=parent_planet&order=<?= $column10; ?>&order_id=<?= "column10_" . $column10; ?>">Parent Planet</a></th>
          <th id="column_name"><a href="table.php?table_type=<?= $table; ?>&column=no_creatures&order=<?= $column11; ?>&order_id=<?= "column11_" . $column11; ?>">Creatures</a></th>
          <th id="column_name"><a href="table.php?table_type=<?= $table; ?>&column=no_flora&order=<?= $column12; ?>&order_id=<?= "column12_" . $column12; ?>">Flora</a></th>
          <th id="column_name"><a href="table.php?table_type=<?= $table; ?>&column=date_logged&order=<?= $column13; ?>&order_id=<?= "column13_" . $column13; ?>">Date Discovered</a></th>
 
      </tr>
  </thead>
  <tbody>
      <?php
        
         while ($id < $page){
          
          $sql = $conn->prepare("SELECT * FROM `$table` WHERE `ID` = :id");
              $sql->bindParam('id', $data_array[$id], PDO::PARAM_INT);
              $sql->execute();

              $result = $sql->fetchObject();
              
              if ($result != false){
                  
//                  $disable = "enabled";
              
              $object_id = $result->id;
              $planet_name = $result->name;
              $planet_star_system = $result->star_system;
              $planet_enviroment = $result->enviroment;
              $planet_climate = $result->climate;
              $planet_life_type = $result->life_type;
              $planet_size = $result->size;
              $planet_sentinals = $result->sentinals;
              $planet_rating = $result->rating;
              $planet_parent = $result->parent_planet;
              $planet_no_creatures = $result->no_creatures;
              $planet_no_flora = $result->no_flora;
              $date_logged = $result->date_logged;
    
              $timestamp = strtotime($date_logged);
                        $date_logged = date("H:ia  d/M/y", $timestamp);
                        
                        if($column1_filter != "none"){
                            if($column1_filter != $planet_enviroment){
                                $filters = true;
                            }else{}
                        }
                        
                        if($column2_filter != "none"){
                            if($column2_filter != $planet_climate){
                                $filters = true;
                            }else{}
                        }
                        
                        if($column3_filter != "none"){
                            if($column3_filter != $planet_life_type){
                                $filters = true;
                            }else{}
                        }
                        
                        if($column4_filter != "none"){
                            if($column4_filter != $planet_size){
                                $filters = true;
                            }else{}
                        }
                        
                        if($column5_filter != "none"){
                            if($column5_filter != $planet_sentinals){
                                $filters = true;
                            }else{}
                        }
                        
                        if($filters == false){
                        ?>
      <tr>
          <th scope="row"><?= $id + 1; ?></th>
          <td><?= $planet_name; ?></td>
          <td><?= $planet_star_system; ?></td>
          <td><?= $planet_enviroment; ?></td>
          <td><?= $planet_climate; ?></td>
          <td><?= $planet_life_type; ?></td>
          <td><?= $planet_size; ?></td>
          <td><?= $planet_sentinals; ?></td>
          <td><?= $planet_rating; ?></td>
          <td><?= $planet_parent; ?></td>
          <td><?= $planet_no_creatures; ?></td>
          <td><?= $planet_no_flora; ?></td>
          <td><?= $date_logged; ?></td>
      </tr>
      <?php
                        }else{}
              }else {
                  $id = $page;
//                  echo "No more results found";
                  $disable = "disabled";
              }
              $filters = false;
              $id++;
  }
          ?>
          
          
  <ul class="pager">
      <?php
        if($id >= $total_limit){
       $number1 = $id / $items_per_page;
       $number1 = round($number1, 0, PHP_ROUND_HALF_UP);
       $number1 = $items_per_page * $number1;
       $id = $number1;
   }
   
        if($id > $items_per_page){ ?>
    <li><a href="table.php?table_type=<?= $table; ?>&column=<?= $column; ?>&order=<?= $order; ?>&current_id=<?= ($id - ($items_per_page * 2)); ?>&page=<?= ($page - $items_per_page); ?>&items_per_page=<?= $offical_items_per_page; ?>">Previous</a></li>
        <?php }
    if($id < $total_limit){
        ?>
   <li><a href="table.php?table_type=<?= $table; ?>&column=<?= $column; ?>&order=<?= $order; ?>&current_id=<?= $id; ?>&page=<?= ($page + $items_per_page); ?>&items_per_page=<?= $offical_items_per_page; ?>">Next</a></li>
   
   
   <?php
  }
    ?>
   
   <br>
   <br>
   
   <!-- ////////////////////////////////// FILTERS /////////////////////////////////////////////-->
  <p>
  <a class="btn btn-primary" data-toggle="collapse" href="#collapseMoon" aria-expanded="false" aria-controls="collapseMoon">
    Filters ▼
  </a>
</p>
<div class="collapse" id="collapseMoon">
  <div class="container-fluid">
      
      <?php
        $planet_enviroment_filter = "none";
        $planet_climate_filter = "none";
                          if (isset($_POST['filter_planet'])) {
                              //save what is entered
                              $planet_enviroment_filter = $_POST['planet_enviroment_filter'];
                              $planet_climate_filter = $_POST['planet_climate_filter'];
                              $planet_life_type_filter = $_POST['planet_life_type_filter'];
                              $planet_size_filter = $_POST['planet_size_filter'];
                              $planet_sentinals_filter = $_POST['planet_sentinals_filter'];
                              if($planet_enviroment_filter == "none" && $planet_climate_filter == "none" 
                                      && $planet_life_type_filter == "none" && $planet_size_filter == "none" 
                                      && $planet_sentinals_filter == "none"){
                                  echo "<meta http-equiv='refresh' content='0; table.php?table_type=$table&column=$column&order=$order&column1_filter=$planet_enviroment_filter"
                                          . "&column2_filter=$planet_climate_filter"
                                          . "&column3_filter=$planet_life_type_filter"
                                          . "&column4_filter=$planet_size_filter"
                                          . "&column5_filter=$planet_sentinals_filter&items_per_page=$offical_items_per_page'>";
                              }else{
                              echo "<meta http-equiv='refresh' content='0; table.php?table_type=$table&column=$column&order=$order&column1_filter=$planet_enviroment_filter"
                                      . "&column2_filter=$planet_climate_filter"
                                      . "&column3_filter=$planet_life_type_filter"
                                      . "&column4_filter=$planet_size_filter"
                                      . "&column5_filter=$planet_sentinals_filter&items_per_page=500'>";
                              }
                              
                              }
                              ?>
      
      <form class="form-inline" method="post" action="">
          
              <div class="row-fluid">
                <div class="col-md-2">
              
            <h4> Atmosphere:
                            <select name="planet_enviroment_filter" class="form-control" id="form_css">
                            <option value="none">No Filter</option> 
                            <option value="Normal">Normal</option>
                            <option value="Extreme Heat">Extreme Heat</option>
                            <option value="Extreme Cold">Extreme Cold</option>
                            <option value="Toxic">Toxic</option>
                            
                                    
                            </select>
                </div>
              
            <div class="col-md-2">
              
            <h4> Climate:
                            <select name="planet_climate_filter" class="form-control" id="form_css">
                            <option value="none">No Filter</option>    
                            <option value="Tropical">Tropical</option>
                            <option value="Savannah">Savannah</option>
                            <option value="Dessert">Dessert</option>
                            <option value="Mediterranean">Mediterranean</option>
                            <option value="Humid Subtropical">Humid Subtropical</option>
                            <option value="Temperate">Temperate</option>
                            <option value="Highland">Highland</option>
                            <option value="Sub Arctic">Sub Arctic</option>
                            <option value="Sub Zero">Sub Zero</option>
                                    
                            </select>
                
            </div>
                  
                  <div class="col-md-2">
              
            <h4> Life:
                            <select name="planet_life_type_filter" class="form-control" id="form_css">
                            <option value="none">No Filter</option>    
                            <option value="None">None</option>
                            <option value="Bacterial">Bacterial</option>
                            <option value="Basic">Basic</option>
                            <option value="Complex">Complex</option>
                                    
                            </select>
                
            </div>
                  
                  <div class="col-md-2">
              
            <h4> Size:
                            <select name="planet_size_filter" class="form-control" id="form_css">
                            <option value="none">No Filter</option>    
                            <option value="Tiny">Tiny</option>
                            <option value="Small">Small</option>
                            <option value="Medium">Medium</option>
                            <option value="Large">Large</option>
                            <option value="Huge">Huge</option>
                                    
                            </select>
                
            </div>
                  
                  <div class="col-md-2">
              
            <h4> Sentinals:
                            <select name="planet_sentinals_filter" class="form-control" id="form_css">
                            <option value="none">No Filter</option>    
                            <option value="None">None</option>
                            <option value="Small Waves">Small Waves</option>
                            <option value="Medium Waves">Medium Waves</option>
                            <option value="Large Waves">Large Waves</option>
                            <option value="Huge Waves">Huge Waves</option>
                                    
                            </select>
                
            </div>
                  
                  
              
                
          <div style="margin-left: 620px; margin-bottom: 30px;" class="col-md-2">
            <input class="btn btn-success" id="button_filter" type="submit" name="filter_planet" value="Filter">
            </div>  
                  
                  </div>
      
    </form>
    </div>
  </div>
   
</div>
   
  <?php
          
          
          
          
          break;
          
          // </editor-fold>
          
      // <editor-fold defaultstate="collapsed" desc="Creatures Case">
      case "creatures":
//          echo "This is the planets case";
          ?>
              
              <br>
              
              <h1 id="column_name" style="font-family: noMansFont; font-size: 40pt;">Creatures</h1>
              <br>
              <?php
          
          $limit = 1100;
          $data_array = sort_table("$table" , $creature_limit , "id" , "$column" , "$order" );
          $total_limit = count($data_array);
           ?>
          
          <html>
    
    <table id="table1" class="table">
        <col width="10">
        <col width="160">
        <col width="240">
  <thead>
      <tr>
          <th>#</th>
          <th id="column_name"><a href="table.php?table_type=<?= $table; ?>&column=name&order=<?= $column1; ?>&order_id=<?= "column1_" . $column1; ?>"> Name </a></th>
          <th id="column_name"><a href="table.php?table_type=<?= $table; ?>&column=parent_planet&order=<?= $column2; ?>&order_id=<?= "column2_" . $column2; ?>">Parent World</a></th>
          <th id="column_name"><a href="table.php?table_type=<?= $table; ?>&column=parent_type&order=<?= $column4; ?>&order_id=<?= "column4_" . $column4; ?>">Parent Type</a></th>
          <th id="column_name"><a href="table.php?table_type=<?= $table; ?>&column=life_type&order=<?= $column5; ?>&order_id=<?= "column5_" . $column5; ?>">Domain</a></th>
          <th id="column_name"><a href="table.php?table_type=<?= $table; ?>&column=size&order=<?= $column6; ?>&order_id=<?= "column6_" . $column6; ?>">Size</a></th>
          <th id="column_name"><a href="table.php?table_type=<?= $table; ?>&column=diet&order=<?= $column7; ?>&order_id=<?= "column7_" . $column7; ?>">Diet</a></th>
          <th id="column_name"><a href="table.php?table_type=<?= $table; ?>&column=rating&order=<?= $column8; ?>&order_id=<?= "column8_" . $column8; ?>">Rating</a></th>
          <th id="column_name"><a href="table.php?table_type=<?= $table; ?>&column=date_logged&order=<?= $column9; ?>&order_id=<?= "column9_" . $column9; ?>">Date Logged</a></th>
 
      </tr>
  </thead>
  <tbody>
      <?php
        
         while ($id < $page){
          
          $sql = $conn->prepare("SELECT * FROM `$table` WHERE `ID` = :id");
              $sql->bindParam('id', $data_array[$id], PDO::PARAM_INT);
              $sql->execute();

              $result = $sql->fetchObject();
              
              if ($result != false){
                  
//                  $disable = "enabled";
              
              $object_id = $result->id;
              $creature_name = $result->name;
              $creature_life_type = $result->life_type;
              $creature_size = $result->size;
              $creature_rating = $result->rating;
              $date_logged = $result->date_logged;
              $creature_parent = $result->parent_planet;
              $creature_parent_type = $result->parent_type;
              $creature_diet = $result->diet;
    
              $timestamp = strtotime($date_logged);
                        $date_logged = date("H:ia  d/M/y", $timestamp);
                        
                        if($column1_filter != "none"){
                            if($column1_filter != $creature_parent_type){
                                $filters = true;
                            }else{}
                        }
                        
                        if($column2_filter != "none"){
                            if($column2_filter != $creature_life_type){
                                $filters = true;
                            }else{}
                        }
                        
                        if($column3_filter != "none"){
                            if($column3_filter != $creature_size){
                                $filters = true;
                            }else{}
                        }
                        
                        if($column4_filter != "none"){
                            if($column4_filter != $creature_diet){
                                $filters = true;
                            }else{}
                        }
                        
                        if($filters == false){
                        ?>
      <tr>
          <th scope="row"><?= $id + 1; ?></th>
          <td><?= $creature_name; ?></td>
          <td><?= $creature_parent; ?></td>
          <td><?= $creature_parent_type; ?></td>
          <td><?= $creature_life_type; ?></td>
          <td><?= $creature_size; ?></td>
          <td><?= $creature_diet; ?></td>
          <td><?= $creature_rating; ?></td>
          <td><?= $date_logged; ?></td>
      </tr>
      <?php
                        }else{}
              }else {
                  $id = $page;
//                  echo "No more results found";
                  $disable = "disabled";
              }
              $filters = false;
              $id++;
  }
          ?>
          
          
  <ul class="pager">
      <?php
        if($id >= $total_limit){
       $number1 = $id / $items_per_page;
       $number1 = round($number1, 0, PHP_ROUND_HALF_UP);
       $number1 = $items_per_page * $number1;
       $id = $number1;
   }
   
        if($id > $items_per_page){ ?>
    <li><a href="table.php?table_type=<?= $table; ?>&column=<?= $column; ?>&order=<?= $order; ?>&current_id=<?= ($id - ($items_per_page * 2)); ?>&page=<?= ($page - $items_per_page); ?>&items_per_page=<?= $offical_items_per_page; ?>">Previous</a></li>
        <?php }
    if($id < $total_limit){
        ?>
   <li><a href="table.php?table_type=<?= $table; ?>&column=<?= $column; ?>&order=<?= $order; ?>&current_id=<?= $id; ?>&page=<?= ($page + $items_per_page); ?>&items_per_page=<?= $offical_items_per_page; ?>">Next</a></li>
   
   
   <?php
  }
    ?>
   
   <br>
   <br>
   
   <!-- ////////////////////////////////// FILTERS /////////////////////////////////////////////-->
  <p>
  <a class="btn btn-primary" data-toggle="collapse" href="#collapseCreature" aria-expanded="false" aria-controls="collapseCreature">
    Filters ▼
  </a>
</p>
<div class="collapse" id="collapseCreature">
  <div class="container-fluid">
      
      <?php
        $planet_enviroment_filter = "none";
        $planet_climate_filter = "none";
                          if (isset($_POST['filter_creature'])) {
                              //save what is entered
                              $creature_parent_type_filter = $_POST['creature_parent_type_filter'];
                              $creature_diet_filter = $_POST['creature_diet_filter'];
                              $creature_life_type_filter = $_POST['creature_life_type_filter'];
                              $creature_size_filter = $_POST['creature_size_filter'];
                              if($creature_parent_type_filter == "none" && $creature_diet_filter == "none" 
                                      && $creature_life_type_filter == "none" && $creature_size_filter == "none"){
                                  echo "<meta http-equiv='refresh' content='0; table.php?table_type=$table&column=$column&order=$order&column1_filter=$creature_parent_type_filter"
                                          . "&column2_filter=$creature_life_type_filter"
                                          . "&column3_filter=$creature_size_filter"
                                          . "&column4_filter=$creature_diet_filter"
                                          . "&items_per_page=$offical_items_per_page'>";
                              }else{
                              echo "<meta http-equiv='refresh' content='0; table.php?table_type=$table&column=$column&order=$order&column1_filter=$creature_parent_type_filter"
                                          . "&column2_filter=$creature_life_type_filter"
                                          . "&column3_filter=$creature_size_filter"
                                          . "&column4_filter=$creature_diet_filter"
                                          . "&items_per_page=500'>";
                              }
                              
                              }
                              ?>
      
      <form class="form-inline" method="post" action="">
          
              <div class="row-fluid">
                <div class="col-md-2">
              
            <h4> Parent Type:
                            <select name="creature_parent_type_filter" class="form-control" id="form_css">
                            <option value="none">No Filter</option> 
                            <option value="Planet">Planet</option>
                            <option value="Moon">Moon</option>
                            
                                    
                            </select>
                </div>
              
            <div class="col-md-2">
              
            <h4> Domain:
                            <select name="creature_life_type_filter" class="form-control" id="form_css">
                            <option value="none">No Filter</option>    
                            <option value="Air">Air</option>
                            <option value="Land">Land</option>
                            <option value="Sea">Sea</option>
                                    
                            </select>
                
            </div>
                  
                  <div class="col-md-2">
              
            <h4> Size:
                            <select name="creature_size_filter" class="form-control" id="form_css">
                            <option value="none">No Filter</option>    
                            <option value="Tiny">Tiny</option>
                            <option value="Small">Small</option>
                            <option value="Medium">Medium</option>
                            <option value="Large">Large</option>
                            <option value="Huge">Huge</option>
                                    
                            </select>
                
            </div>
                  
                  <div class="col-md-2">
              
            <h4> Diet:
                            <select name="creature_diet_filter" class="form-control" id="form_css">
                            <option value="none">No Filter</option>    
                            <option value="Herbivore">Herbivore</option>
                            <option value="Carnivore">Carnivore</option>
                            <option value="Omnivore">Omnivore</option>
                                    
                            </select>
                
            </div>
         
                  
                  
              
                
          <div style="margin-left: 620px; margin-bottom: 30px;" class="col-md-2">
            <input class="btn btn-success" id="button_filter" type="submit" name="filter_creature" value="Filter">
            </div>  
                  
                  </div>
      
    </form>
    </div>
  </div>
   
</div>
   
  <?php
          
          
          
          
          break;
          
          // </editor-fold>
          
      // <editor-fold defaultstate="collapsed" desc="Flora Case">
      case "flora":
//          echo "This is the planets case";
          ?>
              
              <br>
              
              <h1 id="column_name" style="font-family: noMansFont; font-size: 40pt;">Flora</h1>
              <br>
              <?php
          
          $limit = 1100;
          $data_array = sort_table("$table" , $flora_limit , "id" , "$column" , "$order" );
          $total_limit = count($data_array);
           ?>
          
          <html>
    
    <table id="table1" class="table">
        <col width="10">
        <col width="160">
        <col width="240">
  <thead>
      <tr>
          <th>#</th>
          <th id="column_name"><a href="table.php?table_type=<?= $table; ?>&column=name&order=<?= $column1; ?>&order_id=<?= "column1_" . $column1; ?>"> Name </a></th>
          <th id="column_name"><a href="table.php?table_type=<?= $table; ?>&column=parent_planet&order=<?= $column2; ?>&order_id=<?= "column2_" . $column2; ?>">Parent World</a></th>
          <th id="column_name"><a href="table.php?table_type=<?= $table; ?>&column=parent_type&order=<?= $column4; ?>&order_id=<?= "column4_" . $column4; ?>">Parent Type</a></th>
          <th id="column_name"><a href="table.php?table_type=<?= $table; ?>&column=size&order=<?= $column6; ?>&order_id=<?= "column6_" . $column6; ?>">Size</a></th>
          <th id="column_name"><a href="table.php?table_type=<?= $table; ?>&column=diet&order=<?= $column7; ?>&order_id=<?= "column7_" . $column7; ?>">Diet</a></th>
          <th id="column_name"><a href="table.php?table_type=<?= $table; ?>&column=rating&order=<?= $column8; ?>&order_id=<?= "column8_" . $column8; ?>">Rating</a></th>
          <th id="column_name"><a href="table.php?table_type=<?= $table; ?>&column=date_logged&order=<?= $column9; ?>&order_id=<?= "column9_" . $column9; ?>">Date Logged</a></th>
 
      </tr>
  </thead>
  <tbody>
      <?php
        
         while ($id < $page){
          
          $sql = $conn->prepare("SELECT * FROM `$table` WHERE `ID` = :id");
              $sql->bindParam('id', $data_array[$id], PDO::PARAM_INT);
              $sql->execute();

              $result = $sql->fetchObject();
              
              if ($result != false){
                  
//                  $disable = "enabled";
              
              $object_id = $result->id;
              $flora_name = $result->name;
              $flora_size = $result->size;
              $flora_rating = $result->rating;
              $date_logged = $result->date_logged;
              $flora_parent = $result->parent_planet;
              $flora_parent_type = $result->parent_type;
              $flora_diet = $result->diet;
    
              $timestamp = strtotime($date_logged);
                        $date_logged = date("H:ia  d/M/y", $timestamp);
                        
                        if($column1_filter != "none"){
                            if($column1_filter != $flora_parent_type){
                                $filters = true;
                            }else{}
                        }
                        
                        if($column3_filter != "none"){
                            if($column3_filter != $flora_size){
                                $filters = true;
                            }else{}
                        }
                        
                        if($column4_filter != "none"){
                            if($column4_filter != $flora_diet){
                                $filters = true;
                            }else{}
                        }
                        
                        if($filters == false){
                        ?>
      <tr>
          <th scope="row"><?= $id + 1; ?></th>
          <td><?= $flora_name; ?></td>
          <td><?= $flora_parent; ?></td>
          <td><?= $flora_parent_type; ?></td>
          <td><?= $flora_size; ?></td>
          <td><?= $flora_diet; ?></td>
          <td><?= $flora_rating; ?></td>
          <td><?= $date_logged; ?></td>
      </tr>
      <?php
                        }else{}
              }else {
                  $id = $page;
//                  echo "No more results found";
                  $disable = "disabled";
              }
              $filters = false;
              $id++;
  }
          ?>
          
          
  <ul class="pager">
      <?php
        if($id >= $total_limit){
       $number1 = $id / $items_per_page;
       $number1 = round($number1, 0, PHP_ROUND_HALF_UP);
       $number1 = $items_per_page * $number1;
       $id = $number1;
   }
   
        if($id > $items_per_page){ ?>
    <li><a href="table.php?table_type=<?= $table; ?>&column=<?= $column; ?>&order=<?= $order; ?>&current_id=<?= ($id - ($items_per_page * 2)); ?>&page=<?= ($page - $items_per_page); ?>&items_per_page=<?= $offical_items_per_page; ?>">Previous</a></li>
        <?php }
    if($id < $total_limit){
        ?>
   <li><a href="table.php?table_type=<?= $table; ?>&column=<?= $column; ?>&order=<?= $order; ?>&current_id=<?= $id; ?>&page=<?= ($page + $items_per_page); ?>&items_per_page=<?= $offical_items_per_page; ?>">Next</a></li>
   
   
   <?php
  }
    ?>
   
   <br>
   <br>
   
   <!-- ////////////////////////////////// FILTERS /////////////////////////////////////////////-->
  <p>
  <a class="btn btn-primary" data-toggle="collapse" href="#collapseFlora" aria-expanded="false" aria-controls="collapseFlora">
    Filters ▼
  </a>
</p>
<div class="collapse" id="collapseFlora">
  <div class="container-fluid">
      
      <?php
        $planet_enviroment_filter = "none";
        $planet_climate_filter = "none";
                          if (isset($_POST['filter_flora'])) {
                              //save what is entered
                              $flora_parent_type_filter = $_POST['flora_parent_type_filter'];
                              $flora_diet_filter = $_POST['flora_diet_filter'];
                              $flora_size_filter = $_POST['flora_size_filter'];
                              if($flora_parent_type_filter == "none" && $flora_diet_filter == "none" 
                                       && $flora_size_filter == "none"){
                                  echo "<meta http-equiv='refresh' content='0; table.php?table_type=$table&column=$column&order=$order&column1_filter=$flora_parent_type_filter"
                                          . "&column3_filter=$flora_size_filter"
                                          . "&column4_filter=$flora_diet_filter"
                                          . "&items_per_page=$offical_items_per_page'>";
                              }else{
                              echo "<meta http-equiv='refresh' content='0; table.php?table_type=$table&column=$column&order=$order&column1_filter=$flora_parent_type_filter"
                                          . "&column3_filter=$flora_size_filter"
                                          . "&column4_filter=$flora_diet_filter"
                                          . "&items_per_page=500'>";
                              }
                              
                              }
                              ?>
      
      <form class="form-inline" method="post" action="">
          
              <div class="row-fluid">
                <div class="col-md-4">
              
            <h4> Parent Type:
                            <select name="flora_parent_type_filter" class="form-control" id="form_css">
                            <option value="none">No Filter</option> 
                            <option value="Planet">Planet</option>
                            <option value="Moon">Moon</option>
                            
                                    
                            </select>
                </div>
                  
                  <div class="col-md-4">
              
            <h4> Size:
                            <select name="flora_size_filter" class="form-control" id="form_css">
                            <option value="none">No Filter</option>    
                            <option value="Tiny">Tiny</option>
                            <option value="Small">Small</option>
                            <option value="Medium">Medium</option>
                            <option value="Large">Large</option>
                            <option value="Huge">Huge</option>
                                    
                            </select>
                
            </div>
                  
                  <div class="col-md-4">
              
            <h4> Diet:
                            <select name="flora_diet_filter" class="form-control" id="form_css">
                            <option value="none">No Filter</option>    
                            <option value="Herbivore">Herbivore</option>
                            <option value="Carnivore">Carnivore</option>
                            <option value="Omnivore">Omnivore</option>
                                    
                            </select>
                
            </div>
         
                  
                  
              
                
          <div style="margin-left: 620px; margin-bottom: 30px;" class="col-md-1">
            <input class="btn btn-success" id="button_filter" type="submit" name="filter_flora" value="Filter">
            </div>  
                  
                  </div>
      
    </form>
    </div>
  </div>
   
</div>
   
  <?php
          
          
          
          
          break;
          
          // </editor-fold>
          
      // <editor-fold defaultstate="collapsed" desc="Ships Case">
      case "ships":
//          echo "This is the planets case";
          ?>
              
              <br>
              
              <h1 id="column_name" style="font-family: noMansFont; font-size: 40pt;">Ships</h1>
              <br>
              <?php
          
          $limit = 1100;
          $data_array = sort_table("$table" , $ship_limit , "id" , "$column" , "$order" );
          $total_limit = count($data_array);
           ?>
          
          <html>
    
    <table id="table1" class="table">
        <col width="10">
  <thead>
      <tr>
          <th>#</th>
          <th id="column_name"><a href="table.php?table_type=<?= $table; ?>&column=name&order=<?= $column1; ?>&order_id=<?= "column1_" . $column1; ?>"> Name </a></th>
          <th id="column_name"><a href="table.php?table_type=<?= $table; ?>&column=parent_planet&order=<?= $column2; ?>&order_id=<?= "column2_" . $column2; ?>">Ship Type</a></th>
 
      </tr>
  </thead>
  <tbody>
      <?php
        
         while ($id < $page){
          
          $sql = $conn->prepare("SELECT * FROM `$table` WHERE `ID` = :id");
              $sql->bindParam('id', $data_array[$id], PDO::PARAM_INT);
              $sql->execute();

              $result = $sql->fetchObject();
              
              if ($result != false){
                  
//                  $disable = "enabled";
              
              $object_id = $result->id;
              $ship_name = $result->name;
              $ship_type = $result->type;
    
              
                        
                        if($column2_filter != "none"){
                            if($column2_filter != $ship_type){
                                $filters = true;
                            }else{}
                        }
                        
                        if($filters == false){
                        ?>
      <tr>
          <th scope="row"><?= $id + 1; ?></th>
          <td><?= $ship_name; ?></td>
          <td><?= $ship_type; ?></td>
      </tr>
      <?php
                        }else{}
              }else {
                  $id = $page;
//                  echo "No more results found";
                  $disable = "disabled";
              }
              $filters = false;
              $id++;
  }
          ?>
          
          
  <ul class="pager">
      <?php
        if($id >= $total_limit){
       $number1 = $id / $items_per_page;
       $number1 = round($number1, 0, PHP_ROUND_HALF_UP);
       $number1 = $items_per_page * $number1;
       $id = $number1;
   }
   
        if($id > $items_per_page){ ?>
    <li><a href="table.php?table_type=<?= $table; ?>&column=<?= $column; ?>&order=<?= $order; ?>&current_id=<?= ($id - ($items_per_page * 2)); ?>&page=<?= ($page - $items_per_page); ?>&items_per_page=<?= $offical_items_per_page; ?>">Previous</a></li>
        <?php }
    if($id < $total_limit){
        ?>
   <li><a href="table.php?table_type=<?= $table; ?>&column=<?= $column; ?>&order=<?= $order; ?>&current_id=<?= $id; ?>&page=<?= ($page + $items_per_page); ?>&items_per_page=<?= $offical_items_per_page; ?>">Next</a></li>
   
   
   <?php
  }
    ?>
   
   <br>
   <br>
   
   <!-- ////////////////////////////////// FILTERS /////////////////////////////////////////////-->
  <p>
  <a class="btn btn-primary" data-toggle="collapse" href="#collapseShip" aria-expanded="false" aria-controls="collapseShip">
    Filters ▼
  </a>
</p>
<div class="collapse" id="collapseShip">
  <div class="container-fluid">
      
      <?php
        $planet_enviroment_filter = "none";
        $planet_climate_filter = "none";
                          if (isset($_POST['filter_ships'])) {
                              //save what is entered
                              $ship_type_filter = $_POST['ship_type_filter'];
                              if($ship_type_filter == "none"){
                                  echo "<meta http-equiv='refresh' content='0; table.php?table_type=$table&column=$column&order=$order&column2_filter=$ship_type_filter"
                                          . "&items_per_page=$offical_items_per_page'>";
                              }else{
                              echo "<meta http-equiv='refresh' content='0; table.php?table_type=$table&column=$column&order=$order&column2_filter=$ship_type_filter"
                                          . "&items_per_page=500'>";
                              }
                              
                              }
                              ?>
      
      <form class="form-inline" method="post" action="">
          
              <div class="row-fluid">
                <div class="col-md-3">
              
            <h4> Ship Type:
                            <select name="ship_type_filter" class="form-control" id="form_css">
                            <option value="none">No Filter</option> 
                            <option value="Scientific">Scientific</option>
                            <option value="Combat">Combat</option>
                            <option value="Explorer">Explorer</option>
                            <option value="Trader">Trader</option>
                            
                                    
                            </select>
                </div>
         
                  
                  
              
                
          <div style="margin-left: 0px; margin-bottom: 10px; margin-top: 2px;" class="col-md-3">
            <input class="btn btn-success" id="button_filter" type="submit" name="filter_ships" value="Filter">
            </div>  
                  
                  </div>
      
    </form>
    </div>
  </div>
   
</div>
   
  <?php
          
          
          
          
          break;
          
          // </editor-fold>
          
      // <editor-fold defaultstate="collapsed" desc="Default Case">
      default:
          echo "<meta http-equiv='refresh' content='0; index.php'>";
          
          // </editor-fold>
  }
  
  ?>
  




  
  
  

