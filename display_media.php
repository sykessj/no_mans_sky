<?php

  /* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
  
  $current_page = "index";
  
  require_once('C:\xampp\htdocs\no_mans_sky\includes\db.php');
  require_once('C:\xampp\htdocs\no_mans_sky\includes\db_checking.php');
  include('C:\xampp\htdocs\no_mans_sky\includes\bootstrap.php');
  
  $media_type = "";
  $media= "";
  $folder = "";
  $folder1 = "";
  $name = "";
  
  if (isset($_GET['media_type'])) {
  $media_type = $_GET['media_type'];}
  
  if (isset($_GET['name'])) {
  $name = $_GET['name'];}
  
  if (isset($_GET['media'])) {
  $media = $_GET['media'];
  $media = preg_replace('/^(\'(.*)\'|"(.*)")$/', '$2$3', $media);
  }
  
  if (isset($_GET['folder'])) {
  $folder = $_GET['folder'];}
  
  if (isset($_GET['folder1'])) {
  $folder1 = $_GET['folder1'];}

    if($folder1 != NULL){
        $image = "images/$folder/$folder1/$media";
    }
    else if($folder != NULL){
        $image = "images/$folder/$media";
    }
    else{
        $image = "images/$media";
    }
    
  
  switch($media_type){
      case "image":
          ?>
          <img style="margin-top: 70px; margin-left:auto; margin-right: auto; display:block;" src="<?= $image ?>" width="1000" height="600"/>
          <h1 style="margin-top: 20px; margin-bottom: 20px; text-align: center; font-family: noMansFont; font-size: 40pt; "> <?= $name ?></h1>
          
        <?php
          break;
      
      default: 
          echo "Sorry Could not find this item";
          break;
      
  }
      ?>
      
      
      
          
          
  
  
  

