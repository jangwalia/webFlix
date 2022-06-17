 <?php
  class SeasonProvider {
    private $conn, $username;
    public function __construct($conn,$username) {
      $this->conn = $conn;
      $this->username = $username;

    }

    public function create($entity) {
     $seasons = $entity->getSeasons();
  }

  }
?>