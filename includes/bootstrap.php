<!DOCTYPE html>
<?php 
  
  require_once('C:\xampp\htdocs\no_mans_sky\includes\db.php');
  require_once('C:\xampp\htdocs\no_mans_sky\includes\db_checking.php');
  global $galaxy_limit;
  
  
   function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
  
  $number = 1;
}
  
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
    <nav class="navbar navbar-default">
                <div class="container-fluid">
                    <ul id="nav" class="nav navbar-nav">
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Something else</a></li>
                        
                    </ul>
                    <ul id="nav2" class="nav navbar-nav navbar-right">
                        
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Add <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                
                                <li><a href="" data-toggle="modal" data-target="#galaxy_modal">Galaxy</a></li>
                                <li><?php $disable = true;
                                  if ($galaxy_limit != 0){
                                    echo '<a href="" data-toggle="modal" data-target="#star_modal">Star System</a>';
                                }
                                else { echo '<p1 id="link_css"> Star System </p1>';}
                                            
                                    ?>
                                </li>
                                <li><a href="">Planet</a></li>
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
    echo " This is empty";
    
  } else {
    $galaxy_name = test_input($_POST["galaxy_name"]);
    echo $galaxy_name;
    
    
//    $disabled_count = $disabled_count + 1;
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
      
    }
    
    add_galaxy($galaxy_name);
         
    }
    
}?>
   <div id="formDiv">     
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
         <input class="form-control" type="text" name="galaxy_name" value="" placeholder="name">
  <span class="error"> <?php echo $nameErr;?></span>
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
    if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
  }}
  
  
    
    if (empty($_POST["galaxy_inside"])) {
    $testing2 = "this is not working";
  } else {
    $galaxy_inside = test_input($_POST["galaxy_inside"]);
    
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$name)) {}
    
    
          }
          
    if (empty($_POST["fileToUpload"])) {
    $star_upload_image[0] = "Upload image is empty";
    
  } else {
    $star_upload_image[0] = ($_POST["fileToUpload"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$name)) {}
          }
          
          
     add_star($star_name , $galaxy_inside , $star_upload_image);     
}
?>
        
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
            <input class="form-control" type="text" name="star_name" value="" placeholder="name">
  <br><br>
  <h4> select galaxy: </h4>
  <select name="galaxy_inside" class="form-control" id="dropdownMenu1">
      <?php
        $id = 1;
        global $galaxy_limit;
        echo $galaxy_limit;
        
        while($id <= $galaxy_limit){
        $sql = $conn->prepare("SELECT * FROM `galaxy` WHERE `id` = :id");
              $sql->bindParam('id', $id, PDO::PARAM_INT);
              $sql->execute();

              $result = $sql->fetchObject();
              
              if($result != false){
              
              $galaxy_name = $result->name; ?>
              
    <option value="<?= $galaxy_name;  ?>"><?php echo $galaxy_name; ?></option>
    <?php
            
              }
              else{}
              
              $id++;
        }
        
            ?>
  </select>
  <br>
  <h4> Select main image to upload: </h4>
  <input class="btn btn-primary form-control" type="file" name="fileToUpload" id="fileToUpload">
    <br><br>
  <?php $disabled = 'enabled';?>
  </div>
  <input class="btn btn-lg btn-success" id="submit_button1" type="submit" name="submit" value="Submit" <?php echo $disabled; ?>>  
</form>
    </div>
  </div>
</div>







<!--  ///////////////////////////////////  PLANET MODAL  ///////////////////////////////////// -->
        

  
</nav>

<?php 
  
  echo $star_name , "</br>";  
  echo $star_system , "</br>";
  echo $star_upload_image[0] , "</br>";
  
//  echo "<meta http-equiv='refresh' content='0'>";
  ?>
        
    </body>
</html>
