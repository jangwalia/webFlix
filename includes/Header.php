<?php 
  require_once("includes/classes/config.php");
  require_once("includes/classes/PreviewProvider.php");
  require_once("includes/classes/Entity.php");
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
  <script src="https://kit.fontawesome.com/8e58d63ddf.js" crossorigin="anonymous"></script>
  <title>Web Flix</title>
</head>
<body>
  <div class="wrapper">