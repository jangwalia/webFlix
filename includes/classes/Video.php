<?php
class Video {
  private $conn, $sqlData,$entity;
  // $input can be either entity id which can be used to fetch all entity data from database
  // or it can be all the data of an entity we will get from preview class
  public function __construct($conn,$input) {
    $this->conn = $conn;

    if(is_array($input)) {
      $this->sqlData = $input;
    }
    else {
      $query = $this->conn->prepare("SELECT * FROM videos WHERE id=:id");
      $query->bindValue(":id", $input);
      $query->execute();
      $this->sqlData = $query->fetch(PDO::FETCH_ASSOC);
    }

    $this->entity = new Entity($conn,$this->sqlData["entityId"]);
    
  }

  public function getId(){
   return  $this->sqlData["id"];

  }
  public function getTitle(){
    return  $this->sqlData["title"];
    
   }
   public function getDescription(){
    return  $this->sqlData["description"];
    
   }
   public function getFilepath(){
    return  $this->sqlData["filePath"];
    
   }
   public function getThumbnail(){
    return  $this->entity->getThumbNail();
    
   }
   public function getEpisodeNumber(){
    return  $this->sqlData["episode"];
    
   }

   public function incrementVideoViews(){
    $query = $this->conn->prepare("UPDATE videos SET views=views + 1 WHERE id=:id");
    $query->bindValue(":id", $this->getId());
    $query->execute();
   }

}




?>