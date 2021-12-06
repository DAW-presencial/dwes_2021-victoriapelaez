<?php

class Database
{
    private const HOST = "localhost";
    private const DBNAME = "agenda";
    private const USERNAME = "victoria";
    private const PASSWORD = "victoria1988";
    public static $conn;

    private function __construct(){
    }

    public static function getConnection()
    {
        try {
            $conn = new PDO("mysql:host=" . Database::HOST . ";dbname=" . Database::DBNAME, Database::USERNAME, Database::PASSWORD);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "Conexión realizada con la base de datos";
        } catch (PDOException $exception) {
            echo "Connection error: " . $exception->getMessage();
        }

        return $conn;
    }


}
