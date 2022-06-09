<?php 

  class EntityProvider {

    public static function getEntities ($conn,$categoryID,$limit) {

      $sql = "SELECT * FROM entities ";

      if($categoryID != null) {
        $sql .= "WHERE categoryId=:categoryid ";
      }

      $sql .= "ORDER BY RAND() LIMIT :limit";

      $query = $conn->prepare($sql);

      if($categoryID != null) {
        $query->bindvalue(":categoryid",$categoryID);
      }
      $query->bindvalue(":limit",$limit, PDO::PARAM_INT);
      $query->execute();

      $result = array();
      while($row = $query->fetch(PDO::FETCH_ASSOC)) {
        $result[] = new Entity($conn,$row);
      }
      return $result;

    }


  }



?>