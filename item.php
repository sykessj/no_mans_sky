<?php

$current_page = "item";
  require_once('C:\xampp\htdocs\no_mans_sky\includes\db.php');
  require_once('C:\xampp\htdocs\no_mans_sky\includes\db_checking.php');
  include('C:\xampp\htdocs\no_mans_sky\includes\bootstrap.php');
  
  echo "This is the item page </br>";
  
  $table = "";
  $id = 0;
  
  if (isset($_GET['database_type'])) {
  $table = $_GET['database_type'];}
  
  if (isset($_GET['item_id'])) {
  $id = $_GET['item_id'];}
  
  echo "The Selected table is " , $table , "</br>";
  echo "The Selected ID is " , $id , "</br>";
  
  $sql = $conn->prepare("SELECT * FROM `$table` WHERE `ID` = :id");
              $sql->bindParam('id', $id, PDO::PARAM_INT);
              $sql->execute();
              
              $result = $sql->fetchObject();
  
  switch($table){
      // <editor-fold defaultstate="collapsed" desc="Galaxy Case">
      case "galaxy":
          echo "You Selected the Galaxy Case </br> </br>";
          
          
              
              if ($result != false){
                  $name = $result->name;
                  $stars = $result->no_star_systems;
                  
                  echo "Name: " , $name , "</br>";
                  echo "Number of Systems: " , $stars , "</br>";
              }else{echo "Sorry, Could not find this item";}
              
          break;
      
      case "star_systems":
          echo "You Selected the star systems Case </br> </br>";
          
          if ($result != false){
                  $name = $result->name;
                  $galaxy = $result->galaxy;
                  
                  echo "Name: " , $name , "</br>";
                  echo "Galaxy: " , $galaxy , "</br>";
              }else{echo "Sorry, Could not find this item";}
          break;
      
      default:
          echo "You Selected a random case";
          break;
      // </editor-fold>
          
  }
  
  

