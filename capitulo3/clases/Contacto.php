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

    public function agregarContacto()
    {
        $db = Database::getConnection();
        $stmt_insert = "insert into contactos(nombre, apellido, telefono)values ('$this->nombre','$this->apellido','$this->telefono')";
        $db->exec($stmt_insert);
        echo "Contacto agregado";
    }

    public function editarContacto()
    {
        $db = Database::getConnection();
        $stmt_actualizar = "update contactos set nombre = '$this->nombre',apellido = '$this->apellido', telefono='$this->telefono' where telefono='$this->telefono';";
        $db->exec($stmt_actualizar);
        echo "Contacto editado";
    }


    public function eliminarContacto()
    {
        $db = Database::getConnection();
        //para eliminar contacto hay que escribir el nombre y el telefono y darle a eliminar porque borra por telefono porque es clave primaria
        $stmt_borrar = "delete from contactos where telefono='$this->telefono';";
        $db->exec($stmt_borrar);
        echo "Contacto eliminado";

    }
}