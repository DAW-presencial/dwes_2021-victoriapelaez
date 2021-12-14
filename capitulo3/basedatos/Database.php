<?php

class Database
{
    private const HOST = "localhost";
    private const DBNAME = "agenda_mpelaez";// para mysql agenda, pgsql agenda_mpelaez
    private const USERNAME = "mpelaez_usr";//para mysql victoria, pgsql mpelaez_usr
    private const PASSWORD = "abc123."; //para mysql victoria1988, pgsql abc123.

    private function __construct(){
    }

    /**
     * @return PDO
     * Funcion de acceso a la base de datos mediante PDO
     */
    public static function getConnection()
    {
        try {
            //si usas mysql "mysql:host=" . Database::HOST . ";dbname=" . Database::DBNAME, Database::USERNAME, Database::PASSWORD
            //si usas pgsql "pgsql:host=" . Database::HOST . ";dbname=" . Database::DBNAME, Database::USERNAME, Database::PASSWORD
            $conn = new PDO("pgsql:host=" . Database::HOST . ";dbname=" . Database::DBNAME, Database::USERNAME, Database::PASSWORD);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            /*echo "<br>";
            echo "Conexión realizada con la base de datos";*/
        } catch (PDOException $exception) {
            echo "Connection error: " . $exception->getMessage();
        }

        return $conn;
    }


}
