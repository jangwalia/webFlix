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
      $seasonNumbers =  $season->getSeasonNumber();
      $videoHtml = "";
      foreach($season->getVideos() as $video){
        $videoHtml .= $this->createVideoSquare($video);
      }
      $seasonHtml .= "<div class = 'season'>
                      <h3>Season : $seasonNumbers</h3>
                      <div class = 'videos'>
                      $videoHtml
                      </div>
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

    return "<a href ='watch.php?id=$id'>
              <div class = 'episodeContainer'>
                <div class ='contents'>
                  <img src = '$thumbnail'>
                  <div class = 'videoInfo'>
                  <h4>$episodeNumber . $title</h4>
                  <span>$description</span>
                  </div>
                </div>
              
              
              </div>
    
    
    
    </a>";
  }

  }
?>