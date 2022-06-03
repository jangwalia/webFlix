<?php
  require_once("includes/Header.php");

  $preview = new PreviewProvider($conn,$loggedInUser);

  $preview->createPreview(null);

?>