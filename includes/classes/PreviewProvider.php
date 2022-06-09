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

      

       return  "
           <div class = 'previewContainer'>
            <img class ='previewImage' src='$thumbNail' hidden>
            <video autoplay muted class ='previewVideo' onended='changePreviewImage()'>
            <source src = '$preview' type = 'video/mp4'>
            </video>
            <div class='previewOverlay'>
              <div class='mainDetails'>
                <h3>$name</h3>
                <div class = 'buttons'>
                <button><i class='fa fa-play'></i> Play</button>
                <button onclick='controlVolume(this)'><i class='fa fa-volume-mute'></i></button>
                </div>
              </div>
            </div>
          </div>
          
          ";

    }

    public function showEntityimages($entity) {
      $id = $entity->getId();
      $thumbNail = $entity->getThumbNail();
      $name = $entity->getName();

      return "<a href ='entity.php?id=$id'>
        <div class ='previewContainer small'>
        <img src = '$thumbNail' title = '$name '>

        </div>
      </a>
      ";
    }

    private function getRandomEntity(){
     $entity = EntityProvider::getEntities($this->conn, null, 1);
     return $entity[0];
     //next step is to creatre entity class
    }
  }
?>