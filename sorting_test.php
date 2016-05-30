<?php

require_once('C:\xampp\htdocs\no_mans_sky\includes\db.php');
  require_once('C:\xampp\htdocs\no_mans_sky\includes\db_checking.php');
  include('C:\xampp\htdocs\no_mans_sky\includes\bootstrap.php');
  global $conn;?>


<form action="index.php?id=1"  method="POST">
    Enter info: <input type="text" name="info_text"><br>
    
    
    <input type="submit" name="confirm" value="Submit"/>
</form>



