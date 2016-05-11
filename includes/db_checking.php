<?php
require_once('C:\xampp\htdocs\no_mans_sky\includes\db.php');
global $conn;



function add_galaxy($name){
    global $conn;
    global $galaxy_limit;
    //Update galaxy limit
    $new_limit = $galaxy_limit + 1;
    
    $sql = "INSERT INTO galaxy (id, name, no_starSystemts)
VALUES ('$new_limit', '$name', '0')";
    
    $conn->exec($sql);
}




function sort_number(){
    $db_select = "";
    
}


function check_highest(){
    $db_select = "";
    
}