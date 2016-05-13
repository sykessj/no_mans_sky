<!DOCTYPE html>
<?php
  require_once('C:\xampp\htdocs\no_mans_sky\includes\db.php');
  require_once('C:\xampp\htdocs\no_mans_sky\includes\db_checking.php');
  global $galaxy_limit;
  global $star_system_limit;

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
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="C:\xampp\htdocs\no_mans_sky\css\bootstrap.min.css">
        <script src="C:\xampp\htdocs\no_mans_sky\js\jquery.min.js"></script>
        <script src="C:\xampp\htdocs\no_mans_sky\js\bootstrap.min.js"></script>

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


        </style>
    <body>
        
        <!--/////////////////////////// NAV BAR  //////////////////////////// -->
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <ul id="nav" class="nav navbar-nav">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Tables Dropdown</a></li>
                    <li><a href="#">Statistics</a></li>

                </ul>
                <ul id="nav2" class="nav navbar-nav navbar-right">

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Add <span class="caret"></span></a>
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
                                      echo '<a href="" on-click="planet_function" data-toggle="modal" data-target="#choice_modal">Planet</a>';
                                  } else {
                                      
                                      echo '<p1 id="link_css"> Planet </p1>';
                                  }
                                ?>
                            </li>
                            <li><a href="">Moon</a></li>
                            <li><a href="">Creature</a></li>
                            <li><a href="">Flora</a></li>
                            <li><a href="">Ship</a></li>
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
                      $nameErr = "";


                      if ($_SERVER["REQUEST_METHOD"] == "POST") {
                          if (empty($_POST["galaxy_name"])) {
                              
                          } else {
                              $galaxy_name = test_input($_POST["galaxy_name"]);
                              echo $galaxy_name;


//    $disabled_count = $disabled_count + 1;
                              // check if name only contains letters and whitespace
                              if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
                                  
                              }

                              add_galaxy($galaxy_name);
                          }
                      }
                    ?>
                    <div id="formDiv">     
                        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">  
                            <input class="form-control" type="text" name="galaxy_name" value="" placeholder="name">
                            <span class="error"> <?php echo $nameErr; ?></span>
                            <br><br>
                            </div>

                            <input class="btn btn-success" id="submit_button" type="submit" name="submit" value="Submit" >  
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
                <div class="modal fade" id="choice_modal" tabindex="-1" role="dialog"
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
                                      } else {
                                          $planet_name = test_input($_POST["planet_name"]);
                                      }
                                      
                                      ////// GET NAME OF STAR  ///////
                                      if (empty($_POST["planet_star"])) {
                                      } else {
                                          $planet_star = test_input($_POST["planet_star"]);
                                      }
                                      
                                      ////// GET ENVIROMENT  ///////
                                      if (empty($_POST["planet_enviroment"])) {
                                      } else {
                                          $planet_enviroment = test_input($_POST["planet_enviroment"]);
                                      }
                                      
                                      ////// GET CLIMATE  ///////
                                      if (empty($_POST["planet_climate"])) {
                                      } else {
                                          $planet_climate = test_input($_POST["planet_climate"]);
                                      }
                                      
                                      ////// GET LIFE ///////
                                      if (empty($_POST["planet_life"])) {
                                      } else {
                                          $planet_life = test_input($_POST["planet_life"]);
                                      }
                                      
                                      ////// GET SIZE ///////
                                      if (empty($_POST["planet_size"])) {
                                      } else {
                                          $planet_size = test_input($_POST["planet_size"]);
                                      }
                                      
                                      ////// GET SENTINALS  ///////
                                      if (empty($_POST["planet_sentinals"])) {
                                      } else {
                                          $planet_sentinals = test_input($_POST["planet_sentinals"]);
                                      }
                                      
                                      ////// GET MINERALS ///////
                                      if (empty($_POST["planet_minerals"])) {
                                      } else {
                                          $planet_minerals = test_input($_POST["planet_minerals"]);
                                      }
                                      
                                      ////// GET RATING  ///////
                                      if (empty($_POST["planet_rating"])) {
                                      } else {
                                          $planet_rating = test_input($_POST["planet_rating"]);
                                      }
                                      
                                      ////// GET MAIN IMAGE  ///////
                                      if (empty($_POST["planet_main_image"])) {
                                      } else {
                                          $planet_image[0] = test_input($_POST["planet_main_image"]);
                                      }
                                      
                                      ////// GET EXTRA IMAGE  ///////
                                      if (empty($_POST["planet_extra_image"])) {
                                      } else {
                                          $planet_image[1] = test_input($_POST["planet_extra_image"]);
                                      }
                                      
                                      ////// GET ANOTHER EXTRA IMAGE  ///////
                                      if (empty($_POST["planet_extra_image1"])) {
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






                    </nav>

                    <?php
//                                 echo "name: " , $planet_name , "</br>";
//                                  echo "star system: " , $planet_star , "</br>";
//                                  echo "climate: " , $planet_climate , "</br>";
//                                  echo "life: " , $planet_life , "</br>";
//                                  echo "size: " , $planet_size , "</br>";
//                                  echo "sentinals: " , $planet_sentinals , "</br>";
//                                  echo "minerals: " , $planet_minerals , "</br>";
//                                  echo "rating: " , $planet_rating , "</br>";
//                                  echo "main image: " , $planet_image[0] , "</br>";
//                                  echo "extra image: " , $planet_image[1] , "</br>";
//                                  echo "extra image 2: " , $planet_image[2] , "</br>";



//  echo "<meta http-equiv='refresh' content='0'>";
                    ?>
                    </body>


                    </html>
