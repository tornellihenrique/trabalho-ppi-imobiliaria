<?php

class Navbar extends Controller {

    public static function loadNeighborhoods()
    {
        return self::query("SELECT * FROM bairros");
    }
}

?>