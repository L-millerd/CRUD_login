<?php


 $dbhost ="localhost:3306";
 $dbuser ="root";
 $dbpassword ="";
 $dbname ="crm_login";

 $con=mysqli_connect($dbhost, $dbuser, $dbpassword, $dbname);
 if(!$con){
     echo "<h1>Connect Error</h1>";
 }