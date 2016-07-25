<?php

  $current_page = "index";
  require_once('C:\xampp\htdocs\no_mans_sky\includes\db.php');
  require_once('C:\xampp\htdocs\no_mans_sky\includes\db_checking.php');
  include_once('C:\xampp\htdocs\no_mans_sky\includes\bootstrap.php');
  global $conn;
  global $media_limit;
  ?>
  
  <style>
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
          

