<?php

  
function convert_measure($ft){
  $continue = false;
  
  
  //Make sure the number is positive
  if($ft > 0){
      if((is_string($ft) != true)){
          $continue = true;
          $in = $ft * 12;
          $cm = $in * 2.54;
      }
      else{
          $cm = "You entered a string";
      }
      
  }
  else{
      $cm = "You entered an invalid value";
  }
  
  if($continue === true){
  echo " <br> $ft Feet converts to $cm Cm. ";
  }
  else{
      echo $cm;
  }
  
  echo "<br> <br>";
}

convert_measure(6);

function generate_ID(){
    
    $one = mt_rand(1, 9);
    $two = mt_rand(1, 9);
    $three = mt_rand(1, 9);
    $four = mt_rand(1, 9);
    $five = mt_rand(1, 9);
    
    $id = $one . $two . $three . $four . $five;
    
    echo "ID: $id";
    
    
}

generate_ID();





