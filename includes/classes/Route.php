<?php

class Route {

    private static function registerRoute($route) {
        global $Routes;
        $Routes[] = $route;
    }

    public static function set($route, $function) {
        self::registerRoute($route);

        if ($_GET['url'] == $route) {
            $function->__invoke();
        }
    }
}

?>