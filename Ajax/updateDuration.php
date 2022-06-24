<?php
require_once("../includes/classes/config.php");
if(isset($_POST['videoId']) && isset($_POST['username']) && isset($_POST['progress'])){
  
  $query = $conn->prepare("UPDATE videoProgress SET progress=:progress dateModified=Now()
                          WHERE username=:username AND videoid=:videoId");
  
  $query->bindValue(":progress", $_POST['progress']);
  $query->bindValue(":username", $_POST['username']);
  $query->bindValue(":videoId", $_POST['videoId']);
  $query->execute();

  
}
else {
  echo "no record found";
}



?>