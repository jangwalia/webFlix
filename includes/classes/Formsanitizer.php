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
  }
?>

