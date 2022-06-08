<?php 
  class CategoryContainer {
    private $conn, $username;
    public function __construct($conn,$username) {
      $this->conn = $conn;
      $this->username = $username;
    }

    public function showCategories() {
      $query = $this->conn->prepare("SELECT * FROM categories");
      $query->execute();
      $html = "<div class = 'categoriesList'>";

      while($row = $query->fetch(PDO::FETCH_ASSOC)) {
        $html .= $row["name"];
      }

      return $html . "</div>";


    }
  }

?>