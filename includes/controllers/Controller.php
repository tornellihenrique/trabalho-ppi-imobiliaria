<?php

class Controller extends Database {

    public static function CreateView($viewName) {
        if (file_exists("./views/$viewName.php")) {
            require_once("./views/$viewName.php");
        } else {
            require_once(__DIR__."/../views/$viewName.php");
        }
    }
}

?>