<?php

class Database {

    public static $host = "localhost";
    public static $database = "sweeth00_sweethome";
    public static $username = "root"; // sweeth00_dev
    public static $password = ""; // sweethomedev

    private static function connect() {
        $pdo = new PDO("mysql:host=".self::$host.";dbname=".self::$database.";charset=utf8", self::$username, self::$password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    }

    public static function query($query, $params = array()) {
        try {
            $stmt = self::connect()->prepare($query);
            $stmt->execute($params);
    
            if (explode(' ', $query)[0] == 'SELECT') {
                $data = $stmt->fetchAll();
                return $data;
            }
        } catch (Exception $e) {
            echo "<script>alert(`$e`)</script>";
        }
    }

    public static function addQuery($conn, $query, $params = array()) {
        try {
            $stmt = $conn->prepare($query);
            $stmt->execute($params);

            if (explode(' ', $query)[0] == 'SELECT') {
                $data = $stmt->fetchAll();
                return $data;
            }
        } catch (Exception $e) {
            echo "<script>alert(`$e`)</script>";
            throw new Exception($e);
        }
    }

    public static function begin() {
        $conn = self::connect();
        $conn->beginTransaction();

        return $conn;
    }

    public static function commit($conn) {
        $conn->commit();
    }

    public static function rollback($conn) {
        $conn->rollback();
    }

}

?>