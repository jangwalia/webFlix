<?php
require_once("../includes/classes/config.php");
if(isset($_POST['videoId']) && isset($_POST['username'])){
  
  $query = $conn->prepare("SELECT progress FROM videoProgress
                          WHERE username=:username AND videoid=:videoId");
  
 
  $query->bindValue(":username", $_POST['username']);
  $query->bindValue(":videoId", $_POST['videoId']);
  $query->execute();
  echo $query->fetchColumn();

  
}
else {
  echo "no record found";
}



?>