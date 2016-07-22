<!DOCTYPE html>
<?php
  $current_page = "index";
  require_once('C:\xampp\htdocs\no_mans_sky\includes\db.php');
  require_once('C:\xampp\htdocs\no_mans_sky\includes\db_checking.php');
  
  global $conn;
$current_page = "index";

//$actual_link = "$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
//debug_to_console("URL: $actual_link");
  
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
  
  
  ?>
  
    <head>
        <title><?= $name ?></title>
        
        
    </head>
    
    <style>
        
        
        @font-face {
                font-family: noMansFont;
                src: url(fonts/geonms-webfont.ttf) format('truetype');
            }
            
            @font-face {
                font-family: paint_style;
                src: url(fonts/paint_style.ttf) format('truetype');
            }
            
            #title{
                font-family: paint_style;
                font-size: 70pt;
/*                font-weight: bold; */
                color:white;
                margin-bottom: 40px;
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
            
            #link{
                font-family: paint_style;
                font-size: 27pt;
                 
                color:white;
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
            
            
            body{
                
                background: url(images/background12.jpg) no-repeat center center fixed; 
                -webkit-background-size: cover;
                -moz-background-size: cover;
                -o-background-size: cover;
                background-size: cover;
    
            }
    </style>
    
  
        <?php
  
    
  
  switch($media_type){
      case "image":
          ?>
          <img style="margin-top: 20px; margin-left:auto; margin-right: auto; display:block; " src="<?= $image ?>" width="1000" height="600"/>
          <h1 style="margin-top: 20px; margin-bottom: 20px; text-align: center; font-family: noMansFont; font-size: 40pt; color:white "> <?= $name ?></h1>
          
        <?php
          break;
      
      default: 
          echo "Sorry Could not find this item";
          break;
      
      case "video":
          ?>
          <video  style="margin-top: 20px; margin-left:auto; margin-right: auto; display:block;" width="1000" height="565"  controls="controls">
    <source src="<?= $image; ?>" type="video/mp4" />
    <object width="640" height="375" classid="clsid:02BF25D5-8C17-4B23-BC80-D3488ABDDC6B"></object>
</video>
          <h1 style="margin-top: 20px; margin-bottom: 20px; text-align: center; font-family: noMansFont; font-size: 40pt; color:white"> <?= $name ?></h1>
          
          
          <?php
          break;
      
      
      
      case "links":
          include_once('C:\xampp\htdocs\no_mans_sky\includes\bootstrap.php');
          global $media_limit;
          
  
         //Display the links to different images and videos
          ?>
          <body>
          <div style="margin-left: 30px; margin-top: 40px; " class="container">
              
              <!-- Left side of page - PICTURES-->
              
              <div style="float: left; width: 516px; text-align: center;"
              <div style="text-align: right;">
                  <h1 id="title"> IMAGES </h1>
                  <?php
                    $id = 0;
                    
                    while($id <= $media_limit){
                        
                    $sql = $conn->prepare("SELECT * FROM `media` WHERE `id` = :id");
              $sql->bindParam('id', $id, PDO::PARAM_INT);
              $sql->execute();

              $result = $sql->fetchObject();
              //check the result is real
              if($result != false){
                  
                  $name = $result->name;
                  $type = $result->type;
                  $file = $result->file;
                  $date = $result->date;
                  
                  $timestamp = strtotime($date);
                        $date = date("H:ia  d/M/Y", $timestamp);
                  
                  if($type == "image"){
                      
                  
              
              
                    ?>
                  <div style="margin-top: 20px;" row>
                  
                      <a style="color: white;" target="_blank" href="display_media.php?media_type=image&folder=media&name=<?= $name;?>&media=<?= $file;?>"><p1  id="link"><?= $name; ?></p1></a><br>
                      <p1 style="color:white; font-family: noMansFont; font-size: 13pt;">Uploaded <?= $date;?></p1>
                  </div>
                          <?php
  }}$id++;
  
                  }
                            ?>
                  
                  
              </div>
                   
                   
                   <!-- Right side of page - VIDEOS-->
                   <div style="float: right; width: 516px; text-align: center;"
              <div class="row">
                  <h1 id="title" > VIDEOS </h1>
                  
                  <?php
                    $id = 0;
                    
                    while($id <= $media_limit){
                        
                    $sql = $conn->prepare("SELECT * FROM `media` WHERE `id` = :id");
              $sql->bindParam('id', $id, PDO::PARAM_INT);
              $sql->execute();

              $result = $sql->fetchObject();
              //check the result is real
              if($result != false){
                  
                  $name = $result->name;
                  $type = $result->type;
                  $file = $result->file;
                  
                  if($type == "video"){
                      
                  
              
              
                    ?>
                  <div style="margin-top: 30px;" row>
                  
                      <a  style="color: white;" target="_blank" href="display_media.php?media_type=video&folder=media&name=<?= $name;?>&media=<?= $file;?>"><p1  id="link" ><?= $name; ?></p1></a><br>
                  <p1 style="color:white; font-family: noMansFont; font-size: 13pt;">Uploaded <?= $date;?></p1>
                  </div>
                  
                  
                          <?php
  }}$id++;
  
                  }
                            ?>
                  
              </div>
              
              
              
          </div>
                   </body>
          <?php
          break;
      
      
  }
      
 
      ?>
                   
              
  

<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

  
  

