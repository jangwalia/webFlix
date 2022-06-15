<?php
  require_once("includes/Header.php");


  if(!isset($_GET["id"])) {
    Errormessage::showmessage("no record found");
  }

  $entityId = $_GET["id"];
  $newEntity = new Entity($conn,$entityId);

  $preview = new PreviewProvider($conn,$loggedInUser);
  echo $preview->createPreview($newEntity);

  $seasonProvider = new SeasonProvider($conn,$loggedInUser);
  echo $seasonProvider->create($newEntity);

?>