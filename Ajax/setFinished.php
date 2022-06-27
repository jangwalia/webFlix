<?php
require_once("../includes/classes/config.php");
if(isset($_POST['videoId']) && isset($_POST['username'])){
  
  $query = $conn->prepare("UPDATE videoProgress SET finished=1,progress=0
                          WHERE username=:username AND videoid=:videoId");
  
 
  $query->bindValue(":username", $_POST['username']);
  $query->bindValue(":videoId", $_POST['videoId']);
  $query->execute();

  
}
else {
  echo "no record found";
}



?>