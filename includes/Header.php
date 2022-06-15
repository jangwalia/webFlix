<?php 
  require_once("includes/classes/config.php");
  require_once("includes/classes/PreviewProvider.php");
  require_once("includes/classes/Categorycontainer.php");
  require_once("includes/classes/Entity.php");
  require_once("includes/classes/EntityProvider.php");
  require_once("includes/classes/Errormessage.php");
  require_once("includes/classes/SeasonProvider.php");
  if(!isset($_SESSION["userLoggedIn"])) {
    header("Location: register.php");
  }
  $loggedInUser = $_SESSION["userLoggedIn"];
  ?>
  <! DOCTYPE html>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href='assets/styles/style.css'>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script src="https://kit.fontawesome.com/8e58d63ddf.js" crossorigin="anonymous"></script>
  <script src = 'assets/js/script.js'></script>
  <title>Web Flix</title>
</head>
<body>
  <div class="wrapper">