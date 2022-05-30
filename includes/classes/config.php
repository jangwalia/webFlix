<?php 
ob_start();  //output buffer
session_start();
date_default_timezone_set("America/Los_Angeles");

try{
  $conn = new PDO("mysql:dbname=webFlix; host=localhost", "root", "");
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
}
catch(PDOException $e){
  exit("connection failed: ".$e->getMessage());
}
?>