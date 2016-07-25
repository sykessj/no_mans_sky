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
      
      
  }
      
 
      ?>
                   
              
  

<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

  
  

