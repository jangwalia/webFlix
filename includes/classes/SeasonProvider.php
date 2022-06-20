 <?php
  class SeasonProvider {
    private $conn, $username;
    public function __construct($conn,$username) {
      $this->conn = $conn;
      $this->username = $username;

    }

    public function create($entity) {
     $seasons = $entity->getSeasons();
     if(sizeof($seasons) == 0){
      return;
     }
     foreach($seasons as $season) {
      $seasonNumbers =  $season->getSeasonNumber() . "<br>";
      $seasonHtml .= "<div class = 'seasonNumbers'>
                      <h3>Season : $seasonNumbers</h3>
      
                  </div>";
     }

     return $seasonHtml;
  }
  private function createVideoSquare($video) {
    $id = $video->getId();
    $title = $video->getTitle();
    $thumbnail = $video->getThumbnail();
    $description = $video->getDescription();
    $episodeNumber = $video->getEpisodeNumber();
  }

  }
?>