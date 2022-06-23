<?php
require_once("includes/Header.php");
if(!isset($_GET["id"])) {
  Errormessage::showmessage("no record found");
}
$watchId = $_GET["id"];
$video = new Video($conn,$watchId);
$video->incrementVideoViews();


?>