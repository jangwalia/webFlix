<?php
require_once("../includes/classes/config.php");
if(isset($_POST['videoId']) && isset($_POST['username'])){
  
  $query = $conn->prepare("SELECT * FROM videoProgress WHERE username=:username AND videoid=:videoId");
  $query->bindValue(":username", $_POST['username']);
  $query->bindValue(":videoId", $_POST['videoId']);
  
  $query->execute();

  if($query->rowCount() == 0) {
    $query = $conn->prepare("INSERT INTO videoProgress (username,videoid) VALUES(:username,:videoId)");
    $query->bindValue(":username", $_POST['username']);
    $query->bindValue(":videoId", $_POST['videoId']);
  
    $query->execute();

  }
}
else {
  echo "no record found";
}

?>