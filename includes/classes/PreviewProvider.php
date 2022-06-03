<?php 
  class PreviewProvider {
    private $conn, $username;
    public function __construct($conn,$username) {
      $this->conn = $conn;
      $this->username = $username;
    }
    public function createPreview($entity) {
      if($entity == null) {
          $entity = $this->getRandomEntity();
      }
      $id = $entity->getId();
      $name = $entity->getName();
      $thumbNail = $entity->getThumbNail();
      $preview = $entity->getPreviewVideo();

      

       echo "<img src='$thumbNail' >";

    }

    private function getRandomEntity(){
     $query = $this->conn->prepare("SELECT * FROM entities ORDER BY RAND() LIMIT 1");
     $query->execute();

     $row = $query->fetch(PDO::FETCH_ASSOC);
     return new Entity($this->conn,$row);
     //next step is to creatre entity class
    }
  }
?>