
  
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
    
    
</style>

<?php

$current_page = "index";
  require_once('C:\xampp\htdocs\no_mans_sky\includes\db.php');
  require_once('C:\xampp\htdocs\no_mans_sky\includes\db_checking.php');
  include('C:\xampp\htdocs\no_mans_sky\includes\bootstrap.php');
  global $conn;
  
  global $galaxy_limit;
  $items_per_page = 100;
  $page = $items_per_page;
  $id = 0;
  $table = "default"; 
  
  
  if (isset($_GET['table_type'])) {
  $table = $_GET['table_type'];}
  
  if (isset($_GET['column'])) {
  $column = $_GET['column'];}
  
  if (isset($_GET['order'])) {
  $order = $_GET['order'];}
  
  if (isset($_GET['page'])) {
  $page = $_GET['page'];}
  
  if (isset($_GET['current_id'])) {
  $id = $_GET['current_id'];}
  
//  echo "Table = " , $table , "</br>";
//  echo "Column = " , $column , "</br>";
//  echo "Order = " , $order , "</br>";
//  echo "page = " , $page , "</br>";
  
  
  switch($table){
      
      case "galaxy":
//          echo "This is the Galaxy Case";
          $limit = $galaxy_limit;
          $data_array = sort_table("galaxy" , $galaxy_limit , "Id" , "name" , "ASC" );
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
          <th id="column_name">Star Systems</th>
          <th id="column_name">Planets</th>
          <th id="column_name">Moons</th>
          <th id="column_name">Creatures</th>
          <th id="column_name">Flora</th>
 
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
          
      case "star_systems":
          echo "This is the star system case";
          break;
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
    <li class="pager-next <?= $disable; ?>"><a href="table.php?table_type=<?= $table; ?>&column=<?= $column; ?>&order=<?= $order; ?>&current_id=<?= $id; ?>&page=<?= ($page + $items_per_page); ?>">Next</a></li>
  </ul>
  <?php
          
  
          
          
          
          
          break;
      default:
          echo "<meta http-equiv='refresh' content='0; index.php'>";
  }
  
  ?>




  
  
  

