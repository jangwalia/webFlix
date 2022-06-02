<?php 
  class PreviewProvider {
    private $conn, $username;
    public function __construct($conn,$username) {
      $this->conn = $conn;
      $this->username = $username;
    }
    public function createPreview() {
      echo 'Hello';
    }
  }
?>