<?php
  require_once("includes/Header.php");

  $preview = new PreviewProvider($conn,$loggedInUser);
  echo $preview->createPreview(null);

  $categories = new CategoryContainer($conn,$loggedInUser);
  echo $categories->showCategories();
?>