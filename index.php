<?php 
  require_once("includes/classes/config.php");
  require_once("includes/classes/PreviewProvider.php");

  if(!isset($_SESSION["userLoggedIn"])) {
    header("Location: register.php");
  }
  $loggedInUser = $_SESSION["userLoggedIn"];

  $preview = new PreviewProvider($conn,$loggedInUser);

  $preview->createPreview();

?>