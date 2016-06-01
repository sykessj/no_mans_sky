<!DOCTYPE html>
<?php
  require_once('C:\xampp\htdocs\no_mans_sky\includes\db.php');
  require_once('C:\xampp\htdocs\no_mans_sky\includes\db_checking.php');
  global $galaxy_limit;
  global $star_system_limit;
  global $planet_limit;
  global $moon_limit;
  $moon_star = "this is not really working";
  
  $link_id = 0;
  if (isset($_GET['id'])) {
  $link_id = $_GET['id'];
  }?>
  
 
  
  
  
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
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>

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
         
?>
        <!--/////////////////////////// NAV BAR  //////////////////////////// -->
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <ul id="nav" class="nav navbar-nav">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Tables Dropdown</a></li>
                    <li><a href="#">Statistics</a></li>
                    <li><a href="#">Planet Of The Day</a></li>
                    <li><a href="#">Creature Of The Day</a></li>
                    <li><a href="#">Periodic Table</a></li>

                </ul>
                <ul id="nav2" class="nav navbar-nav navbar-right">

                    <li class="dropdown">
                        <a href="#"  class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Add <span class="caret"></span></a>
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
                                  if ($star_system_limit != 0) {
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
                            <li><a href="" data-toggle="modal" data-target="#ship_modal">Ship</a></li>
                            
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>

        <!-- Button trigger modal -->
        
        
        
        
        
        
        
        
        
        
        
        
        


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










            <!--  ////////////////////////////  STAR SYSTEM MODAL ///////////////////////////////////// -->



            <div class="modal fade" id="star_modal" tabindex="-1" role="dialog"
                 aria-labelledby="myModalLabel5" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <h1 id="title_id"> Add a Star System </h1>
                        <div id="formDiv">

<?php
  $star_name = "";
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
          $star_upload_image[0] = "Upload image is empty";
      } else {
          $star_upload_image[0] = ($_POST["fileToUpload"]);
          // check if name only contains letters and whitespace
          if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
              
          }
      }


      add_star($star_name, $galaxy_inside, $star_upload_image);
  }
?>

                            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">  
                                <input class="form-control" type="text" name="star_name" value="" placeholder="name">
                                <br>
                                <h4> select galaxy: </h4>
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
                                      
                                      $data_array = sort_table("star_systems" , $star_system_limit , "ID" , "name" , "ASC" );
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
                                    <h4> Enviroment: </h4>
                                    <!-- ENTER ENVIROMENT INFORMATION -->
                                    <select name="planet_enviroment" class="form-control" id="dropdownMenu1">
                                        <option value="Normal">Normal</option>
                                        <option value="Hot">Extreme Heat</option>
                                        <option value="Cold">Extreme Cold</option>
                                        <option value="Toxic">Toxic</option>
                                    </select>
                                    <br>
                                    <h4> Climate: </h4>
                                    <!-- ENTER CLIMATE INFORMATION -->
                                    <select name="planet_climate" class="form-control" id="dropdownMenu1">
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
                                    <br>
                                    <h4> Life: </h4>
                                    <!-- ENTER LIFE INFORMATION -->
                                    <select name="planet_life" class="form-control" id="dropdownMenu1">
                                        <option value="None">None</option>
                                        <option value="Bacterial">Bacterial</option>
                                        <option value="Basic">Basic</option>
                                        <option value="Complex">Complex</option>
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
                                        <option value="Small Waves">Small Waves</option>
                                        <option value="Medium Waves">Medium Waves</option>
                                        <option value="Large Waves">Large Waves</option>
                                        <option value="Huge Waves">Huge Waves</option>
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
                                <input class="btn btn-primary form-control" type="file" name="planet_extra_image" id="fileToUpload">
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
                            
                           
                                    <br>
                            
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
                                    <h4> Enviroment: </h4>
                                    <!-- ENTER ENVIROMENT INFORMATION -->
                                    <select name="moon_enviroment" class="form-control" id="dropdownMenu1">
                                        <option value="Normal">Normal</option>
                                        <option value="Hot">Extreme Heat</option>
                                        <option value="Cold">Extreme Cold</option>
                                        <option value="Toxic">Toxic</option>
                                    </select>
                                    <br>
                                    <h4> Climate: </h4>
                                    <!-- ENTER CLIMATE INFORMATION -->
                                    <select name="moon_climate" class="form-control" id="dropdownMenu1">
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
                                    <br>
                                    <h4> Life: </h4>
                                    <!-- ENTER LIFE INFORMATION -->
                                    <select name="moon_life" class="form-control" id="dropdownMenu1">
                                        <option value="None">None</option>
                                        <option value="Bacterial">Bacterial</option>
                                        <option value="Basic">Basic</option>
                                        <option value="Complex">Complex</option>
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
                                        <option value="Small Waves">Small Waves</option>
                                        <option value="Medium Waves">Medium Waves</option>
                                        <option value="Large Waves">Large Waves</option>
                                        <option value="Huge Waves">Huge Waves</option>
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
              $moon_star = $result->name;
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
                                         , $creature_rating , $creature_main_image, $moon_or_planet);
                          
                             
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
                                              
                                              if($current_star_system == $moon_star){

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
              $moon_star = $result->name;
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
        , $flora_rating , $flora_main_image, $moon_or_planet);
                          
                             
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
                                              
                                              if($current_star_system == $moon_star){

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
                     
//                                 echo "name: " , $creature_name , "</br>";
//                                  echo "Parent Planet: " , $creature_planet , "</br>";
////                                  echo "enviromet: " , $moon_enviroment , "</br>";
////                                  echo "climate: " , $moon_climate , "</br>";
//                                  echo "life type: " , $creature_life_type , "</br>";
//                                  echo "size: " , $creature_size , "</br>";
//                                  echo "diet: " , $creature_diet , "</br>";
////                                  echo "minerals: " , $moon_minerals , "</br>";
//                                  echo "rating: " , $creature_rating , "</br>";
//                                  echo "main image: " , $creature_main_image[0] , "</br>";
////                                  echo "extra image: " , $moon_image[1] , "</br>";
////                                  echo "extra image 2: " , $moon_image[2] , "</br>";

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
})
}
                    
                    
                    </script>
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                     <!--///////////////////////////////////////// CHOICE MODALS //////////////////////////////////////////// -->
                     
                     
                     
                     <!-- /////////////////////////////// MOON CHOICE //////////////////////////////////////// -->
                
                 
                <div class="modal fade" id="choice_modal_moon" tabindex="-1" role="dialog"
             aria-labelledby="myModalLabel5" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <h1 id="title_id"> Select a choice </h1>
     
                    <div id="formDiv">
                    <form method="post" action="index.php?id=1">
                    <h4> Select Star System: </h4>
                                    <select name="choice_star_moon" class="form-control" id="dropdownMenu1">

                                        <?php
                                      $id = 0;
                                      global $star_system_limit;
                                      
                                      $data_array = sort_table("star_systems" , $star_system_limit , "ID" , "name" , "ASC" );
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
                    
                    <input class="btn btn-success" id="submit_button" type="submit" name="submit1" value="Submit">
            </form>
                    
                    
                    
                </div>
                </div>
                     </div>
                     
                     
                     <!--/////////////////////////////////// CREATURE CHOICE ////////////////////////////////// -->
                     
                     
                     
                     <div class="modal fade" id="choice_modal_creature" tabindex="-1" role="dialog"
             aria-labelledby="myModalLabel5" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <h1 id="title_id"> Specify a Star System </h1>
     
                    <div id="formDiv">
                    <form method="post" action="index.php?id=2">
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
                                      
                                      $data_array = sort_table("star_systems" , $star_system_limit , "ID" , "name" , "ASC" );
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
                    
                    <input class="btn btn-success" id="submit_button" type="submit" name="submit" value="Submit">
                    </form>
                    
                    
                </div>
                </div>
                </div>
                     
                     
                     
                     
                                 <!--/////////////////////////////////// CREATURE CHOICE ////////////////////////////////// -->
                     
                     
                     
                     <div class="modal fade" id="choice_modal_flora" tabindex="-1" role="dialog"
             aria-labelledby="myModalLabel5" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <h1 id="title_id"> Specify a Star System </h1>
     
                    <div id="formDiv">
                    <form method="post" action="index.php?id=3">
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
                                      
                                      $data_array = sort_table("star_systems" , $star_system_limit , "ID" , "name" , "ASC" );
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
                    
                    <input class="btn btn-success" id="submit_button" type="submit" name="submit_flora" value="Submit">
                    </form>
                    
                    
                </div>
                </div>
                </div>
                     
   
                    </body>


                    </html>
