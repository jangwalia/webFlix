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
        $html .= $this->showcategoriesList($row,null,true,true);
      }

      return $html . "</div>";
    
    }

    private function showcategoriesList($sqlData,$title,$tvShows,$movies) {
      $categoryID = $sqlData['id'];
      $title = $title == null ? $sqlData["name"] : $title;
      return $title . "<br>";
    }
  }

?>