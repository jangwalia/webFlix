<?php
  class Account {
    //variable for connection
    private $conn;
    //variable for empty error array
    private $errorArray = array();

    public function __construct($conn) {
      $this->conn = $conn;
    }
// register function
    public function register($fn,$ln,$un,$em,$em2,$pw,$pw2){
      $this->validateFirstname($fn);
      $this->validatelastname($ln);
      $this->validateusername($un);
      $this->validateEmail($em, $em2);
      $this->validatePassword($pw, $pw2);

      if(empty($this->errorArray)) {
        return $this->insertData($fn, $ln, $un, $em, $pw);
      }

      return false;

    }
    // login function
    public function login($un,$pw) {
      $pw = hash("sha512", $pw);
      $query = $this->conn->prepare("SELECT * FROM  users WHERE username =:un AND password =:pw");
      $query->bindValue(":un",$un);
      $query->bindValue(":pw",$pw);

      $query->execute();

      if($query->rowCount() == 1) {
        return true; 
      }
      array_push($this->errorArray,Constants::$loginFailed);
      return false;


    }
    //insert data into database
    private function insertData($fn, $ln, $un, $em, $pw) {
      $pw = hash("sha512", $pw);

      $query = $this->conn->prepare("INSERT INTO users (firstName, lastName, username, email, password)
          VALUES(:fn, :ln, :un, :em, :pw)");

      $query->bindValue(":fn",$fn);
      $query->bindValue(":ln",$ln);
      $query->bindValue(":un",$un);
      $query->bindValue(":em",$em);
      $query->bindValue(":pw",$pw);
      
      // $query->execute();
      // var_dump($query->errorInfo());
      return $query->execute();
      //return false;
     
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

      private function validateEmail($em, $em2) {
        if($em != $em2) {
          array_push($this->errorArray,Constants::$emailMatch);
          return;
        }
        if(!filter_var($em,FILTER_VALIDATE_EMAIL)){
          array_push($this->errorArray,Constants::$emailInvalid);
        }
        $query = $this->conn->prepare("SELECT * FROM users WHERE email=:em");
        $query->bindValue(":em",$em);
        $query->execute();

        if($query->rowCount() !== 0) {
          array_push($this->errorArray,Constants::$Emailtaken);
        }

      }

      private function validatePassword($pw, $pw2) {
       if($pw != $pw2){
        array_push($this->errorArray,Constants::$passwordMatch);
        return;
       }
       if(strlen($pw) < 2 || strlen($pw2) > 25) {
        array_push($this->errorArray,Constants::$passwordNameCharacters);
        
      }

      }

      //create another function which will handle error
      public function getError($error){
        if(in_array($error,$this->errorArray)){
          return "<span class = 'errorMessage'>$error</span>";
        }
      }
  }
?>