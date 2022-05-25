<?php 
  class Formsanitizer {
    public static function sanitizeInput($input) {
      // remove html tags from input
      $input = strip_tags($input);
      // remove any space
      $input = str_replace(" ", "",$input);
      // convort string to lower case
      $input = strtolower($input);
      $input = ucfirst($input);
      return $input;
  
    }
    // Create sanitizer function for other inputs also
    public static function sanitizeLastname($input) {
     // remove html tags from input
     $input = strip_tags($input);
     // remove any space
     $input = str_replace(" ", "",$input);
     // convort string to lower case
     $input = strtolower($input);
     $input = ucfirst($input);
     return $input;
  
    }
    // email sanitizer
    public static function sanitizeUsername($input) {
      // remove html tags from input
      $input = strip_tags($input);
      // remove any space
      $input = str_replace(" ", "",$input);
     return $input;
  
    }
    public static function sanitizeEmail($input) {
      // remove html tags from input
      $input = strip_tags($input);
      // remove any space
      $input = str_replace(" ", "",$input);
     return $input;
  
    }
    public static function sanitizePassword($input) {
      // remove html tags from input
      $input = strip_tags($input);
      // remove any space
     
     return $input;
  
    }

  }
?>

