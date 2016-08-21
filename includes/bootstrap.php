<!DOCTYPE html>
<?php
  
                          if (isset($_POST['search_submit'])) {
                              
                              //save what is entered
                              $search_string = $_POST['search_string'];
                              
                              
                              
//                             echo "<meta http-equiv='refresh' content='0; search_results.php?search_string=$search_string'>";
                              $search_location = "search_results.php?search_string=$search_string";
                             header('Location: '.$search_location);
                              
                       
              
              
                          
                          }
                              
  require_once('C:\xampp\htdocs\no_mans_sky\includes\db.php');
  require_once('C:\xampp\htdocs\no_mans_sky\includes\db_checking.php');
  require_once('C:\xampp\htdocs\no_mans_sky\includes\edit_and_delete_functions.php');
  global $galaxy_limit;
  global $star_system_limit;
  global $planet_limit;
  global $moon_limit;
  
  
  
  
  $item_number = mt_rand(1,7);
  $item_array = random_discovery($item_number);
  
  $moon_star = "this is not really working";
  
//  debug_to_console("Current URL: $current_url");
  
  $link_id = 0;
  $edit_name = "none";
  $edit_type = "none";
  $edit_image = "none";
  
  
  
  if (isset($_GET['id'])) {
  $link_id = $_GET['id'];}
  
  if (isset($_GET['edit_table'])) {
  $edit_table = $_GET['edit_table'];}
  
  if (isset($_GET['edit_id'])) {
  $edit_id = $_GET['edit_id'];}
  
  if (isset($_GET['edit_var1'])) {
  $edit_var1 = $_GET['edit_var1'];}
  
  if (isset($_GET['edit_var2'])) {
  $edit_var2 = $_GET['edit_var2'];}
  
  if (isset($_GET['edit_var3'])) {
  $edit_var3 = $_GET['edit_var3'];}
  
  if (isset($_GET['edit_var4'])) {
  $edit_var4 = $_GET['edit_var4'];}
  
  if (isset($_GET['edit_var5'])) {
  $edit_var5 = $_GET['edit_var5'];}
  
  if (isset($_GET['edit_var6'])) {
  $edit_var6 = $_GET['edit_var6'];}
  
  if (isset($_GET['edit_var7'])) {
  $edit_var7 = $_GET['edit_var7'];}
  
  if (isset($_GET['edit_var8'])) {
  $edit_var8 = $_GET['edit_var8'];}
  
  if (isset($_GET['edit_var9'])) {
  $edit_var9 = $_GET['edit_var9'];}
  
  if (isset($_GET['edit_var10'])) {
  $edit_var10 = $_GET['edit_var10'];}
  
  if (isset($_GET['edit_var11'])) {
  $edit_var11 = $_GET['edit_var11'];}
  
  
  
  ?>
  
 
  
  
  
<?php
  function test_input($data) {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
  }

  $number = 1;
  $planet_test = 0;
?>



<html lang="en">
    <head>
        <title>Joe Mans Sky</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="icon" type="image/x-icon" href="images/icon6.png">
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        
    </head>

    
        <style>
            #nav_button{
                color: white;
            } 

            .error{
                color: red;
            }

            #title_id{
                text-align: center;

            }
            #formDiv{
                margin-top: 40px;
                margin-left: 200px;
                margin-right: 150px;
            }

            #submit_button{
                margin-bottom: 50px;
                margin-left: 420px;
                margin-right:auto;

            }

            #submit_button1{
                margin-bottom: 100px;
                margin-left: 420px;
                margin-right:auto;

            }

            #link_css{
                color: grey;
                margin-left: 20px;
            }
            
            .modal { overflow: auto !important; }
            
            @font-face {
                font-family: noMansFont;
                src: url(fonts/geonms-webfont.ttf) format('truetype');
            }
            
            nav{
                background-image: url("images/pw_maze_black_2X.png");
                
            }
            
            #nav_links {
                color: white;
                font-family: noMansFont;
                font-size: 30pt;
                
                
            }
            
            .dropdown-menu{
                background: black;
                color: white;
            }
            
            #nav_links:hover{
                color: white;
                
                background: url("images/background3.jpg");
                
            }
            
            #nav_links:active{
                
                font-weight: bold;
            }
            
            #nav_links:focus{
                background: url("images/background3.jpg");
                font-weight: bold;
            }
            
            .dropdown-menu li a{
                color: white;
                font-family: noMansFont;
                font-size: 14pt;
           }
           
           .dropdown-menu>li>a:hover{
               color: white;
               font-weight: bold;
               background: url("images/background3.jpg");
           }
           
           /* STATISTICS MODAL */
           
           #stat_text{
               margin-top: 10px;
               margin-bottom: 10px;
               font-family: noMansFont;
               font-weight: bold;
               font-size: 25pt;
           }
           
           #progress_low::-webkit-progress-value {
    background: linear-gradient(to right, #ff0000, #ff3333);}
           #progress_medium::-webkit-progress-value {
    background: linear-gradient(to right, #ffa600, #ffc966);;}
           #progress_high::-webkit-progress-value {
    background: linear-gradient(to right, #00e600, #4dff4d);}
           #progress_complete::-webkit-progress-value {
    background: linear-gradient(to right, #00e6e6, #4dffff);}
           
          
/*style="color: white; font-family: noMansFont; font-size: 14pt;*/


        </style>
        
        
    <body>
        
        <?php
          if($link_id == 1){
              echo "
                  <script type='text/javascript'>
    $(window).load(function()
{
    $('#moon_modal').modal('show');
});
</script>";
          }
          if($link_id == 2){
              echo "
                  <script type='text/javascript'>
    $(window).load(function()
{
    $('#creature_modal').modal('show');
});
</script>";
          }
          if($link_id == 3){
              echo "
                  <script type='text/javascript'>
    $(window).load(function()
{
    $('#flora_modal').modal('show');
});
</script>";
          }
          
          if($link_id == 4){
              echo "
                  <script type='text/javascript'>
    $(window).load(function()
{
    $('#ship_edit_modal').modal('show');
});
          </script>";}
              
              if($link_id == 5){
              echo "
                  <script type='text/javascript'>
    $(window).load(function()
{
    $('#flora_edit_modal').modal('show');
});
</script>";
          }
          
          if($link_id == 6){
              echo "
                  <script type='text/javascript'>
    $(window).load(function()
{
    $('#creature_edit_modal').modal('show');
});
</script>";
          }
          
          if($link_id == 7){
              echo "
                  <script type='text/javascript'>
    $(window).load(function()
{
    $('#moon_edit_modal').modal('show');
});
</script>";
          }
          
          if($link_id == 8){
              echo "
                  <script type='text/javascript'>
    $(window).load(function()
{
    $('#planet_edit_modal').modal('show');
});
</script>";
          }
          
          if($link_id == 9){
              echo "
                  <script type='text/javascript'>
    $(window).load(function()
{
    $('#star_system_edit_modal').modal('show');
});
</script>";
          }
          
          if($link_id == 10){
              echo "
                  <script type='text/javascript'>
    $(window).load(function()
{
    $('#galaxy_edit_modal').modal('show');
});
</script>";
          }
          
          if($link_id == 11){
              image_check();
          }
          
          
// <editor-fold defaultstate="collapsed" desc="Nav Bar">?>
        
        <!--/////////////////////////// NAV BAR  //////////////////////////// -->
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <ul id="nav" class="nav navbar-nav">
                    <li><a id="nav_links" href="index.php">Home</a></li>
                    <li><a id="nav_links" href="" data-toggle="modal" data-target="#stats_modal">Statistics</a></li>
                    <li><a id="nav_links" href="" data-toggle="modal" data-target="#goals_modal">Goals</a></li>
                    <li><a id="nav_links" href="display_media_links.php">Media</a></li>
                    <li class="dropdown">
                        <a id="nav_links" href="#"  class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">View <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="table.php?table_type=galaxy&column=name&order=ASC&page=1">Galaxies</a></li>
                            <li><a href="table.php?table_type=star_systems&column=name&order=ASC">Star Systems</a></li>
                            <li><a href="table.php?table_type=planets&column=name&order=ASC">Planets</a></li>
                            <li><a href="table.php?table_type=moons&column=name&order=ASC">Moons</a></li>
                            <li><a href="table.php?table_type=creatures&column=name&order=ASC">Creatures</a></li>
                            <li><a href="table.php?table_type=flora&column=name&order=ASC">Flora</a></li>
                            <li><a href="table.php?table_type=ships&column=name&order=ASC">Ships</a></li>
                            <li><a href="index.php?id=11">Image Check</a></li>
                            
                        </ul>
                    </li>
                    <li><a id="nav_links" href="item.php?database_type=<?= $item_array[0]; ?>&item_id=<?= $item_array[1]; ?>">?</a></li>
                    
                    
                    

                </ul>
                <ul id="nav2" class="nav navbar-nav navbar-right">
                    <form class="navbar-form navbar-left" method="post" >
                        
                         
                        
                        <div class="form-group">
                            <input style="font-family: noMansFont; font-size: 14pt" type="text" name="search_string" class="form-control" placeholder="Search">
                        </div>
                        <input style="color: black; background: white; font-family: noMansFont; font-size: 12pt; font-weight: bold;" class="btn" type="submit" name="search_submit" value="Search">
                    </form>

                    <li class="dropdown">
                        <a id="nav_links"  href="#"  class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">✚ <span class="caret"></span></a>
                        <ul class="dropdown-menu">

                            <li><a href="" data-toggle="modal" data-target="#galaxy_modal">Galaxy</a></li>
                            <li><?php

                                  if ($galaxy_limit != 0) {
                                        echo '<a href="" data-toggle="modal" data-target="#star_modal">Star System</a>';
                                  } else {
                                      echo '<p1 id="link_css"> Star System </p1>';
                                  }
                                ?>
                            </li>
                            <li><?php
                                  if ($star_system_limit != 0)       {
                                      echo '<a href="" data-toggle="modal" data-target="#planet_modal">Planet</a>';
                                  } else {
                                      
                                      echo '<p1 id="link_css"> Planet </p1>';
                                  }
                                ?>
                            </li>
                            <li>
                                <?php
                                  if ($planet_limit != 0) {
                                      echo '<a href="" data-toggle="modal" data-target="#choice_modal_moon">Moon</a>';
                                  } else {
                                      
                                      echo '<p1 id="link_css"> Moon </p1>';
                                  }
                                ?>
                            </li>
                            <li>
                                <?php
                                  if ($planet_limit != 0) {
                                      echo '<a href="" data-toggle="modal" data-target="#choice_modal_creature">Creature</a>';
                                  } else {
                                      
                                      echo '<p1 id="link_css"> Creature </p1>';
                                  }
                                ?>
                            </li>
                            <li>
                                <?php
                                  if ($planet_limit != 0) {
                                      echo '<a href="" data-toggle="modal" data-target="#choice_modal_flora">Flora</a>';
                                  } else {
                                      
                                      echo '<p1 id="link_css"> Flora </p1>';
                                  }
                                ?>
                            </li>
                            <li>
                                <?php
                                  if ($planet_limit != 0) {
                                      echo '<a href="" data-toggle="modal" data-target="#ship_modal">Ship</a>';
                                  } else {
                                      
                                      echo '<p1 id="link_css"> Ship </p1>';
                                  }
                                ?>
                            </li>
                            <li><a href="" data-toggle="modal" data-target="#media_modal">Media</a></li>
                            
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
        
        <?php
                    // </editor-fold>
                    
        ////////////////////////////// EDIT MODALS /////////////////////////////////--> 
        // <editor-fold defaultstate="collapsed" desc="Galaxy edit modal">
  
  ?>
                  
                  <div class="modal fade" id="galaxy_edit_modal" tabindex="-1" role="dialog"
             aria-labelledby="myModalLabel5" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <h1 id="title_id"> Edit Galaxy </h1>
     
                    <div id="formDiv">
                    <form method="post" action="item.php?database_type=<?= $edit_table; ?>&item_id=<?= $edit_id; ?>">
                        <input style="display: none;"  name="edit_object_id" value="<?= $edit_id;?>">
                            <input id="ship_input" class="form-control" type="text" name="edit_galaxy_name" value="<?= $edit_var1;?>" placeholder="name">
                    
                            <br><br>   
                            </div>
                        
                   
                        <?php
                          if (isset($_POST['edit_galaxy_submit'])) {
                              
                              //save what is entered
                              $edit_var1 = $_POST['edit_galaxy_name'];
                              
                              $object_id = $_POST['edit_object_id'];
                              
                              edit_galaxy($edit_var1, $object_id);
                              
//                              $sql = $conn->prepare("UPDATE `test2` SET `name` = '$edit_var4' WHERE `planet_id` = '3'");
//              $sql->execute();
//              
//              $sql = $conn->prepare("UPDATE `test2` SET `enviroment` = '$edit_var2' WHERE `planet_id` = '3'");
//              $sql->execute();
              
              
                          
                          }
                              ?>
                          
                    
                    
                    
                    <input class="btn btn-success" id="submit_button" type="submit" name="edit_galaxy_submit" value="Confirm">
           </form>
                    
                    
                </div>
                </div>
                </div>
        
                
                  <?php
                    // </editor-fold>
          
          // <editor-fold defaultstate="collapsed" desc="Star System edit modal">
  
  ?>
                  
                  <div class="modal fade" id="star_system_edit_modal" tabindex="-1" role="dialog"
             aria-labelledby="myModalLabel5" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <h1 id="title_id"> Edit Star System </h1>
     
                    <div id="formDiv">
                    <form method="post" action="item.php?database_type=<?= $edit_table; ?>&item_id=<?= $edit_id; ?>">
                        <input style="display: none;"  name="edit_object_id" value="<?= $edit_id;?>">
                        <input style="display: none;"  name="edit_star_original_image" value="<?= $edit_var4;?>">
                            <input id="ship_input" class="form-control" type="text" name="edit_star_system_name" value="<?= $edit_var1;?>" placeholder="name">
                            <br><br>
                            
                            <h4> Star Type: </h4>
                                <select name="edit_star_system_type" class="form-control"id="dropdownMenu1">
                                    <option value="<?= $edit_var2;?>">Current <?= $edit_var2;?></option>
                                    <option value="G">G</option>
                                    <option value="K">K</option>
                                    <option value="E">E</option>
                                    <option value="B">B</option>
                                    <option value="M">M</option>
                                    <option value="F">F</option>
                                    <option value="O">O</option>
                                    
                                </select>
                                <br>
                                <h4> Star Colour: </h4>
                                <select name="edit_star_system_colour" class="form-control"id="dropdownMenu1">
                                    <option value="<?= $edit_var3;?>">Current <?= $edit_var3;?></option>
                                    <option value="Yellow">Yellow</option>
                                    <option value="Yellow White">Yellow White</option>
                                    <option value="Orange">Orange</option>
                                    <option value="Green">Green</option>
                                    <option value="Blue">Blue</option>
                                    <option value="Blue White">Blue White</option>
                                    <option value="Red">Red</option>
                                    
                                    
                                    
                                </select>
                                <br>
                            
                            
                            
                                    <br><br>
                                    <h4> Select image to upload: </h4>
                                <input class="btn btn-primary form-control" type="file" name="edit_star_system_main_image" id="fileToUpload">
                                <br>
                                    
                                    
                                    
                                    
                                    
                            </div>
                        
                    <br>
                        <?php
                          if (isset($_POST['edit_star_system_submit'])) {
                              
                              //save what is entered
                              $edit_var1 = $_POST['edit_star_system_name'];
                              $edit_var2 = $_POST['edit_star_system_type'];
                              $edit_var3 = $_POST['edit_star_system_colour'];
                              $edit_var4 = $_POST['edit_star_system_main_image'];
                              $edit_var5 = $_POST['edit_object_id'];
                              $original_image = $_POST['edit_star_original_image'];
                              
                              if($edit_var4 == NULL){
                                  $edit_var4 = $original_image;
                              }
                              
                              
                              edit_star_system($edit_var1, $edit_var2, $edit_var3, $edit_var4, $edit_var5);
                              
//                              $sql = $conn->prepare("UPDATE `test2` SET `name` = '$edit_var4' WHERE `planet_id` = '3'");
//              $sql->execute();
//              
//              $sql = $conn->prepare("UPDATE `test2` SET `enviroment` = '$edit_var2' WHERE `planet_id` = '3'");
//              $sql->execute();
              
              
                          
                          }
                              ?>
                          
                    
                    
                    
                    <input class="btn btn-success" id="submit_button" type="submit" name="edit_star_system_submit" value="Confirm">
                    
                    
                    
                </div>
                </div>
                </div>
        
                
                  <?php
                    // </editor-fold>
          
          // <editor-fold defaultstate="collapsed" desc="Planet edit modal">
  
  ?>
                  
                  <div class="modal fade" id="planet_edit_modal" tabindex="-1" role="dialog"
             aria-labelledby="myModalLabel5" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <h1 id="title_id"> Edit Planet </h1>
     
                    <div id="formDiv">
                    <form method="post" action="item.php?database_type=<?= $edit_table; ?>&item_id=<?= $edit_id; ?>">
                        <input style="display: none;"  name="edit_planet_object_id" value="<?= $edit_id;?>">
                        <input style="display: none;"  name="edit_planet_original_image" value="<?= $edit_var9;?>">
                        <input style="display: none;"  name="edit_planet_original_extra_image" value="<?= $edit_var10;?>">
                        <input style="display: none;"  name="edit_planet_original_extra_image1" value="<?= $edit_var11;?>">
                        <h4> Name: </h4>
                            <input id="flora_input" class="form-control" type="text" name="edit_planet_name" value="<?= $edit_var1;?>" placeholder="name">
                            <br>
                            
                            <h4> Atmosphere: </h4>
                                    <!-- ENTER ENVIROMENT INFORMATION -->
                                    <select name="edit_planet_enviroment" class="form-control" id="dropdownMenu1">
                                        <option value="<?= $edit_var2;?>">Current: <?= $edit_var2;?></option>
                                        <option value="Normal">Normal</option>
                                        <option value="Hot">Hot</option>
                                        <option value="Extreme Heat">Extreme Heat</option>
                                        <option value="Cold">Cold</option>
                                        <option value="Extreme Cold">Extreme Cold</option>
                                        <option value="Light Radioactivity">Light Radioactivity</option>
                                        <option value="Radioactive">Radioactive</option>
                                        <option value="Light Toxicity">Light Toxicity</option>
                                        <option value="Toxic">Toxic</option>
                                        
                                    </select>
                                    <br>
                                    <h4> Enviroment: </h4>
                                    <!-- ENTER CLIMATE INFORMATION -->
                                    <select name="edit_planet_climate" class="form-control" id="dropdownMenu1">
                                        <option value="<?= $edit_var3;?>">Current: <?= $edit_var3;?></option>
                                        <option value="Lush">Lush</option>
                                        <option value="Savannah">Savannah</option>
                                        <option value="Dessert">Dessert</option>
                                        <option value="Mediterranean">Mediterranean</option>
                                        <option value="Jungle">Jungle</option>
                                        <option value="Forest">Forest</option>
                                        <option value="Highland">Highland</option>
                                        <option value="Highland Swamp">Highland Swamp</option>
                                        <option value="Sub Arctic">Sub Arctic</option>
                                        <option value="Sub Zero">Sub Zero</option>
                                    </select>
                                    <br>
                                    <h4> Life: </h4>
                                    <!-- ENTER LIFE INFORMATION -->
                                    <select name="edit_planet_life" class="form-control" id="dropdownMenu1">
                                        <option value="<?= $edit_var4;?>">Current: <?= $edit_var4;?></option>
                                        <option value="None">None</option>
                                        <option value="Scarce">Scarce</option>
                                        <option value="Fair">Fair</option>
                                        <option value="Common">Common</option>
                                        <option value="Abundant">Abundant</option>
                                    </select>
                                    <br>
                                    <h4> Size: </h4>
                                    <!-- ENTER SIZE INFORMATION -->
                                    <select name="edit_planet_size" class="form-control" id="dropdownMenu1">
                                        <option value="<?= $edit_var5;?>">Current: <?= $edit_var5;?></option>
                                        <option value="Tiny">Tiny</option>
                                        <option value="Small">Small</option>
                                        <option value="Medium">Medium</option>
                                        <option value="Large">Large</option>
                                        <option value="Huge">Huge</option>
                                    </select>
                                    <br>
                                    <h4> Sentinals: </h4>
                                    <!-- ENTER SENTINAL INFORMATION -->
                                        <select name="edit_planet_sentinals" class="form-control" id="dropdownMenu1">
                                            <option value="<?= $edit_var6;?>">Current: <?= $edit_var6;?></option>
                                        <option value="None">None</option>
                                        <option value="Relaxed">Relaxed</option>
                                        <option value="Standard">Standard</option>
                                        <option value="High Security">High Security</option>
                                        <option value="Frenzied">Frenzied</option>
                                    </select>
                                    <br>
                                    <h4> Minerals: </h4>
                                    <!-- ENTER MINERAL INFORMATION -->
                                    <input class="form-control" type="text" name="edit_planet_minerals" value="<?= $edit_var7;?>" placeholder="Planet Minerals">
                                    <br>
                                    <h4> Rating: </h4>
                                    <!-- ENTER RATING INFORMATION -->
                                    <select name="edit_planet_rating" class="form-control" id="dropdownMenu1">
                                        <option value="<?= $edit_var8;?>">Current: <?= $edit_var8;?></option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                        <option value="9">9</option>
                                        <option value="10">10</option>
                                    </select>
                                    <br>
                                    
                                    <h4> Select main image to upload: </h4>
                                <input class="btn btn-primary form-control" type="file" name="edit_planet_main_image" id="fileToUpload">
                                <br>
                                
                                <h4> Select extra image to upload: </h4>
                                <input class="btn btn-primary form-control" type="file" name="edit_planet_extra_image" id="fileToUpload">
                                <br>
                                
                                <h4> Select extra image to upload: </h4>
                                <input class="btn btn-primary form-control" type="file" name="edit_planet_extra_image1" id="fileToUpload">
                                <br><br>
                            
                            
                                    
                                    
                                    
                                    
                                    
                            </div>
                        
                    <br>
                        <?php
                          if (isset($_POST['edit_planet_submit'])) {
                              
                              //save what is entered
                              $edit_var1 = $_POST['edit_planet_name'];
                              $edit_var2 = $_POST['edit_planet_enviroment'];
                              $edit_var3 = $_POST['edit_planet_climate'];
                              $edit_var4 = $_POST['edit_planet_life'];
                              $edit_var5 = $_POST['edit_planet_size'];
                              $edit_var6 = $_POST['edit_planet_sentinals'];
                              $edit_var7 = $_POST['edit_planet_minerals'];
                              $edit_var8 = $_POST['edit_planet_rating'];
                              $edit_var9 = $_POST['edit_planet_main_image'];
                              $edit_var10 = $_POST['edit_planet_extra_image'];
                              $edit_var11 = $_POST['edit_planet_extra_image1'];
                              $object_id = $_POST['edit_planet_object_id'];
                              $original_image = $_POST['edit_planet_original_image'];
                              $original_extra_image = $_POST['edit_planet_original_extra_image'];
                              $original_extra_image1 = $_POST['edit_planet_original_extra_image1'];
                              
                              if($edit_var9 == NULL){
                                  $edit_var9 = $original_image;
                              }
                              
                              if($edit_var10 == NULL){
                                  $edit_var10 = $original_extra_image;
                              }
                              
                              if($edit_var11 == NULL){
                                  $edit_var11 = $original_extra_image1;
                              }
                              
                              edit_planet($edit_var1, $edit_var2, $edit_var3, $edit_var4, $edit_var5, $edit_var6, $edit_var7, $edit_var8, $edit_var9, $edit_var10, $edit_var11, $object_id);
                              
//                              $sql = $conn->prepare("UPDATE `test2` SET `name` = '$edit_var4' WHERE `planet_id` = '3'");
//              $sql->execute();
//              
//              $sql = $conn->prepare("UPDATE `test2` SET `enviroment` = '$edit_var2' WHERE `planet_id` = '3'");
//              $sql->execute();
              
              
                          
          }
                              ?>
                          
                    
                    
                    
                    <input class="btn btn-success" id="submit_button" type="submit" name="edit_planet_submit" value="Confirm">
                    
                    
                    
                </div>
                </div>
                </div>
                
                  <?php
                    // </editor-fold>
          
        // <editor-fold defaultstate="collapsed" desc="Moon edit modal">
  
  ?>
                  
                  <div class="modal fade" id="moon_edit_modal" tabindex="-1" role="dialog"
             aria-labelledby="myModalLabel5" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <h1 id="title_id"> Edit Moon </h1>
     
                    <div id="formDiv">
                    <form method="post" action="item.php?database_type=<?= $edit_table; ?>&item_id=<?= $edit_id; ?>">
                        <input style="display: none;"  name="edit_moon_object_id" value="<?= $edit_id;?>">
                        <input style="display: none;"  name="edit_moon_original_image" value="<?= $edit_var9;?>">
                        <input style="display: none;"  name="edit_moon_original_extra_image" value="<?= $edit_var10;?>">
                        <input style="display: none;"  name="edit_moon_original_extra_image1" value="<?= $edit_var11;?>">
                        <h4> Name: </h4>
                            <input id="flora_input" class="form-control" type="text" name="edit_moon_name" value="<?= $edit_var1;?>" placeholder="name">
                            <br>
                            
                            <h4> Atmosphere: </h4>
                                    <!-- ENTER ENVIROMENT INFORMATION -->
                                    <select name="edit_moon_enviroment" class="form-control" id="dropdownMenu1">
                                        <option value="<?= $edit_var2;?>">Current: <?= $edit_var2;?></option>
                                        <option value="Normal">Normal</option>
                                        <option value="Hot">Hot</option>
                                        <option value="Extreme Heat">Extreme Heat</option>
                                        <option value="Cold">Cold</option>
                                        <option value="Extreme Cold">Extreme Cold</option>
                                        <option value="Light Radioactivity">Light Radioactivity</option>
                                        <option value="Radioactive">Radioactive</option>
                                        <option value="Light Toxicity">Light Toxicity</option>
                                        <option value="Toxic">Toxic</option>
                                    </select>
                                    <br>
                                    <h4> Enviroment: </h4>
                                    <!-- ENTER CLIMATE INFORMATION -->
                                    <select name="edit_moon_climate" class="form-control" id="dropdownMenu1">
                                        <option value="<?= $edit_var3;?>">Current: <?= $edit_var3;?></option>
                                        <option value="Lush">Lush</option>
                                        <option value="Savannah">Savannah</option>
                                        <option value="Dessert">Dessert</option>
                                        <option value="Mediterranean">Mediterranean</option>
                                        <option value="Jungle">Jungle</option>
                                        <option value="Forest">Forest</option>
                                        <option value="Highland">Highland</option>
                                        <option value="Highland Swamp">Highland Swamp</option>
                                        <option value="Sub Arctic">Sub Arctic</option>
                                        <option value="Sub Zero">Sub Zero</option>
                                    </select>
                                    <br>
                                    <h4> Life: </h4>
                                    <!-- ENTER LIFE INFORMATION -->
                                    <select name="edit_moon_life" class="form-control" id="dropdownMenu1">
                                        <option value="<?= $edit_var4;?>">Current: <?= $edit_var4;?></option>
                                        <option value="None">None</option>
                                        <option value="Scarce">Scarce</option>
                                        <option value="Fair">Fair</option>
                                        <option value="Common">Common</option>
                                        <option value="Abundant">Abundant</option>
                                    </select>
                                    <br>
                                    <h4> Size: </h4>
                                    <!-- ENTER SIZE INFORMATION -->
                                    <select name="edit_moon_size" class="form-control" id="dropdownMenu1">
                                        <option value="<?= $edit_var5;?>">Current: <?= $edit_var5;?></option>
                                        <option value="Tiny">Tiny</option>
                                        <option value="Small">Small</option>
                                        <option value="Medium">Medium</option>
                                        <option value="Large">Large</option>
                                        <option value="Huge">Huge</option>
                                    </select>
                                    <br>
                                    <h4> Sentinals: </h4>
                                    <!-- ENTER SENTINAL INFORMATION -->
                                        <select name="edit_moon_sentinals" class="form-control" id="dropdownMenu1">
                                            <option value="<?= $edit_var6;?>">Current: <?= $edit_var6;?></option>
                                        <option value="None">None</option>
                                        <option value="Relaxed">Relaxed</option>
                                        <option value="Standard">Standard</option>
                                        <option value="High Security">High Security</option>
                                        <option value="Frenzied">Frenzied</option>
                                    </select>
                                    <br>
                                    <h4> Minerals: </h4>
                                    <!-- ENTER MINERAL INFORMATION -->
                                    <input class="form-control" type="text" name="edit_moon_minerals" value="<?= $edit_var7;?>" placeholder="Planet Minerals">
                                    <br>
                                    <h4> Rating: </h4>
                                    <!-- ENTER RATING INFORMATION -->
                                    <select name="edit_moon_rating" class="form-control" id="dropdownMenu1">
                                        <option value="<?= $edit_var8;?>">Current: <?= $edit_var8;?></option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                        <option value="9">9</option>
                                        <option value="10">10</option>
                                    </select>
                                    <br>
                                    
                                    <h4> Select main image to upload: </h4>
                                <input class="btn btn-primary form-control" type="file" name="edit_moon_main_image" id="fileToUpload">
                                <br>
                                
                                <h4> Select extra image to upload: </h4>
                                <input class="btn btn-primary form-control" type="file" name="edit_moon_extra_image" id="fileToUpload">
                                <br>
                                
                                <h4> Select extra image to upload: </h4>
                                <input class="btn btn-primary form-control" type="file" name="edit_moon_extra_image1" id="fileToUpload">
                                <br><br>
                            
                            
                                    
                                    
                                    
                                    
                                    
                            </div>
                        
                    <br>
                        <?php
                          if (isset($_POST['edit_moon_submit'])) {
                              
                              //save what is entered
                              $edit_var1 = $_POST['edit_moon_name'];
                              $edit_var2 = $_POST['edit_moon_enviroment'];
                              $edit_var3 = $_POST['edit_moon_climate'];
                              $edit_var4 = $_POST['edit_moon_life'];
                              $edit_var5 = $_POST['edit_moon_size'];
                              $edit_var6 = $_POST['edit_moon_sentinals'];
                              $edit_var7 = $_POST['edit_moon_minerals'];
                              $edit_var8 = $_POST['edit_moon_rating'];
                              $edit_var9 = $_POST['edit_moon_main_image'];
                              $edit_var10 = $_POST['edit_moon_extra_image'];
                              $edit_var11 = $_POST['edit_moon_extra_image1'];
                              $object_id = $_POST['edit_moon_object_id'];
                              $original_image = $_POST['edit_moon_original_image'];
                              $original_extra_image = $_POST['edit_moon_original_extra_image'];
                              $original_extra_image1 = $_POST['edit_moon_original_extra_image1'];
                              
                              if($edit_var9 == NULL){
                                  $edit_var9 = $original_image;
                              }
                              
                              if($edit_var10 == NULL){
                                  $edit_var10 = $original_extra_image;
                              }
                              
                              if($edit_var11 == NULL){
                                  $edit_var11 = $original_extra_image1;
                              }
                              
                              edit_moon($edit_var1, $edit_var2, $edit_var3, $edit_var4, $edit_var5, $edit_var6, $edit_var7, $edit_var8, $edit_var9, $edit_var10, $edit_var11, $object_id);
                              
//                              $sql = $conn->prepare("UPDATE `test2` SET `name` = '$edit_var4' WHERE `planet_id` = '3'");
//              $sql->execute();
//              
//              $sql = $conn->prepare("UPDATE `test2` SET `enviroment` = '$edit_var2' WHERE `planet_id` = '3'");
//              $sql->execute();
              
              
                          
          }
                              ?>
                          
                    
                    
                    
                    <input class="btn btn-success" id="submit_button" type="submit" name="edit_moon_submit" value="Confirm">
                    
                    
                    
                </div>
                </div>
                </div>
                
                  <?php
                    // </editor-fold>
          
        
        // <editor-fold defaultstate="collapsed" desc="Creature edit modal">
  
  ?>
                  
                  <div class="modal fade" id="creature_edit_modal" tabindex="-1" role="dialog"
             aria-labelledby="myModalLabel5" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <h1 id="title_id"> Edit Creature </h1>
     
                    <div id="formDiv">
                    <form method="post" action="item.php?database_type=<?= $edit_table; ?>&item_id=<?= $edit_id; ?>">
                        <input style="display: none;"  name="edit_creature_object_id" value="<?= $edit_id;?>">
                        <input style="display: none;"  name="edit_creature_original_image" value="<?= $edit_var6;?>">
                        <h4> Name: </h4>
                            <input id="flora_input" class="form-control" type="text" name="edit_creature_name" value="<?= $edit_var1;?>" placeholder="name">
                            <br>
                            
                            <h4> Life Type: </h4>
                                    <!-- ENTER LIFE TYPE INFORMATION -->
                                        <select name="edit_creature_life_type" class="form-control" id="dropdownMenu1">
                                        <option value="<?= $edit_var2?>">Current: <?= $edit_var2?></option>    
                                        <option value="Land">Land</option>
                                        <option value="Air">Air</option>
                                        <option value="Sea">Sea</option>
                                    </select>
                                    
                                    <br>
                                        <h4> Diet: </h4>
                                    <!-- ENTER DIET INFORMATION -->
                                        <select name="edit_creature_diet" class="form-control" id="dropdownMenu1">
                                        <option value="<?= $edit_var5?>">Current: <?= $edit_var5?></option>    
                                        <option value="Herbivore">Herbivore</option>
                                        <option value="Carnivore">Carnivore</option>
                                        <option value="Omnivore">Omnivore</option>
                                    </select>
                                    <br>
                                    
                                    <!--//// SIZE -->
                            
                            <h4> Size: </h4>
                                    <!-- ENTER SIZE INFORMATION -->
                                        <select name="edit_creature_size" class="form-control" id="dropdownMenu1">
                                        <option value="<?= $edit_var3?>">Current: <?= $edit_var3?></option>
                                        <option value="Tiny">Tiny</option>
                                        <option value="Small">Small</option>
                                        <option value="Medium">Medium</option>
                                        <option value="Large">Large</option>
                                        <option value="Huge">Huge</option>
                                    </select>
                                <br>
                                
                                <h4> Rating: </h4>
                                    <!-- ENTER RATING INFORMATION -->
                                    <select name="edit_creature_rating" class="form-control" id="dropdownMenu1">
                                        <option value="<?= $edit_var4?>">Current: <?= $edit_var4?></option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                        <option value="9">9</option>
                                        <option value="10">10</option>
                                    </select>
                                    <br>
                                    <h4> Select image to upload: </h4>
                                <input class="btn btn-primary form-control" type="file"  name="edit_creature_main_image" id="fileToUpload">
                                    
                                    
                                    
                                    
                                    
                            </div>
                        
                    <br>
                        <?php
                          if (isset($_POST['edit_creature_submit'])) {
                              
                              //save what is entered
                              
                              $edit_var1 = $_POST['edit_creature_name'];
                              $edit_var2 = $_POST['edit_creature_life_type'];
                              $edit_var5 = $_POST['edit_creature_diet'];
                              $edit_var3 = $_POST['edit_creature_size'];
                              $edit_var4 = $_POST['edit_creature_rating'];
                              $edit_var6 = $_POST['edit_creature_main_image'];
                              $object_id = $_POST['edit_creature_object_id'];
                              $original_image = $_POST['edit_creature_original_image'];
                              
                              
                              
                              if($edit_var6 == NULL){
                                  $edit_var6 = $original_image;
                              }
                              
                              edit_creature($edit_var1, $edit_var2, $edit_var3, $edit_var4, $edit_var5, $edit_var6, $object_id);
                              
//                              $sql = $conn->prepare("UPDATE `test2` SET `name` = '$edit_var4' WHERE `planet_id` = '3'");
//              $sql->execute();
//              
//              $sql = $conn->prepare("UPDATE `test2` SET `enviroment` = '$edit_var2' WHERE `planet_id` = '3'");
//              $sql->execute();
              
              
                          
          }
                              ?>
                          
                    
                    
                    
                    <input class="btn btn-success" id="submit_button" type="submit" name="edit_creature_submit" value="Confirm">
                    
                    
                    
                </div>
                </div>
                </div>
                
                  <?php
                    // </editor-fold>


        // <editor-fold defaultstate="collapsed" desc="Ship edit modal">
  
  ?>
                  
                  <div class="modal fade" id="ship_edit_modal" tabindex="-1" role="dialog"
             aria-labelledby="myModalLabel5" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <h1 id="title_id"> Edit Ship </h1>
     
                    <div id="formDiv">
                    <form method="post" action="item.php?database_type=<?= $edit_table; ?>&item_id=<?= $edit_id; ?>">
                        <input style="display: none;"  name="edit_object_id" value="<?= $edit_id;?>">
                        <input style="display: none;"  name="edit_original_image" value="<?= $edit_var3;?>">
                            <input id="ship_input" class="form-control" type="text" name="edit_ship_name" value="<?= $edit_var1;?>" placeholder="name">
                            <br><br>
                            <h4> Ship Type: </h4>
                                    <!-- ENTER SHIP INFORMATION -->
                                        <select name="edit_ship_type" class="form-control" id="dropdownMenu1">
                                            <option value="<?= $edit_var2;?>">Current: <?= $edit_var2;?></option>
                                        <option value="Scientific">Scientific</option>
                                        <option value="Combat">Combat</option>
                                        <option value="Explorer">Explorer</option>
                                        <option value="Trader">Trader</option>
                                    </select>
                                    <br><br>
                                    <h4> Select image to upload: </h4>
                                <input class="btn btn-primary form-control" type="file" name="edit_ship_main_image" id="fileToUpload">
                                <br>
                                    
                                    
                                    
                                    
                                    
                            </div>
                        
                    <br>
                        <?php
                          if (isset($_POST['edit_ship_submit'])) {
                              global $edit_var4;
                              //save what is entered
                              $edit_var1 = $_POST['edit_ship_name'];
                              $edit_var2 = $_POST['edit_ship_type'];
                              $edit_var3 = $_POST['edit_ship_main_image'];
                              $edit_var4 = $_POST['edit_object_id'];
                              $original_image = $_POST['edit_original_image'];
                              
                              if($edit_var3 == NULL){
                                  $edit_var3 = $original_image;
                              }
                              
                              edit_ship($edit_var1, $edit_var2, $edit_var3, $edit_var4);
                              
//                              $sql = $conn->prepare("UPDATE `test2` SET `name` = '$edit_var4' WHERE `planet_id` = '3'");
//              $sql->execute();
//              
//              $sql = $conn->prepare("UPDATE `test2` SET `enviroment` = '$edit_var2' WHERE `planet_id` = '3'");
//              $sql->execute();
              
              
                          
                          }
                              ?>
                          
                    
                    
                    
                    <input class="btn btn-success" id="submit_button" type="submit" name="edit_ship_submit" value="Confirm">
                    
                    
                    
                </div>
                </div>
                </div>
        
                
                  <?php
                    // </editor-fold>
                    
        
        // <editor-fold defaultstate="collapsed" desc="Flora edit modal">
  
  ?>
                  
                  <div class="modal fade" id="flora_edit_modal" tabindex="-1" role="dialog"
             aria-labelledby="myModalLabel5" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <h1 id="title_id"> Edit Flora </h1>
     
                    <div id="formDiv">
                    <form method="post" action="item.php?database_type=<?= $edit_table; ?>&item_id=<?= $edit_id; ?>">
                        <input style="display: none;"  name="edit_flora_object_id" value="<?= $edit_id;?>">
                        <input style="display: none;"  name="edit_flora_original_image" value="<?= $edit_var5;?>">
                        <h4> Name: </h4>
                            <input id="flora_input" class="form-control" type="text" name="edit_flora_name" value="<?= $edit_var1;?>" placeholder="name">
                            <br>
                                        <h4> Diet: </h4>
                                    <!-- ENTER DIET INFORMATION -->
                                        <select name="edit_flora_diet" class="form-control" id="dropdownMenu1">
                                        <option value="<?= $edit_var2?>">Current: <?= $edit_var2?></option>    
                                        <option value="Herbivore">Herbivore</option>
                                        <option value="Carnivore">Carnivore</option>
                                        <option value="Omnivore">Omnivore</option>
                                    </select>
                                    <br>
                                    
                                    <!--//// SIZE -->
                            
                            <h4> Size: </h4>
                                    <!-- ENTER SIZE INFORMATION -->
                                        <select name="edit_flora_size" class="form-control" id="dropdownMenu1">
                                        <option value="<?= $edit_var3?>">Current: <?= $edit_var3?></option>
                                        <option value="Tiny">Tiny</option>
                                        <option value="Small">Small</option>
                                        <option value="Medium">Medium</option>
                                        <option value="Large">Large</option>
                                        <option value="Huge">Huge</option>
                                    </select>
                                <br>
                                
                                <h4> Rating: </h4>
                                    <!-- ENTER RATING INFORMATION -->
                                    <select name="edit_flora_rating" class="form-control" id="dropdownMenu1">
                                        <option value="<?= $edit_var4?>">Current: <?= $edit_var4?></option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                        <option value="9">9</option>
                                        <option value="10">10</option>
                                    </select>
                                    <br>
                                    <h4> Select image to upload: </h4>
                                <input class="btn btn-primary form-control" type="file" name="edit_flora_main_image" id="fileToUpload">
                    </form>
                                    
                                    
                                    
                                    
                                    
                            </div>
                    
                        
                    <br>
                        <?php
                          if (isset($_POST['edit_flora_submit'])) {
                              
                              //save what is entered
                              $edit_var1 = $_POST['edit_flora_name'];
                              $edit_var2 = $_POST['edit_flora_diet'];
                              $edit_var3 = $_POST['edit_flora_size'];
                              $edit_var4 = $_POST['edit_flora_rating'];
                              $edit_var5 = $_POST['edit_flora_main_image'];
                              $edit_var6 = $_POST['edit_flora_object_id'];
                              $original_image = $_POST['edit_flora_original_image'];
                              
                              if($edit_var5 == NULL){
                                  $edit_var5 = $original_image;
                              }
                              
                              edit_flora($edit_var1, $edit_var2, $edit_var3, $edit_var4, $edit_var5, $edit_var6);
                              
//                              $sql = $conn->prepare("UPDATE `test2` SET `name` = '$edit_var4' WHERE `planet_id` = '3'");
//              $sql->execute();
//              
//              $sql = $conn->prepare("UPDATE `test2` SET `enviroment` = '$edit_var2' WHERE `planet_id` = '3'");
//              $sql->execute();
              
              
                          
          }
                              ?>
                          
                    
                    
                    
                    <input class="btn btn-success" id="submit_button" type="submit" name="edit_flora_submit" value="Confirm">
                    
                    
                    
                </div>
                </div>
                </div>
                
                  <?php
                    // </editor-fold>
                    
                    ?>
        
        
        
        
        
        
        <!-- ////////////////////////////// ADDING MODALS /////////////////////////////////--> 
        <?php
        // <editor-fold defaultstate="collapsed" desc="Galaxy Modal">
  
  ?>

        <!-- //////////////////////////////////////// GALAXY MODAL ////////////////////////////////////////////// -->



        <div class="modal fade" id="galaxy_modal" tabindex="-1" role="dialog"
             aria-labelledby="myModalLabel5" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <h1 id="title_id"> Add a galaxy </h1>

                    <?php
                      $name = "";


                      if ($_SERVER["REQUEST_METHOD"] == "POST") {
                          if (empty($_POST["galaxy_name"])) {
                              
                              
                          } else {
                              $galaxy_name = test_input($_POST["galaxy_name"]);
                              echo $galaxy_name;


                              // check if name only contains letters and whitespace

                              add_galaxy($galaxy_name);
                          }
                      }
                    ?>
                    <div id="formDiv">     
                        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">  
                            <input id="galaxy_input" class="form-control" type="text" name="galaxy_name" value="" placeholder="name">
                        
                            <br><br>
                       
                            </div>

                            <input href="index.php?id=1" class="btn btn-success" id="submit_button" type="submit" name="submit" value="Submit" >  
                        </form>


                    </div>
                </div>
            </div>

<?php
                    // </editor-fold>
                    ?>

<?php
        // <editor-fold defaultstate="collapsed" desc="Star System Modal">
  
  ?>


            <!--  ////////////////////////////  STAR SYSTEM MODAL ///////////////////////////////////// -->



            <div class="modal fade" id="star_modal" tabindex="-1" role="dialog"
                 aria-labelledby="myModalLabel5" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <h1 id="title_id"> Add a Star System </h1>
                        <div id="formDiv">

<?php
  $star_name = "";
  $star_colour = "";
  $star_type = "";
  $star_upload_image = "";
  $star_system = "";
  $star_upload_image[0] = "";

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
      if (empty($_POST["star_name"])) {
          $testing1 = "This is not working";
      } else {
          $star_name = test_input($_POST["star_name"]);
          $testing1 = $star_name;
          // check if name only contains letters and whitespace
          if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
              
          }
      }



      if (empty($_POST["galaxy_inside"])) {
          $galaxy_inside = "";
      } else {
          $galaxy_inside = test_input($_POST["galaxy_inside"]);

          // check if name only contains letters and whitespace
          if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
              
          }
      }

      if (empty($_POST["fileToUpload"])) {
          $star_upload_image[0] = "";
      } else {
          $star_upload_image[0] = ($_POST["fileToUpload"]);
          // check if name only contains letters and whitespace
          if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
              
          }
      }
      
      if (empty($_POST["star_type"])) {
          $star_type = "";
      } else {
          $star_type = test_input($_POST["star_type"]);
      }
      
      if (empty($_POST["star_colour"])) {
          $star_colour = "";
      } else {
          $star_colour = test_input($_POST["star_colour"]);
      }


      add_star($star_name, $star_type, $star_colour, $galaxy_inside, $star_upload_image);
  }
?>

                            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">  
                                <input class="form-control" type="text" name="star_name" value="" placeholder="name">
                                <br>
                                <h4> Galaxy: </h4>
                                <select name="galaxy_inside" class="form-control" id="dropdownMenu1">
                                    <?php
                                      $id = 1;
                                      global $galaxy_limit;
                                      echo $galaxy_limit;

                                      while ($id <= $galaxy_limit) {
                                          $sql = $conn->prepare("SELECT * FROM `galaxy` WHERE `id` = :id");
                                          $sql->bindParam('id', $id, PDO::PARAM_INT);
                                          $sql->execute();

                                          $result = $sql->fetchObject();

                                          if ($result != false) {

                                              $galaxy_name = $result->name;
                                              ?>

                                              <option value="<?= $galaxy_name; ?>"><?php echo $galaxy_name; ?></option>
                                              <?php
                                          } else {
                                              
                                          }

                                          $id++;
                                      }
                                    ?>
                                </select>
                                <br>
                                <h4> Star Type: </h4>
                                <select name="star_type" class="form-control" id="dropdownMenu1">
                                    <option value="G">G</option>
                                    <option value="K">K</option>
                                    <option value="E">E</option>
                                    <option value="B">B</option>
                                    <option value="M">M</option>
                                    <option value="F">F</option>
                                    <option value="O">O</option>
                                </select>
                                <br>
                                <h4> Star Colour: </h4>
                                <select name="star_colour" class="form-control" id="dropdownMenu1">
                                    <option value="Yellow">Yellow</option>
                                    <option value="Yellow White">Yellow White</option>
                                    <option value="Orange">Orange</option>
                                    <option value="Green">Green</option>
                                    <option value="Blue">Blue</option>
                                    <option value="Blue White">Blue White</option>
                                    <option value="Red">Red</option>
                                </select>
                                <br>
                                <h4> Select main image to upload: </h4>
                                <input class="btn btn-primary form-control" type="file" name="fileToUpload" id="fileToUpload">
                                <br><br>
                                <?php $disabled = 'enabled'; ?>
                                </div>
                                <input class="btn btn-lg btn-success" id="submit_button1" type="submit" name="submit" value="Submit" <?php echo $disabled; ?>>  
                            </form>
                        </div>
                    </div>
                </div>
            
            <?php
                    // </editor-fold>
                    ?>
            
            <?php
        // <editor-fold defaultstate="collapsed" desc="Planet Modal">
  
  ?>
                <!--  ///////////////////////////////////  PLANET MODAL  ///////////////////////////////////// -->
                <div class="modal fade" id="planet_modal" tabindex="-1" role="dialog"
                     aria-labelledby="myModalLabel5" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <h1 id="title_id"> Add a Planet </h1>
                            <div id="formDiv">


                                <!-- ///////////////// PHP CODE - GETTING THE INFO AND RUNNING THE FUNCTION --> 

                                <?php
                                  $planet_name = "";
                                  $planet_star = "";
                                  $planet_climate = "";
                                  $planet_life = "";
                                  $planet_size = "";
                                  $planet_sentinals = "";
                                  $planet_minerals = "";
                                  $planet_rating = "";
                                  $planet_image[0] = "";
                                  $planet_image[1] = "";
                                  $planet_image[2] = "";
                                  
                                  
                                  if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                      
                                      ////// GET NAME OF PLANET  ///////
                                      if (empty($_POST["planet_name"])) {
                                          $planet_name = "";
                                      } else {
                                          $planet_name = test_input($_POST["planet_name"]);
                                      }
                                      
                                      ////// GET NAME OF STAR  ///////
                                      if (empty($_POST["planet_star"])) {
                                          $planet_star = "";
                                      } else {
                                          $planet_star = test_input($_POST["planet_star"]);
                                      }
                                      
                                      ////// GET ENVIROMENT  ///////
                                      if (empty($_POST["planet_enviroment"])) {
                                          $planet_enviroment = "";
                                      } else {
                                          $planet_enviroment = test_input($_POST["planet_enviroment"]);
                                      }
                                      
                                      ////// GET CLIMATE  ///////
                                      if (empty($_POST["planet_climate"])) {
                                          $planet_climate = "";
                                      } else {
                                          $planet_climate = test_input($_POST["planet_climate"]);
                                      }
                                      
                                      ////// GET LIFE ///////
                                      if (empty($_POST["planet_life"])) {
                                          $planet_life = "";
                                      } else {
                                          $planet_life = test_input($_POST["planet_life"]);
                                      }
                                      
                                      ////// GET SIZE ///////
                                      if (empty($_POST["planet_size"])) {
                                          $planet_size = "";
                                      } else {
                                          $planet_size = test_input($_POST["planet_size"]);
                                      }
                                      
                                      ////// GET SENTINALS  ///////
                                      if (empty($_POST["planet_sentinals"])) {
                                          $planet_sentinals = "";
                                      } else {
                                          $planet_sentinals = test_input($_POST["planet_sentinals"]);
                                      }
                                      
                                      ////// GET MINERALS ///////
                                      if (empty($_POST["planet_minerals"])) {
                                          $planet_minerals = "";
                                      } else {
                                          $planet_minerals = test_input($_POST["planet_minerals"]);
                                      }
                                      
                                      ////// GET RATING  ///////
                                      if (empty($_POST["planet_rating"])) {
                                          $planet_rating = "";
                                      } else {
                                          $planet_rating = test_input($_POST["planet_rating"]);
                                      }
                                      
                                      ////// GET MAIN IMAGE  ///////
                                      if (empty($_POST["planet_main_image"])) {
                                          $planet_image[0] = "";
                                      } else {
                                          $planet_image[0] = test_input($_POST["planet_main_image"]);
                                      }
                                      
                                      ////// GET EXTRA IMAGE  ///////
                                      if (empty($_POST["planet_extra_image"])) {
                                          $planet_image[1] = "";
                                      } else {
                                          $planet_image[1] = test_input($_POST["planet_extra_image"]);
                                      }
                                      
                                      ////// GET ANOTHER EXTRA IMAGE  ///////
                                      if (empty($_POST["planet_extra_image1"])) {
                                          $planet_image[2] = "";
                                      } else {
                                          $planet_image[2] = test_input($_POST["planet_extra_image1"]);
                                      }
                                      
                                      
                                      
                                      add_planet($planet_name , $planet_star , $planet_enviroment , $planet_climate , $planet_life , $planet_size , $planet_sentinals , 
                    $planet_minerals , $planet_rating , $planet_image);
                                      
                                  }
                                ?>



                                <!-- ///////////////// HTML CODE FOR DISPLAYING THE MODAL --> 
                                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                                    <!-- NAME FIELD-->
                                    <input class="form-control" type="text" name="planet_name" value="" placeholder="name">
                                    <br>
                                    <!-- SELECT STAR SYSTEM FIELD-->  
                                    <h4> Select Star System: </h4>
                                    <select name="planet_star" class="form-control" id="dropdownMenu1">

                                        <?php
                                      $id = 0;
                                      global $star_system_limit;
                                      
                                      $data_array = sort_table("star_systems" , $star_system_limit , "ID" , "date_logged" , "DESC" );
                                      $array_count = count($data_array);
                                      
                                      

                                      while ($id <= $array_count) {
                                          $sql = $conn->prepare("SELECT * FROM `star_systems` WHERE `id` = :id");
                                          $sql->bindParam('id', $data_array[$id], PDO::PARAM_INT);
                                          $sql->execute();

                                          $result = $sql->fetchObject();

                                          if ($result != false) {

                                              $star_name = $result->name;
                                              ?>

                                              <option value="<?= $star_name; ?>"><?php echo $star_name; ?></option>
                                              <?php
                                          } else {
                                              
                                          }

                                          $id++;
                                      }
                                      
                                      
                                    ?>
                                        
                                     
                                    </select>
                                    <br>
                                    <h4> Atmosphere: </h4>
                                    <!-- ENTER ENVIROMENT INFORMATION -->
                                    <select name="planet_enviroment" class="form-control" id="dropdownMenu1">
                                        <option value="Normal">Normal</option>
                                        <option value="Hot">Hot</option>
                                        <option value="Extreme Heat">Extreme Heat</option>
                                        <option value="Cold">Cold</option>
                                        <option value="Extreme Cold">Extreme Cold</option>
                                        <option value="Ligth Radioactivity">Light Radioactivity</option>
                                        <option value="Radioactive">Radioactive</option>
                                        <option value="Ligth Toxicity">Light Toxicity</option>
                                        <option value="Toxic">Toxic</option>
                                    </select>
                                    <br>
                                    <h4> Enviroment: </h4>
                                    <!-- ENTER CLIMATE INFORMATION -->
                                    <select name="planet_climate" class="form-control" id="dropdownMenu1">
                                        <option value="Lush">Lush</option>
                                        <option value="Savannah">Savannah</option>
                                        <option value="Dessert">Dessert</option>
                                        <option value="Mediterranean">Mediterranean</option>
                                        <option value="Jungle">Jungle</option>
                                        <option value="Forest">Forest</option>
                                        <option value="Highland">Highland</option>
                                        <option value="Highland Swamp">Highland Swamp</option>
                                        <option value="Sub Arctic">Sub Arctic</option>
                                        <option value="Sub Zero">Sub Zero</option>
                                    </select>
                                    <br>
                                    <h4> Life: </h4>
                                    <!-- ENTER LIFE INFORMATION -->
                                    <select name="planet_life" class="form-control" id="dropdownMenu1">
                                        <option value="None">None</option>
                                        <option value="Scarce">Scarce</option>
                                        <option value="Fair">Fair</option>
                                        <option value="Common">Common</option>
                                        <option value="Abundant">Abundant</option>
                                    </select>
                                    <br>
                                    <h4> Size: </h4>
                                    <!-- ENTER SIZE INFORMATION -->
                                    <select name="planet_size" class="form-control" id="dropdownMenu1">
                                        <option value="Tiny">Tiny</option>
                                        <option value="Small">Small</option>
                                        <option value="Medium">Medium</option>
                                        <option value="Large">Large</option>
                                        <option value="Huge">Huge</option>
                                    </select>
                                    <br>
                                    <h4> Sentinals: </h4>
                                    <!-- ENTER SENTINAL INFORMATION -->
                                        <select name="planet_sentinals" class="form-control" id="dropdownMenu1">
                                        <option value="None">None</option>
                                        <option value="Relaxed">Relaxed</option>
                                        <option value="Standard">Standard</option>
                                        <option value="High Security">High Security</option>
                                        <option value="Frenzied">Frenzied</option>
                                    </select>
                                    <br>
                                    <h4> Minerals: </h4>
                                    <!-- ENTER MINERAL INFORMATION -->
                                    <input class="form-control" type="text" name="planet_minerals" value="" placeholder="Planet Minerals">
                                    <br>
                                    <h4> Rating: </h4>
                                    <!-- ENTER RATING INFORMATION -->
                                    <select name="planet_rating" class="form-control" id="dropdownMenu1">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                        <option value="9">9</option>
                                        <option value="10">10</option>
                                    </select>
                                    <br>
                                    
                                    <h4> Select main image to upload: </h4>
                                <input class="btn btn-primary form-control" type="file" name="planet_main_image" id="fileToUpload">
                                <br>
                                
                                <h4> Select extra image to upload: </h4>
                                <input class="btn btn-primary form-control" type="file"  name="planet_extra_image"  id="fileToUpload">
                                <br>
                                
                                <h4> Select extra image to upload: </h4>
                                <input class="btn btn-primary form-control" type="file" name="planet_extra_image1" id="fileToUpload">
                                <br><br>
                                    
                                    
                                    
                                    
                                    




                                    </div>
                                    <input  class="btn btn-lg btn-success" id="submit_button1" type="submit" name="submit" value="Submit">  
                                </form>
                            </div>
                        </div>
                    </div> 
                
                <?php
                    // </editor-fold>
                    ?>
                
                <?php
        // <editor-fold defaultstate="collapsed" desc="Moon Modal">
  
  ?>
                
                
                <!-- //////////////////////////////// MOON MODAL //////////////////////////////-->

                 <div class="modal fade" id="moon_modal" tabindex="-1" role="dialog"
             aria-labelledby="myModalLabel5" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <h1 id="title_id"> Add a Moon </h1>
                    <div id="formDiv">  
                    <?php
                      
                      $moon_name = "";
                      $moon_enviroment = "";
                      $moon_climate = "";
                      $moon_life = "";
                      $moon_size = "";
                      $moon_rating = "";
                      $moon_sentinals = "";
                      $moon_minerals = "";
                      $moon_parent = "";
                      $moon_image[0] = "";
                      $moon_image[1] = "";
                      $moon_image[2] = "";
                      
                      $sql = $conn->prepare("SELECT * FROM `test` WHERE `id` = 5");
                  $sql->execute();
                  $result = $sql->fetchObject();
                  $moon_star = $result->name;

                  if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        
                        
                          if (empty($_POST["moon_name"])) {
                              $moon_name = "";
                          } else {$moon_name = test_input($_POST["moon_name"]);}
                          
                          if (empty($_POST["moon_enviroment"])) {
                              $moon_enviroment = "";
                          } else {$moon_enviroment = test_input($_POST["moon_enviroment"]);}
                          
                          if (empty($_POST["moon_climate"])) {
                              $moon_climate = "";
                          } else {$moon_climate = test_input($_POST["moon_climate"]);}
                          
                          if (empty($_POST["moon_life"])) {
                              $moon_life = "";
                          } else {$moon_life = test_input($_POST["moon_life"]);}
                          
                          if (empty($_POST["moon_size"])) {
                              $moon_size = "";
                          } else {$moon_size = test_input($_POST["moon_size"]);}
                          
                          if (empty($_POST["moon_rating"])) {
                              $moon_rating = "";
                          } else {$moon_rating = test_input($_POST["moon_rating"]);}
                          
                          if (empty($_POST["moon_sentinals"])) {
                              $moon_sentinals = "";
                          } else {$moon_sentinals = test_input($_POST["moon_sentinals"]);}
                          
                          if (empty($_POST["moon_minerals"])) {
                              $moon_minerals = "";
                          } else {$moon_minerals = test_input($_POST["moon_minerals"]);}
                          
                          if (empty($_POST["moon_parent"])) {
                              $moon_parent = "";
                          } else {$moon_parent = test_input($_POST["moon_parent"]);}
                          
                          if (empty($_POST["moon_main_image"])) {
                              $moon_image[0] = "";
                          } else {$moon_image[0] = test_input($_POST["moon_main_image"]);}
                          
                          if (empty($_POST["moon_extra_image"])) {
                              $moon_image[1] = "";
                          } else {$moon_image[1] = test_input($_POST["moon_extra_image"]);}
                          
                          if (empty($_POST["moon_extra_image1"])) {
                              $moon_image[2] = "";
                          } else {$moon_image[2] = test_input($_POST["moon_extra_image1"]);}
                          
                          
                          
                          add_moon($moon_name , $moon_star , $moon_parent , $moon_enviroment , $moon_climate , $moon_life , $moon_size , $moon_sentinals , 
                    $moon_minerals , $moon_rating , $moon_image);
                    }
                              
                              
                              ?>
                    
                    
                        
                        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">  
                            <input class="form-control" type="text" name="moon_name" value="" placeholder="name">
                            
                            
                            
                           
                                    
                            
                            <br>
                            <h4> Parent Planet: </h4>
                            <select name="moon_parent" class="form-control" id="dropdownMenu1">
                                     <?php   
                                $id = 0;
                                      global $planet_limit;
                                      
                                      $data_array = sort_table("planets" , $planet_limit , "id" , "name" , "ASC" );
                                      $array_count = count($data_array);
                                      
                                      

                                      while ($id <= $array_count) {
                                          $sql = $conn->prepare("SELECT * FROM `planets` WHERE `id` = :id");
                                          $sql->bindParam('id', $data_array[$id], PDO::PARAM_INT);
                                          $sql->execute();

                                          $result = $sql->fetchObject();
                                          $current_star_system = $result->star_system;

                                          if ($result != false) {
                                              
                                              if($current_star_system == $moon_star){
                                              

                                              $planet_name = $result->name;
                                              ?>

                                              <option value="<?= $planet_name; ?>"><?php echo $planet_name; ?></option>
                                              <?php
                                              }else{}
                                          } else {
                                              
                                          }

                                          $id++;
                                      }
                                      
                                      
                                    ?>
                                    </select>
                            <br>
                                    <h4> Atmosphere: </h4>
                                    <!-- ENTER ENVIROMENT INFORMATION -->
                                    <select name="moon_enviroment" class="form-control" id="dropdownMenu1">
                                        <option value="Normal">Normal</option>
                                        <option value="Hot">Hot</option>
                                        <option value="Extreme Heat">Extreme Heat</option>
                                        <option value="Cold">Cold</option>
                                        <option value="Extreme Cold">Extreme Cold</option>
                                        <option value="Ligth Radioactivity">Light Radioactivity</option>
                                        <option value="Radioactive">Radioactive</option>
                                        <option value="Ligth Toxicity">Light Toxicity</option>
                                        <option value="Toxic">Toxic</option>
                                    </select>
                                    <br>
                                    <h4> Enviroment: </h4>
                                    <!-- ENTER CLIMATE INFORMATION -->
                                    <select name="moon_climate" class="form-control" id="dropdownMenu1">
                                        <option value="Lush">Lush</option>
                                        <option value="Savannah">Savannah</option>
                                        <option value="Dessert">Dessert</option>
                                        <option value="Mediterranean">Mediterranean</option>
                                        <option value="Jungle">Jungle</option>
                                        <option value="Forest">Forest</option>
                                        <option value="Highland">Highland</option>
                                        <option value="Sub Arctic">Sub Arctic</option>
                                        <option value="Sub Zero">Sub Zero</option>
                                    </select>
                                    <br>
                                    <h4> Life: </h4>
                                    <!-- ENTER LIFE INFORMATION -->
                                    <select name="moon_life" class="form-control" id="dropdownMenu1">
                                        <option value="None">None</option>
                                        <option value="Scarce">Scarce</option>
                                        <option value="Fair">Fair</option>
                                        <option value="Common">Common</option>
                                        <option value="Abundant">Abundant</option>
                                    </select>
                                    <br>
                                    <h4> Size: </h4>
                                    <!-- ENTER SIZE INFORMATION -->
                                    <select name="moon_size" class="form-control" id="dropdownMenu1">
                                        <option value="Tiny">Tiny</option>
                                        <option value="Small">Small</option>
                                        <option value="Medium">Medium</option>
                                        <option value="Large">Large</option>
                                        <option value="Huge">Huge</option>
                                    </select>
                                    <br>
                                    <h4> Sentinals: </h4>
                                    <!-- ENTER SENTINAL INFORMATION -->
                                        <select name="moon_sentinals" class="form-control" id="dropdownMenu1">
                                        <option value="None">None</option>
                                        <option value="Relaxed">Relaxed</option>
                                        <option value="Standard">Standard</option>
                                        <option value="High Security">High Security</option>
                                        <option value="Frenzied">Frenzied</option>
                                    </select>
                                    <br>
                                    <h4> Minerals: </h4>
                                    <!-- ENTER MINERAL INFORMATION -->
                                    <input class="form-control" type="text" name="moon_minerals" value="" placeholder="Planet Minerals">
                                    <br>
                                    <h4> Rating: </h4>
                                    <!-- ENTER RATING INFORMATION -->
                                    <select name="moon_rating" class="form-control" id="dropdownMenu1">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                        <option value="9">9</option>
                                        <option value="10">10</option>
                                    </select>
                                    <br>
                                    
                                    <h4> Select main image to upload: </h4>
                                <input class="btn btn-primary form-control" type="file" name="moon_main_image" id="fileToUpload">
                                <br>
                                
                                <h4> Select extra image to upload: </h4>
                                <input class="btn btn-primary form-control" type="file" name="moon_extra_image" id="fileToUpload">
                                <br>
                                
                                <h4> Select extra image to upload: </h4>
                                <input class="btn btn-primary form-control" type="file" name="moon_extra_image1" id="fileToUpload">
                                <br><br>
                                </div>
                                <input class="btn btn-lg btn-success" id="submit_button1" type="submit" name="submit" value="Submit">
                            
                            
                        </form>


                    </div>
                </div>
            </div>
                 
         <?php
                    // </editor-fold>
                    ?>
                    
                <?php
        // <editor-fold defaultstate="collapsed" desc="Creature Modal">
  
  ?>
                <!--/////////////////////////////////// CREATURE MODAL  //////////////////////////////////// -->
                
                <div class="modal fade" id="creature_modal" tabindex="-1" role="dialog"
             aria-labelledby="myModalLabel5" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <h1 id="title_id"> Add a creature </h1>

                    <?php
                      $creature_name = "";
                      $creature_planet = "";
                      $creature_life_type = "";
                      $creature_size = "";
                      $creature_diet = "";
                      $creature_rating = "";
                      $creature_main_image[0] = "";
                      
                      $sql = $conn->prepare("SELECT * FROM `test` WHERE `id` = 5");
              $sql->execute();
              $result = $sql->fetchObject();
              $creature_star = $result->name;
              $moon_or_planet = $result->owner;
              if ($moon_or_planet == NULL){
                  $moon_or_planet = "planets";
              }
                      


                      if ($_SERVER["REQUEST_METHOD"] == "POST") {
                          if (empty($_POST["creature_name"])) {
                              $creature_name = "";
                          } else {$creature_name = test_input($_POST["creature_name"]);}
                          
                          if (empty($_POST["creature_planet"])) {
                              $creature_planet = "";
                          } else {$creature_planet = test_input($_POST["creature_planet"]);}
                          
                          if (empty($_POST["creature_life_type"])) {
                              $creature_life_type = "";
                          } else {$creature_life_type = test_input($_POST["creature_life_type"]);}
                          
                          if (empty($_POST["creature_size"])) {
                              $creature_size = "";
                          } else {$creature_size = test_input($_POST["creature_size"]);}
                          
                          if (empty($_POST["creature_diet"])) {
                              $creature_diet = "";
                          } else {$creature_diet = test_input($_POST["creature_diet"]);}
                          
                          if (empty($_POST["creature_rating"])) {
                              $creature_rating = "";
                          } else {$creature_rating = test_input($_POST["creature_rating"]);}
                          
                          if (empty($_POST["creature_main_image"])) {
                              $creature_main_image = "";
                          } else {$creature_main_image = test_input($_POST["creature_main_image"]);}
                              

                          add_creature($creature_name , $creature_planet , $creature_life_type , $creature_size , $creature_diet
                                         , $creature_rating , $creature_main_image, $moon_or_planet, $creature_star);
                          
                             
                          }
                      
                    ?>
                    <div id="formDiv">     
                        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">  
                            
                            <!--//// NAME -->
                            <input class="form-control" type="text" name="creature_name" value="" placeholder="name">
                            <br>
                            <!--//// PLANET OR MOON -->
                            <h4> Select Planet/Moon: </h4>
                                    <select name="creature_planet" class="form-control" id="dropdownMenu1">

                                        <?php
                                      $id = 0;
                                      global $planet_limit;
                                      global $moon_limit;
                                      $current_limit = 0;
                                      $testing = "planets";
                                      
                                      
                                      if($moon_or_planet == "planets"){
                                          $current_limit = $planet_limit;
                                      }else{
                                          $current_limit = $moon_limit;
                                      }
                                      
                                      $data_array = sort_table("$moon_or_planet" , $current_limit , "id" , "name" , "ASC" );
                                      $array_count = count($data_array);
                                      
                                      
                                      

                                      while ($id <= $array_count) {
                                          $sql = $conn->prepare("SELECT * FROM `$moon_or_planet` WHERE `id` = :id");
                                          $sql->bindParam('id', $data_array[$id], PDO::PARAM_INT);
                                          $sql->execute();

                                          $result = $sql->fetchObject();

                                          if ($result != false) {
                                              
                                              $current_star_system = $result->star_system;
                                              
                                              if($current_star_system == $creature_star){

                                              $planet_name = $result->name;
                                              ?>

                                              <option value="<?= $planet_name; ?>"><?php echo $planet_name; ?></option>
                                              <?php
                                              } else{}
                                          } else {
                                              
                                          }

                                          $id++;
                                      }
                                      
                                      
                                      
                                      
                                    ?>
                                        
                                     
                                    </select>
                            <br>
                            <!--//// LIFE TYPE -->
                            
                            <h4> Life Type: </h4>
                                    <!-- ENTER LIFE TYPE INFORMATION -->
                                        <select name="creature_life_type" class="form-control" id="dropdownMenu1">
                                        <option value="Land">Land</option>
                                        <option value="Air">Air</option>
                                        <option value="Sea">Sea</option>
                                    </select>
                            
                            
                            <!--//// SIZE -->
                            <br>
                            <h4> Size: </h4>
                                    <!-- ENTER SIZE INFORMATION -->
                                        <select name="creature_size" class="form-control" id="dropdownMenu1">
                                        <option value="Tiny">Tiny</option>
                                        <option value="Small">Small</option>
                                        <option value="Medium">Medium</option>
                                        <option value="Large">Large</option>
                                        <option value="Huge">Huge</option>
                                    </select>
                            
                            <!--//// DIET -->
                            <br>
                            <h4> Diet: </h4>
                                    <!-- ENTER DIET INFORMATION -->
                                        <select name="creature_diet" class="form-control" id="dropdownMenu1">
                                        <option value="Herbivore">Herbivore</option>
                                        <option value="Carnivore">Carnivore</option>
                                        <option value="Omnivore">Omnivore</option>
                                    </select>
                            
                            <!--//// RATING -->
                            <br>
                            <h4> Rating: </h4>
                                    <!-- ENTER RATING INFORMATION -->
                                    <select name="creature_rating" class="form-control" id="dropdownMenu1">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                        <option value="9">9</option>
                                        <option value="10">10</option>
                                    </select>
                            
                            <!--//// IMAGE -->
                            <br>
                            <h4> Select image to upload: </h4>
                                <input class="btn btn-primary form-control" type="file" name="creature_main_image" id="fileToUpload">
                            
                            
                    
                       
                            
                            <br><br>
                            </div>

                            <input class="btn btn-success" id="submit_button" type="submit" name="submit2" value="Submit" >  
                        </form>


                    </div>
                </div>
            </div>
                
                <?php
                    // </editor-fold>
                    ?>
                
               <?php
        // <editor-fold defaultstate="collapsed" desc="Flora Modal">
  
  ?> 
                <!-- ////////////////////////////////// FLORA MODAL /////////////////////////////-->
                
                
                
                      <div class="modal fade" id="flora_modal" tabindex="-1" role="dialog"
             aria-labelledby="myModalLabel5" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <h1 id="title_id"> Add a Flora </h1>

                    <?php
                      $creature_name = "";
                      $creature_planet = "";
                      $creature_life_type = "";
                      $creature_size = "";
                      $creature_diet = "";
                      $creature_rating = "";
                      $creature_main_image[0] = "";
                      
                      $sql = $conn->prepare("SELECT * FROM `test` WHERE `id` = 5");
              $sql->execute();
              $result = $sql->fetchObject();
              $flora_star = $result->name;
              $moon_or_planet = $result->owner;
              if ($moon_or_planet == NULL){
                  $moon_or_planet = "planets";
              }
                      


                      if ($_SERVER["REQUEST_METHOD"] == "POST") {
                          if (empty($_POST["flora_name"])) {
                              $flora_name = "";
                          } else {$flora_name = test_input($_POST["flora_name"]);}
                          
                          if (empty($_POST["flora_planet"])) {
                              $flora_planet = "";
                          } else {$flora_planet = test_input($_POST["flora_planet"]);}
                          
                          if (empty($_POST["flora_size"])) {
                              $flora_size = "";
                          } else {$flora_size = test_input($_POST["flora_size"]);}
                          
                          if (empty($_POST["flora_diet"])) {
                              $flora_diet = "";
                          } else {$flora_diet = test_input($_POST["flora_diet"]);}
                          
                          if (empty($_POST["flora_rating"])) {
                              $flora_rating = "";
                          } else {$flora_rating = test_input($_POST["flora_rating"]);}
                          
                          if (empty($_POST["flora_main_image"])) {
                              $flora_main_image = "";
                          } else {$flora_main_image = test_input($_POST["flora_main_image"]);}
                              
                          
                          add_flora($flora_name , $flora_planet , $flora_size , $flora_diet
        , $flora_rating , $flora_main_image, $moon_or_planet, $flora_star);
                          
                             
                          }
                      
                    ?>
                    <div id="formDiv">     
                        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">  
                            
                            <!--//// NAME -->
                            <input class="form-control" type="text" name="flora_name" value="" placeholder="name">
                            <br>
                            <!--//// PLANET OR MOON -->
                            <h4> Select Planet/Moon: </h4>
                                    <select name="flora_planet" class="form-control" id="dropdownMenu1">

                                        <?php
                                      $id = 0;
                                      global $planet_limit;
                                      global $moon_limit;
                                      $current_limit = 0;
                                      $testing = "planets";
                                      
                                      
                                      if($moon_or_planet == "planets"){
                                          $current_limit = $planet_limit;
                                      }else{
                                          $current_limit = $moon_limit;
                                      }
                                      
                                      $data_array = sort_table("$moon_or_planet" , $current_limit , "id" , "name" , "ASC" );
                                      $array_count = count($data_array);
                                      
                                      
                                      

                                      while ($id <= $array_count) {
                                          $sql = $conn->prepare("SELECT * FROM `$moon_or_planet` WHERE `id` = :id");
                                          $sql->bindParam('id', $data_array[$id], PDO::PARAM_INT);
                                          $sql->execute();

                                          $result = $sql->fetchObject();

                                          if ($result != false) {
                                              
                                              $current_star_system = $result->star_system;
                                              
                                              if($current_star_system == $flora_star){

                                              $planet_name = $result->name;
                                              ?>

                                              <option value="<?= $planet_name; ?>"><?php echo $planet_name; ?></option>
                                              <?php
                                              } else{}
                                          } else {
                                              
                                          }

                                          $id++;
                                      }
                                      
                                      
                                      
                                      
                                    ?>
                                        
                                     
                                    </select>
                            <br>
                            
                            <!--//// SIZE -->
                            <br>
                            <h4> Size: </h4>
                                    <!-- ENTER SIZE INFORMATION -->
                                        <select name="flora_size" class="form-control" id="dropdownMenu1">
                                        <option value="Tiny">Tiny</option>
                                        <option value="Small">Small</option>
                                        <option value="Medium">Medium</option>
                                        <option value="Large">Large</option>
                                        <option value="Huge">Huge</option>
                                    </select>
                            
                            <!--//// DIET -->
                            <br>
                            <h4> Diet: </h4>
                                    <!-- ENTER DIET INFORMATION -->
                                        <select name="flora_diet" class="form-control" id="dropdownMenu1">
                                        <option value="Herbivore">Herbivore</option>
                                        <option value="Carnivore">Carnivore</option>
                                        <option value="Omnivore">Omnivore</option>
                                    </select>
                            
                            <!--//// RATING -->
                            <br>
                            <h4> Rating: </h4>
                                    <!-- ENTER RATING INFORMATION -->
                                    <select name="flora_rating" class="form-control" id="dropdownMenu1">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                        <option value="9">9</option>
                                        <option value="10">10</option>
                                    </select>
                            
                            <!--//// IMAGE -->
                            <br>
                            <h4> Select image to upload: </h4>
                                <input class="btn btn-primary form-control" type="file" name="flora_main_image" id="fileToUpload">
                            
                            
                    
                       
                            
                            <br><br>
                            </div>

                            <input class="btn btn-success" id="submit_button" type="submit" name="submit_flora2" value="Submit" >  
                        </form>


                    </div>
                </div>
            </div>
                
                <?php
                    // </editor-fold>
                    ?>
                   
                <?php
        // <editor-fold defaultstate="collapsed" desc="Ship Modal">
  
  ?>
                
                
                <!--//////////////////////////////////////// SHIP MODAL  ////////////////////////////////////////////// -->
                
                <div class="modal fade" id="ship_modal" tabindex="-1" role="dialog"
             aria-labelledby="myModalLabel5" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <h1 id="title_id"> Add a ship </h1>

                    <?php
                      $ship_name = "";
                      $ship_type = "";
                      $ship_main_image = "";


                      if ($_SERVER["REQUEST_METHOD"] == "POST") {
                         if (empty($_POST["ship_name"])) {
                              $ship_name = "";
                          } else {$ship_name = test_input($_POST["ship_name"]);}
                          
                          if (empty($_POST["ship_type"])) {
                              $ship_type = "";
                          } else {$ship_type = test_input($_POST["ship_type"]);}
                          
                          if (empty($_POST["ship_main_image"])) {
                              $ship_main_image = "";
                          } else {$ship_main_image = test_input($_POST["ship_main_image"]);}
                          
                          
                          add_ship($ship_name , $ship_type , $ship_main_image);
                      }
                    ?>
                    <div id="formDiv">     
                        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">  
                            <input id="ship_input" class="form-control" type="text" name="ship_name" value="" placeholder="name">
                            <br><br>
                            <h4> Ship Type: </h4>
                                    <!-- ENTER SHIP INFORMATION -->
                                        <select name="ship_type" class="form-control" id="dropdownMenu1">
                                        <option value="Scientific">Scientific</option>
                                        <option value="Combat">Combat</option>
                                        <option value="Explorer">Explorer</option>
                                        <option value="Trader">Trader</option>
                                    </select>
                                    <br><br>
                                    <h4> Select image to upload: </h4>
                                <input class="btn btn-primary form-control" type="file" name="ship_main_image" id="fileToUpload">
                                <br>
                                    
                                    
                                    
                                    
                                    
                            </div>

                            <input class="btn btn-success" id="submit_button1" type="submit" name="submit3" value="Submit" >  
                        </form>


                    </div>
                </div>
            </div>
                
                <?php
                    // </editor-fold>
                  
                  // <editor-fold defaultstate="collapsed" desc="Media Modal">
  
  ?>
                
                
                <!--//////////////////////////////////////// MEDIA MODAL  ////////////////////////////////////////////// -->
                
                <div class="modal fade" id="media_modal" tabindex="-1" role="dialog"
             aria-labelledby="myModalLabel5" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <h1 id="title_id"> Add Media </h1>

                    <?php
                      
                      
                      $media_name = "";
                      $media_type = "";
                      $media_file = "";


                      if ($_SERVER["REQUEST_METHOD"] == "POST") {
                          
                         if (empty($_POST["media_name"])) {
                              $media_name = "";
                          } else {$media_name = test_input($_POST["media_name"]);}
                          
                          if (empty($_POST["media_type"])) {
                              $media_type = "";
                          } else {$media_type = test_input($_POST["media_type"]);}
                          
                          if (empty($_POST["media_file"])) {
                              $media_file = "";
                          } else {$media_file = test_input($_POST["media_file"]);}
                          
                          
                          add_media($media_name , $media_type , $media_file);
                      }
                    ?>
                    <div id="formDiv">     
                        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">  
                            <input id="ship_input" class="form-control" type="text" name="media_name" value="" placeholder="name">
                            <br><br>
                            <h4> Ship Type: </h4>
                                    <!-- ENTER SHIP INFORMATION -->
                                        <select name="media_type" class="form-control" id="dropdownMenu1">
                                        <option value="image">Image</option>
                                        <option value="video">Video</option>
                                        
                                    </select>
                                    <br><br>
                                    <h4> Select file to upload: </h4>
                                <input class="btn btn-primary form-control" type="file" name="media_file" id="fileToUpload">
                                <br>
                                    
                                    
                                    
                                    
                                    
                            </div>

                            <input class="btn btn-success" id="submit_button1" type="submit" name="submit5" value="Submit" >  
                        </form>


                    </div>
                </div>
            </div>
                
                <?php
                    // </editor-fold>
                    ?>
                
                
                <script>
                    
                    
//                    function hasWhiteSpaceOrEmpty(s) 
//{
//  return s == "" || s.indexOf(' ') >= 0;
//}
//
//function validateInput()
//{
//    var inputVal = $("#galaxy_input").val();
//    if(hasWhiteSpaceOrEmpty(inputVal))
//    {
//        //This has whitespace or is empty, disable the button
//        $("#submit_button").attr("disabled", "disabled");
//    }
//    else
//    {
//        //not empty or whitespace
//        $("#submit_button").removeAttr("disabled");
//    }
//}
//
//$(document).ready(function() {
//    $("#galaxy_input").keyup(validateInput);
//});

function launchFunction(){
$('#moon_modal').modal('show');
}
                    
                    
                    </script>
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                     <!--///////////////////////////////////////// CHOICE MODALS //////////////////////////////////////////// -->
                     
                     
                     <?php
        // <editor-fold defaultstate="collapsed" desc="Moon Choice Modal">
  
  ?>
                     <!-- /////////////////////////////// MOON CHOICE //////////////////////////////////////// -->
                
                 
                <div class="modal fade" id="choice_modal_moon" tabindex="-1" role="dialog"
             aria-labelledby="myModalLabel5" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <h1 id="title_id"> Select a choice </h1>
     
                    <div id="formDiv">
                    <form method="post" action="<?=$current_page?>.php?id=1">
                    <h4> Select Star System: </h4>
                                    <select name="choice_star_moon" class="form-control" id="dropdownMenu1">

                                        <?php
                                      $id = 0;
                                      global $star_system_limit;
                                      
                                      $data_array = sort_table("star_systems" , $star_system_limit , "ID" , "date_logged" , "DESC" );
                                      $array_count = count($data_array);
                                      
                                      

                                      while ($id <= $array_count) {
                                          $sql = $conn->prepare("SELECT * FROM `star_systems` WHERE `id` = :id");
                                          $sql->bindParam('id', $data_array[$id], PDO::PARAM_INT);
                                          $sql->execute();

                                          $result = $sql->fetchObject();

                                          if ($result != false) {

                                              $star_name = $result->name;
                                              ?>

                                              <option value="<?= $star_name; ?>"><?php echo $star_name; ?></option>
                                              <?php
                                          } else {
                                              
                                          }

                                          $id++;
                                      }
                                      
                                      
                                    ?>
                                        
                                     
                                    </select>
                    <br>
                        <?php
                          if (isset($_POST['submit1'])) {
                              //save what is entered
                              $choice_star = $_POST['choice_star_moon'];
                              $testing = "this is a test";
                              
                              $sql = $conn->prepare("UPDATE `test` SET `name` = '$choice_star' WHERE `id` = '5'");
              $sql->execute();
              echo "<meta http-equiv='refresh' content='0'>";
                          
                          }
                              ?>
                          
                    
                    </div>
                    
                    <input class="btn btn-success" id="submit_button" type="submit" name="submit1" value="Continue">
            </form>
                    
                    
                    
                </div>
                </div>
                     </div>
                     
                     <?php
                    // </editor-fold>
                    ?>
                     
                     
                     <?php
        // <editor-fold defaultstate="collapsed" desc="Creature Choice Modal">
  
  ?>
                     <!--/////////////////////////////////// CREATURE CHOICE ////////////////////////////////// -->
                     
                     
                     
                     <div class="modal fade" id="choice_modal_creature" tabindex="-1" role="dialog"
             aria-labelledby="myModalLabel5" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <h1 id="title_id"> Specify a Star System </h1>
     
                    <div id="formDiv">
                    <form method="post" action="<?=$current_page?>.php?id=2">
                        <h4> Planet or Moon:
                                <select name="planet_or_moon" class="form-control" id="dropdownMenu1">
                            <option value="planets">Planet</option>
                            <option value="moons">Moon</option>
                                    
                            </select>
                            <br>
                        
                        
                    <h4> Select Star System: </h4>
                                    <select name="choice_star_creature" class="form-control" id="dropdownMenu1">

                                        <?php
                                      $id = 0;
                                      global $star_system_limit;
                                      
                                      $data_array = sort_table("star_systems" , $star_system_limit , "ID" , "date_logged" , "DESC" );
                                      $array_count = count($data_array);
                                      
                                      

                                      while ($id <= $array_count) {
                                          $sql = $conn->prepare("SELECT * FROM `star_systems` WHERE `id` = :id");
                                          $sql->bindParam('id', $data_array[$id], PDO::PARAM_INT);
                                          $sql->execute();

                                          $result = $sql->fetchObject();

                                          if ($result != false) {

                                              $star_name = $result->name;
                                              ?>

                                              <option value="<?= $star_name; ?>"><?php echo $star_name; ?></option>
                                              <?php
                                          } else {
                                              
                                          }

                                          $id++;
                                      }
                                      
                                      
                                    ?>
                                        
                                     
                                    </select>
                    <br>
                        <?php
                          if (isset($_POST['submit'])) {
                              //save what is entered
                              $choice_star = $_POST['choice_star_creature'];
                              $moon_or_planet = $_POST['planet_or_moon'];
                              
                              $sql = $conn->prepare("UPDATE `test` SET `name` = '$choice_star' WHERE `id` = '5'");
              $sql->execute();
              
              $sql = $conn->prepare("UPDATE `test` SET `owner` = '$moon_or_planet' WHERE `id` = '5'");
              $sql->execute();
              
              echo "<meta http-equiv='refresh' content='0'>";
                          
                          }
                              ?>
                          
                    
                    </div>
                    
                    <input class="btn btn-success" id="submit_button" type="submit" name="submit" value="Continue">
                    </form>
                    
                    
                </div>
                </div>
                </div>
                     
                     <?php
                    // </editor-fold>
                    ?>
                     
                     
                     <?php
        // <editor-fold defaultstate="collapsed" desc="Flora Modal Choice">
  
  ?>
                                 <!--/////////////////////////////////// FLORA CHOICE ////////////////////////////////// -->
                     
                     
                     
                     <div class="modal fade" id="choice_modal_flora" tabindex="-1" role="dialog"
             aria-labelledby="myModalLabel5" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <h1 id="title_id"> Specify a Star System </h1>
     
                    <div id="formDiv">
                    <form method="post" action="<?=$current_page?>.php?id=3">
                        <h4> Planet or Moon:
                                <select name="planet_or_moon2" class="form-control" id="dropdownMenu1">
                            <option value="planets">Planet</option>
                            <option value="moons">Moon</option>
                                    
                            </select>
                            <br>
                        
                        
                    <h4> Select Star System: </h4>
                                    <select name="choice_star_flora" class="form-control" id="dropdownMenu1">

                                        <?php
                                      $id = 0;
                                      global $star_system_limit;
                                      
                                      $data_array = sort_table("star_systems" , $star_system_limit , "ID" , "date_logged" , "DESC" );
                                      $array_count = count($data_array);
                                      
                                      

                                      while ($id <= $array_count) {
                                          $sql = $conn->prepare("SELECT * FROM `star_systems` WHERE `id` = :id");
                                          $sql->bindParam('id', $data_array[$id], PDO::PARAM_INT);
                                          $sql->execute();

                                          $result = $sql->fetchObject();

                                          if ($result != false) {

                                              $star_name = $result->name;
                                              ?>

                                              <option value="<?= $star_name; ?>"><?php echo $star_name; ?></option>
                                              <?php
                                          } else {
                                              
                                          }

                                          $id++;
                                      }
                                      
                                      
                                    ?>
                                        
                                     
                                    </select>
                    <br>
                        <?php
                          if (isset($_POST['submit_flora'])) {
                              //save what is entered
                              $choice_star = $_POST['choice_star_flora'];
                              $moon_or_planet = $_POST['planet_or_moon2'];
                              
                              $sql = $conn->prepare("UPDATE `test` SET `name` = '$choice_star' WHERE `id` = '5'");
              $sql->execute();
              
              $sql = $conn->prepare("UPDATE `test` SET `owner` = '$moon_or_planet' WHERE `id` = '5'");
              $sql->execute();
              
              echo "<meta http-equiv='refresh' content='0'>";
                          
                          }
                              ?>
                          
                    
                    </div>
                    
                    <input class="btn btn-success" id="submit_button" type="submit" name="submit_flora" value="Continue">
                    </form>
                    
                    
                </div>
                </div>
                </div>
                                 
                                 <?php
                    // </editor-fold>
                    ?>
                                 
                                 
                                 <!--////////////////////////////// STATISTICS MODAL ////////////////////////////////////////// -->
                                 
                                 <?php
        // <editor-fold defaultstate="collapsed" desc="STATISTICS MODAL">
                                   
  
  ?>
                                 <!--/////////////////////////////////// STATS ////////////////////////////////// -->
                     
                     
                     
                     <div  style="width: 1930px;" class="modal fade" id="stats_modal" tabindex="-1" role="dialog"
             aria-labelledby="myModalLabel5" aria-hidden="true">
            <div style=" margin-left:auto; margin-right: 1000px;  width: 455px;" class="modal-dialog modal-md" role="document">
                <div class="modal-content">
                    <h1 style="font-family:noMansFont; font-size: 40pt; font-weight: bold;" id="title_id"> S T A T S </h1>
     
                    <div  class="container">
                        
                        <?php
                          
                          
                          $stat_count = 10;
                          $stat_number = 1;
                          
                          while($stat_number <= $stat_count){
                          
                          $stat_array = get_stat($stat_number);
                          $stat_name = $stat_array[0];
                          $stat_value = $stat_array[1];
                          ?>
                        
                        <div class="row">
                            <div class="col-md-4">
                                <h3 id="stat_text"><?= $stat_name; ?></h3>
                            </div>
                            <div >
                            <h3 id="stat_text"><?= $stat_value; ?></h3>
                            </div>
                        </div>
                          <?php 
                            $stat_number++;
                          }
                          ?>
                        
                        
                        
                        
                    </div>
                    
                    
                </div>
                </div>
                </div>
                                 
                                 <?php
                    // </editor-fold>
                    
                                 
                                 
                                 
        // <editor-fold defaultstate="collapsed" desc="Goals MODAL">
                                   
  
  ?>
                                 <!--/////////////////////////////////// Goals ////////////////////////////////// -->
                     
                     
                     
                     <div   class="modal fade" id="goals_modal" tabindex="-1" role="dialog"
             aria-labelledby="myModalLabel5" aria-hidden="true">
            <div  class="modal-dialog modal-md" role="document">
                <div class="modal-content">
                        <h1 style="font-family:noMansFont; font-size: 40pt; font-weight: bold; margin-bottom: 40px;" id="title_id"> G O A L S </h1>
     
                    <div  class="container">
                        
                        <?php
                          
                          $progress_number = 1;
                          $progress_count = 31;
                          while($progress_number <= $progress_count){
                          $progress_data = get_progress($progress_number);
                          $goal_title = $progress_data[0];
                          $current_amount = $progress_data[1];
                          $goal_amount = $progress_data[2];
                          $percentage = ($current_amount / $goal_amount) * 100;
                          if($current_amount > $goal_amount){
                              $current_amount = $goal_amount;
                          }
                          $display_amount = "$current_amount / $goal_amount";
                          
                          $display = "";
                          
                          if($goal_title == "break"){
                              $display = "display: none;";
                              $goal_title = " ";
                              $display_amount = " ";
                              
                          }
                          
                          else if($percentage <= 25){
                          $progress_id = "progress_low";
                          }
                          else if($percentage <= 75){
                              $progress_id = "progress_medium";
                          }
                          else if($percentage <= 99){
                              $progress_id = "progress_high";
                          }
                          else if($percentage >= 100){
                              $progress_id = "progress_complete";
                          }
                          
                          
                          
                          ?>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <h3 style="text-align: center; margin-bottom: 0px;" id="stat_text"><?= $goal_title; ?></h3>
                            </div>
                        </div>
                        <div class="row">
                                <p3 style="text-align: center; margin-left: 10px; margin-top: 0px;" id="stat_text"><?= $display_amount; ?></p3>
                        </div>
                        <div class="row">
                                <progress id="<?= $progress_id; ?>" style="<?= $display; ?> width: 50%; margin-left: 7px;" class="progress progress-danger" value="<?= $current_amount; ?>" max="<?= $goal_amount; ?>">75%</progress>
                        </div>
                        
                        <?php
                          $progress_number++;
                          
                          }?>
                        
                        
                        
                        
                        </div>
                          
                        
                        
                        
                        
                    </div>
                    
                    
                </div>
                </div>
                </div>
                                 
                                 <?php
                    // </editor-fold>
                    ?>
                                 
                    </body>

                    </html>
