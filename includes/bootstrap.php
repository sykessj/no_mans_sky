<!DOCTYPE html>
<?php 
  
  require_once('C:\xampp\htdocs\no_mans_sky\includes\db.php');
  require_once('C:\xampp\htdocs\no_mans_sky\includes\db_checking.php');
  
  
   function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
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
                                <li><a href="" data-toggle="modal" data-target="#star_modal">Star System</a></li>
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


<!-- Modal -->
<div class="modal fade" id="galaxy_modal" tabindex="-1" role="dialog"
     aria-labelledby="myModalLabel5" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <h1 id="title_id"> Add a galaxy </h1>
        
        <?php  
          
          $name = "";
          $nameErr = "";
          
          
          if ($_SERVER["REQUEST_METHOD"] == "POST") {
          if (empty($_POST["name"])) {
    $nameErr = "Name is required";
    
  } else {
    $name = test_input($_POST["name"]);
//    $disabled_count = $disabled_count + 1;
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed"; 
    }
    
    add_galaxy($name);
    
    
          }}
          
          ?>
   <div id="formDiv">     
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
         <input class="form-control" type="text" name="name" value="" placeholder="name">
  <span class="error"> <?php echo $nameErr;?></span>
  <br><br>
  </div>
        
  <input class="btn btn-success" id="submit_button" type="submit" name="submit" value="Submit" >  
</form>
        
    
  </div>
</div>
</div>












<div class="modal fade" id="star_modal" tabindex="-1" role="dialog"
     aria-labelledby="myModalLabel5" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <h1> This is the star modal</h1>
        
        <?php 
          
          $name = "";
          $nameErr = "";
          $car = "";
          $upload_image = "";
          $disabled_count = 0;
          $star_system = "";
          $upload_image[0] = "";
          
          if ($_SERVER["REQUEST_METHOD"] == "POST") {
          if (empty($_POST["name"])) {
    $nameErr = "Name is required";
    
  } else {
    $name = test_input($_POST["name"]);
    $disabled_count = $disabled_count + 1;
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed"; 
    }
    
    
          }
          
          $star_system = ($_POST["star_systems"]);
          $upload_image = [$_POST["fileToUpload"]];
          
          
    }
  
 


          ?>
        
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  Name: <input type="text" name="name" value="">
  <span class="error">* <?php echo $nameErr;?></span>
  <br><br>
  Dropdown Test: <select name="star_systems" class="btn btn-secondary" id="dropdownMenu1">
    <option value="star 1">star 1</option>
    <option value="star 2">star 2</option>
    <option value="star 3">star 3</option>
    <option value="star 4">star 4</option>
  </select>
  <br><br>
  Select image to upload:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <br><br>
  E-mail: <input type="dropdown" name="email" value="">
  <br><br>
  Website: <input type="text" name="website" value="">
  <br><br>
  Comment: <textarea name="comment" rows="5" cols="40"></textarea>
  <br><br>
  <br><br>
  <?php $disabled = 'enabled';?>
  <input type="submit" name="submit" value="Submit" <?php echo $disabled; ?>>  
</form>
    </div>
  </div>
</div>
        

  
</nav>

<?php 
  
  echo $name , "</br>";  
  echo $star_system , "</br>";
  echo $upload_image[0] , "</br>";
  $name = "";
  $star_system = "";
  $upload_image = "";
  ?>
        
    </body>
</html>
