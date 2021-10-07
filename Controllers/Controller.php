<?php

class Controller extends Database {
    
    public static function CreateView($viewName) {
        
        require_once("./Views/$viewName.php");
        
    }    
    function checkinput($data) {
          $data = trim($data);
          $data = stripslashes($data);
          $data = htmlspecialchars($data);
          return $data;
    }

}


?>