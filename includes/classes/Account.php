<?php
  class Account {
    //variable for connection
    private $conn;
    //variable for empty error array
    private $errorArray = array();

    public function __construct($conn) {
      $this->conn = $conn;
    }
      // check validation for firstname
      // first create function which checks the length of firstname
      public function validateFirstname($fn) {
        if(strlen($fn) < 2 || strlen($fn) > 25) {
          array_push($this->errorArray,"invalid length for name");
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