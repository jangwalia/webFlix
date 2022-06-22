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
        $html .= $this->showcategoriesList($row,NULL,true,true);
      }

      return $html . "</div>";
    
    }
    public function Showcategory($categoryID,$title = null){
      $query = $this->conn->prepare("SELECT * FROM categories WHERE id=:id");
      $query->bindvalue(":id",$categoryID);
      $query->execute();
      $html = "<div class = 'categoriesList noScroll'>";

      while($row = $query->fetch(PDO::FETCH_ASSOC)) {
        $html .= $this->showcategoriesList($row,$title,true,true);
      }

      return $html . "</div>";

    }
    private function showcategoriesList($sqlData,$title,$tvShows,$movies) {
      $categoryID = $sqlData['id'];
      $title = $title == null ? $sqlData["name"] : $title;

      if($tvShows && $movies) {
        $entity = EntityProvider::getEntities ($this->conn, $categoryID, 30);
      }

      elseif ($tvShows) {
        //only shows tvshows
      }

      else {
        //only show movies
      }

      if(sizeof($entity) == 0){
        return ;
      }

      $entityHtml = "";
      $previewprovider = new PreviewProvider($this->conn,$this->username);
      foreach($entity as $e) {
        $entityHtml .= $previewprovider->showEntityimages($e);
      }
      
      return "
                <div class = 'category'>
                  <a href = 'category.php?id=$categoryID' >
                    <h3>$title</h3>
                  </a>
                
                  <div class = 'entities'>
                    $entityHtml
                  </div>
              </div>
      
    ";
    }
  }

?>