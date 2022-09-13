<?php
class FormSanitizer{

    // creating static function we dont need to create an instance we just call it directly 
    public static function sanitizeFormString($inputText)
    {
     $inputText = strip_tags($inputText);
     //getting rid of spaces
     $inputText = str_replace(" ","", $inputText);
     $inputText = strtolower($inputText);
     $inputText = ucfirst($inputText);
     return $inputText;
    }

    public static function sanitizeFormUsername($inputText)
    {
     $inputText = strip_tags($inputText);
     //getting rid of spaces
     $inputText = str_replace(" ","", $inputText);
     return $inputText;
    }

    public static function sanitizeFormPassword($inputText)
    {
     $inputText = strip_tags($inputText);
     return $inputText;
    }

    public static function sanitizeFormEmail($inputText)
    {
     $inputText = strip_tags($inputText);
     //getting rid of spaces
     $inputText = str_replace(" ","", $inputText);
     return $inputText;
    }

}
?>