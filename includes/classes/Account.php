<?php
  class Account {
    //variable for connection
    private $conn;
    //variable for empty error array
    private $errorArray = array();

    public function __construct($conn) {
      $this->conn = $conn;
    }

    public function register($fn,$ln,$un,$em,$em2,$pw,$pw2){
      $this->validateFirstname($fn);
      $this->validateLastname($ln)
    }
      // check validation for firstname
      // first create function which checks the length of firstname
      private function validateFirstname($fn) {
        if(strlen($fn) < 2 || strlen($fn) > 25) {
          array_push($this->errorArray,Constants::$firstNameCharacters);
        }
      }
      private function validatelastname($ln) {
        if(strlen($ln) < 2 || strlen($ln) > 25) {
          array_push($this->errorArray,Constants::$lasttNameCharacters);
        }
      private function validateusername($un) {
          if(strlen($un) < 2 || strlen($un) > 25) {
            array_push($this->errorArray,Constants::$userNameCharacters);
            return;
          }
          $query = $this->conn->prepare("SELECT * FROM users WHERE username=:un");
          $query->bindValue(":un",$un);
          $query->execute();

          if($query->rowCount() !== 0) {
            array_push($this->errorArray,Constants::$userNametaken);
          }

      }
      //create another function which will handle error
      public function getError($error){
        if(in_array($error,$this->errorArray)){
          return $error;
        }
      }
  }
?>