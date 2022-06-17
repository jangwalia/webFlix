<?php 
  class Entity {
    private $conn, $sqlData;
    // $input can be either entity id which can be used to fetch all entity data from database
    // or it can be all the data of an entity we will get from preview class
    public function __construct($conn,$input) {
      $this->conn = $conn;

      if(is_array($input)) {
        $this->sqlData = $input;
      }
      else {
        $query = $this->conn->prepare("SELECT * FROM entities WHERE id=:id");
        $query->bindValue(":id", $input);
        $query->execute();
        $this->sqlData = $query->fetch(PDO::FETCH_ASSOC);
      }
      
    }

    public function getId() {
      return $this->sqlData["id"];
    }

    public function getName() {
      return $this->sqlData["name"];
    }

    public function getThumbNail() {
      return $this->sqlData["thumbnail"];
    }

    public function getPreviewVideo() {
      return $this->sqlData["preview"];
    }

    public function getSeasons(){
      $query = $this->conn->prepare("SELECT * FROM videos WHERE entityId=:id
      AND isMovie=0 ORDER BY season, episode ASC ");
      $query->bindValue(":id",$entity->getId());
      $query->execute();
      $seasons = array();
      $viseos = array();
      $currentSeason = null;

      while($row = $query->fetch(PDO::FETCH_ASSOC)) {
        $currentSeason = $row["seson"];
        $video[] = new Video($this->conn,$row);
      }


    }


}
  
?>