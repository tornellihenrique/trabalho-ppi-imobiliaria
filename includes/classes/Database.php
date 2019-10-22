<?php

class Database {

    public static $host = "localhost";
    public static $database = "sweeth00_sweethome";
    public static $username = "sweeth00_dev";
    public static $password = "sweethomedev";

    private static function connect() {
        $pdo = new PDO("mysql:host=".self::$host.";dbname=".self::$database.";charset=utf8", self::$username, self::$password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    }

    public static function query($query, $params = array()) {
        $statement = self::connect()->prepare($query);
        $statement->execute($params);

        if (explode(' ', $query)[0] == 'SELECT') {
            $data = $statement->fetchAll();
            return $data;
        }
    }

}

?>