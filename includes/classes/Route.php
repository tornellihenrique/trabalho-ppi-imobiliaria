<?php

class Route {

    public static $validRoutes = array();

    private static function registerRoute($route) {
        global $Routes;
        $Routes[] = $route;
    }

    public static function set($route, $function) {
        self::registerRoute($route);

        // print_r(self::$validRoutes);

        if ($_GET['url'] == $route) {
            $function->__invoke();
        }
    }
}

?>