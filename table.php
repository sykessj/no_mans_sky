
  

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
  
  // <editor-fold defaultstate="collapsed" desc="Variables and Get from URL Functions">
  global $galaxy_limit;
  global $star_system_limit;
  $items_per_page = 10;
  
  $id = 0;
  $table = "default"; 
  $order_id = "";
  $filters = false;
  
  $column1 = $column2 = 
          $column3 = $column4 = 
          $column5 = $column6 = 
          $column7 = $column8 = 
          $column9 = "DESC";
  
  $column1_filter = $column2_filter = 
          $column3_filter = $column4_filter = 
          $column5_filter = $column6_filter = 
          $column7_filter = $column8_filter = 
          $column9_filter = "none";
  
  
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
  // </editor-fold>

  
  
  switch($table){
      // <editor-fold defaultstate="collapsed" desc="Galaxy Case">
      case "galaxy":
//          echo "This is the Galaxy Case";
          
          ?>

          

              <br>
              <h1 id="column_name">Galaxies</h1>
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
      while ($id < $galaxy_limit){
          
          $sql = $conn->prepare("SELECT * FROM `$table` WHERE `Id` = :id");
              $sql->bindParam('id', $data_array[$id], PDO::PARAM_INT);
              $sql->execute();

              $result = $sql->fetchObject();
              
              if ($result != false){
              
              $name = $result->name;
              $no_star_systems = $result->no_star_systems;
              $no_planets = $result->no_planets;
              $no_moons = $result->no_moons;
              $no_creatures = $result->no_creatures;
              $no_flora = $result->no_flora;
              ?>
      <tr>
          <th scope="row"><?= ($id + 1); ?></th>
          <td><?= $name; ?></td>
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
              
              <h1 id="column_name">Star Systems</h1>
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
              
              $object_id = $result->ID;
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
          <td><?= $name; ?></td>
          <td><?= $galaxy; ?></td>
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
    <li><a href="table.php?table_type=<?= $table; ?>&column=<?= $column; ?>&order=<?= $order; ?>&current_id=<?= ($id - ($items_per_page * 2)); ?>&page=<?= ($page - $items_per_page); ?>&items_per_page=10">Previous</a></li>
        <?php }
    if($id < $total_limit){
        ?>
   <li><a href="table.php?table_type=<?= $table; ?>&column=<?= $column; ?>&order=<?= $order; ?>&current_id=<?= $id; ?>&page=<?= ($page + $items_per_page); ?>&items_per_page=10">Next</a></li>
   
   
   <?php
  }
    ?>
   
   <br>
   <br>
   <br>
   <!-- ////////////////////////////////// FILTERS /////////////////////////////////////////////-->
  <p>
  <a class="btn btn-primary" data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
    Filters +
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
                                  echo "<meta http-equiv='refresh' content='0; table.php?table_type=$table&column=$column&order=$order&column1_filter=$star_type_filter&column2_filter=$star_colour_filter&items_per_page=10'>";
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
          
      // <editor-fold defaultstate="collapsed" desc="Testing Case">
      case "testing":
          //page
          //id
          $limit = 1100;
          $data_array = sort_table("$table" , $limit , "test_id" , "$column" , "$order" );
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
          <th id="column_name">Name</th>
          <th id="column_name">Attribute One</th>
          <th id="column_name">Attribute Two</th>
 
      </tr>
  </thead>
  <tbody>
      <?php
        
         while ($id < $page){
          
          $sql = $conn->prepare("SELECT * FROM `$table` WHERE `test_id` = :id");
              $sql->bindParam('id', $data_array[$id], PDO::PARAM_INT);
              $sql->execute();

              $result = $sql->fetchObject();
              
              if ($result != false){
                  
                  $disable = "enabled";
              
              $test_id = $result->test_id;
              $name = $result->name;
              $attr_one = $result->attr_one;
              $attr_two = $result->attr_two;
              
              ?>
      <tr>
          <th scope="row"><?= $id + 1; ?></th>
          <td><?= $name; ?></td>
          <td><?= $attr_one; ?></td>
          <td><?= $attr_two; ?></td>
      </tr>
      <?php
              }else {
                  $id = $page;
                  echo "No more results found";
                  $disable = "disabled";
              }
              $id++;
          }
          ?>
          
          
  <ul class="pager">
    <li><a href="table.php?table_type=<?= $table; ?>&column=<?= $column; ?>&order=<?= $order; ?>&current_id=<?= ($id - ($items_per_page * 2)); ?>&page=<?= ($page - $items_per_page); ?>">Previous</a></li>
    <?php
    if($id < $total_limit){
        ?>
    <li><a href="table.php?table_type=<?= $table; ?>&column=<?= $column; ?>&order=<?= $order; ?>&current_id=<?= $id; ?>&page=<?= ($page + $items_per_page); ?>">Next</a></li>
  <?php
    
  }
    ?>
  </ul>
  <?php
          
          break;
          
          // </editor-fold>
          
      // <editor-fold defaultstate="collapsed" desc="Default Case">
      default:
          echo "<meta http-equiv='refresh' content='0; index.php'>";
          
          // </editor-fold>
  }
  
  ?>
  




  
  
  

