<?php


class Contacto
{
    private $nombre;
    private $apellido;
    private $telefono;


    public function __construct($nombre, $apellido, $telefono)
    {
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->telefono = $telefono;

    }

    public static function mostrarContactos()
    {
        $db = Database::getConnection();
        $stmt = $db->query('SELECT nombre,apellido,telefono FROM contactos');
        while ($row = $stmt->fetch()) {
            echo "<br>";
            echo $row['nombre'] . ", " . $row['apellido'] . ", " . $row['telefono'];

        }


    }
}