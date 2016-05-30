<?php
require_once('C:\xampp\htdocs\no_mans_sky\includes\db.php');
  require_once('C:\xampp\htdocs\no_mans_sky\includes\db_checking.php');
  include('C:\xampp\htdocs\no_mans_sky\includes\bootstrap.php');
  global $conn;?>




 <div class="modal fade" id="modal_2" tabindex="-1" role="dialog"
             aria-labelledby="myModalLabel5" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <h1 id="title_id"> Select a choice </h1>
                    
                    <?php
                      $moon_star = "Not Working";
                    
                     if ($_SERVER["REQUEST_METHOD"] == "POST") {
                          if (empty($_POST["choice_name"])) {
                              $moon_star = "This has not been initialised";
                              $sql = $conn->prepare("UPDATE `test` SET `name` = '$moon_star' WHERE `ID` = 5");
                              $sql->execute();
                              
                          } else {
                              $moon_star = test_input($_POST["choice_name"]);
                     }}
                              
                              ?>
                    <div id="formDiv">
                    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                    <input id="choice_input" class="form-control" type="text" name="choice_name" value="" placeholder="choice">
                    <br>
                        
                    
                    </div>
                    
                    <input class="btn btn-success" id="submit_button"  data-target="#moon-modal" data-toggle="modal" href="#moon_modal" type="submit" name="submit" value="Submit" on-click="launchFunction">
                    
                    
                    
                    
                </div>
                </div>
                     </div>

