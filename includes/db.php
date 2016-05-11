<?php

   session_start();

   $server = "localhost";
   $username = "root";
   $password = "";
   $database = "no_man_sky";

   try {
      $conn = new PDO("mysql:host=$server;dbname=$database", $username,
	      $password, array(
//		causes the connection to be persistent.		
	  PDO::ATTR_PERSISTENT => true
      ));
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   } catch (Exception $ex) {
      $ex->getTrace();
   }
   
   $id = 1;
   $sql = $conn->prepare("SELECT * FROM `limits` WHERE `id` = :id");
              $sql->bindParam('id', $id, PDO::PARAM_INT);
              $sql->execute();

              $result = $sql->fetchObject();
              
              $galaxy_limit = $result->galaxy;
              $star_system_limit = $result->star_systems;
              $planet_limit = $result->planets;
              $moon_limit = $result->moons;
              $creature_limit = $result->creatures;
              $flora_limit = $result->flora;
              $ship_limit = $result->ships;
              

