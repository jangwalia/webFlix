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

      

       echo "
           <div class = 'previewContainer'>
            <img src='$thumbNail' hidden>
            <video autoplay muted class ='previewVideo'>
            <source src = '$preview' type = 'video/mp4'>
            </video>
          </div>";

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